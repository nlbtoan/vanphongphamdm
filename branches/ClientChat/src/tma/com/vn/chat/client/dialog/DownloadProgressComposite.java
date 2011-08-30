package tma.com.vn.chat.client.dialog;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.text.DecimalFormat;
import java.util.Date;

import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.events.SelectionListener;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.Event;
import org.eclipse.swt.widgets.Group;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Listener;
import org.eclipse.swt.widgets.Menu;
import org.eclipse.swt.widgets.MenuItem;
import org.eclipse.swt.widgets.ProgressBar;
import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.PlatformUI;

import tma.com.vn.chat.client.api.IDateView;
import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.listener.DownloadListener;
import tma.com.vn.chat.client.view.MainView;

public class DownloadProgressComposite extends Composite implements
		DownloadListener {
	private Label lb_icon;
	private Label lb_fileName;
	private Label lb_date;
	private Label lb_status;
	private ProgressBar m_progressBar;
	private Button bt_cancel;
	private Button bt_stop;
	private String m_fileName;
	private long m_size;
	private Date m_date;
	private String m_fromUser;
	private DecimalFormat m_decimalFormat = new DecimalFormat("#.##");

	public DownloadProgressComposite(Composite parent, int style) {
		super(parent, style);
		// Composite com = new Composite(parent, SWT.NONE);
		this.setLayout(new GridLayout());
		this.setLayoutData(new GridData(SWT.FILL, SWT.FILL, true, false));
		m_fileName = "";
		m_fromUser = "";
		m_size = 0;
		m_date = new Date();
		Group group = new Group(this, SWT.SHADOW_NONE);
		GridLayout layout = new GridLayout(4, false);
		group.setLayout(layout);
		GridData gridDataG = new GridData(SWT.FILL, SWT.FILL, true, false);
		gridDataG.widthHint = 500;
		group.setLayoutData(gridDataG);

		lb_icon = new Label(group, SWT.NONE);
		GridData gd = new GridData();
		gd.verticalAlignment = GridData.FILL;
		gd.verticalSpan = 3;
		gd.grabExcessVerticalSpace = true;
		lb_icon.setLayoutData(gd);
		lb_icon.setText("Icon");

		lb_fileName = new Label(group, SWT.NONE);
		lb_fileName.setText("File name");

		lb_date = new Label(group, SWT.NONE);
		lb_date.setText("date");
		gd = new GridData();
		gd.horizontalSpan = 2;
		lb_date.setLayoutData(gd);

		m_progressBar = new ProgressBar(group, SWT.NONE);
		m_progressBar.setMaximum(100);
		m_progressBar.setSelection(0);
		GridData gridData = new GridData(GridData.FILL, SWT.NONE, true, false);
		// gridData.minimumWidth = 100;
		m_progressBar.setLayoutData(gridData);

		bt_cancel = new Button(group, SWT.NONE);
		bt_cancel.setText("Cancel");
		bt_cancel.addSelectionListener(new SelectionListener() {

			@Override
			public void widgetSelected(SelectionEvent e) {
				handleCancel();
			}

			@Override
			public void widgetDefaultSelected(SelectionEvent e) {

			}
		});

		bt_stop = new Button(group, SWT.NONE);
		bt_stop.setText("Stop");
		bt_stop.setLayoutData(new GridData());
		bt_stop.setVisible(false);

		lb_status = new Label(group, SWT.NONE);
		lb_status.setText("kb/s");

		Menu menu = new Menu(group);
		MenuItem menuItem = new MenuItem(menu, SWT.NONE);
		menuItem.setText("Open");
		menuItem.addListener(SWT.Selection, new Listener() {

			@Override
			public void handleEvent(Event event) {

			}
		});
		menuItem = new MenuItem(menu, SWT.NONE);
		menuItem.setText("Open containing folder");
		menuItem.addListener(SWT.Selection, new Listener() {
			@Override
			public void handleEvent(Event event) {

			}
		});

		menuItem = new MenuItem(menu, SWT.NONE);
		menuItem.setText("Remove from list");
		menuItem.addListener(SWT.Selection, new Listener() {
			@Override
			public void handleEvent(Event event) {
				handleRemove();
			}
		});

		for (Control control : group.getChildren()) {
			control.setMenu(menu);
		}
		group.setMenu(menu);

		/*
		 * group.pack(); parent.pack();
		 */
		// parent.layout();
		// this.computeSize(-1, -1);
	}

	public void setViewDate(IDateView dateView) {
		lb_date.setText(dateView.getViewDate(m_date));
		// pack();
		// layout();
	}

	public void setFromUser(String user) {
		m_fromUser = user;
	}

	public void setLBFileName(final String fileName) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				lb_fileName.setText(fileName);
			}
		});

	}

	public void setStateProgressBar(final int persent) {
		m_progressBar.setSelection(persent);
		m_progressBar.update();
		m_progressBar.getParent().layout();

	}

	public void setStatus(final String status) {

		lb_status.setText(status);

		// lb_status.update();
		// lb_status.getParent().layout();
	}

	public void setDate(String date) {
		lb_date.setText(date);
	}

	public void setProgressBarVisible(final boolean visible) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				m_progressBar.setVisible(visible);
			}
		});

	}

	public void setCancel(final boolean visible) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				bt_cancel.setVisible(visible);
			}
		});

	}

	public void setStop(final boolean visible) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				bt_stop.setVisible(visible);
			}
		});

	}

	@Override
	public void stop() {
		setStatus("Stop");
		setCancel(false);
		setStop(false);
	}

	@Override
	public void downloadChange(final long downloaded, final double bytes) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				if (m_size != 0) {
					setStatus(String.format("Downloading %s KB/s",
							m_decimalFormat.format(bytes / 1024)));
					int per = (int) ((downloaded * 100) / m_size);
					setStateProgressBar(per);
				}
			}
		});

	}

	@Override
	public void downloadComplete() {
		// setProgressBarVisible(false);

		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				setStatus("Download completed");
				setCancel(false);
				setStop(false);
			}
		});
	}

	public void setSize(long size) {
		this.m_size = size;

	}

	public void setFileName(String fileName) {
		m_fileName = fileName;
		setLBFileName(fileName);
	}

	private void handleCancel() {
		ChatService.SINGLETON.cancelRecFile(m_fileName, m_fromUser);
		// setCancel(false);
		// setStop(false);
	}

	private void handleRemove() {
		IWorkbenchPage page = PlatformUI.getWorkbench()
				.getActiveWorkbenchWindow().getActivePage();
		MainView mainView = (MainView) page.findView(MainView.ID);
		if (mainView.getDownload() != null) {
			mainView.getDownload().removeDlProgress(this);
		}

	}

	public void saveStatus(DataOutputStream dos) throws IOException {
		dos.writeUTF(lb_icon.getText());
		dos.writeUTF(lb_fileName.getText());
		dos.writeUTF(lb_date.getText());
		dos.writeUTF(m_date.toGMTString());
		dos.writeUTF(lb_status.getText());
		dos.writeInt(m_progressBar.getSelection());
		dos.writeUTF(bt_cancel.getText());
		dos.writeBoolean(bt_cancel.isVisible());
		dos.writeUTF(bt_stop.getText());
		dos.writeBoolean(bt_stop.isVisible());
		dos.writeUTF(m_fileName);
		dos.writeLong(m_size);
		dos.writeUTF(m_fromUser);
	}

	public void loadStatus(DataInputStream dis) throws IOException {
		lb_icon.setText(dis.readUTF());
		lb_fileName.setText(dis.readUTF());
		lb_date.setText(dis.readUTF());
		m_date = new Date(dis.readUTF());
		lb_status.setText(dis.readUTF());
		m_progressBar.setSelection(dis.readInt());
		bt_cancel.setText(dis.readUTF());
		bt_cancel.setVisible(dis.readBoolean());
		bt_stop.setText(dis.readUTF());
		bt_stop.setVisible(dis.readBoolean());
		m_fileName = dis.readUTF();
		m_size = dis.readLong();
		m_fromUser = dis.readUTF();
	}

}
