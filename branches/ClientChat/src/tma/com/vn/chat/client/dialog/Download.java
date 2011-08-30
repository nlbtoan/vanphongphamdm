package tma.com.vn.chat.client.dialog;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.eclipse.jface.dialogs.IMessageProvider;
import org.eclipse.jface.dialogs.TitleAreaDialog;
import org.eclipse.jface.window.ApplicationWindow;
import org.eclipse.jface.window.Window;
import org.eclipse.swt.SWT;
import org.eclipse.swt.custom.ScrolledComposite;
import org.eclipse.swt.graphics.Point;
import org.eclipse.swt.layout.FillLayout;
import org.eclipse.swt.layout.FormData;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.layout.RowLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.Event;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Listener;
import org.eclipse.swt.widgets.Menu;
import org.eclipse.swt.widgets.MenuItem;
import org.eclipse.swt.widgets.ProgressBar;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.PlatformUI;

import tma.com.vn.chat.client.api.IDateView;
import tma.com.vn.chat.client.app.DateViewImpl;
import tma.com.vn.chat.client.view.MainView;

public class Download extends ApplicationWindow {
	private List<DownloadProgressComposite> m_dlProgress = new ArrayList<DownloadProgressComposite>();
	private Composite m_downloadComposite;
	private IDateView m_dateView;
	private String m_userName;

	public Download(Shell parentShell, String userName) {
		super(parentShell);
		this.m_userName = userName;
	}

	@Override
	protected Control createContents(Composite parent) {

		m_downloadComposite = new Composite(parent, SWT.NONE);
		GridLayout layout = new GridLayout();
		m_downloadComposite.setLayout(layout);
		m_dateView = new DateViewImpl();
		getShell().setText("Downloads");
		
//		ScrolledComposite scrollBox = new ScrolledComposite(m_downloadComposite, SWT.V_SCROLL);
//		scrollBox.setExpandHorizontal(true);
//		scrollBox.setExpandVertical(true);
//		scrollBox.setMinWidth(0);
		return m_downloadComposite;
	}

	public Composite getParent() {
		return m_downloadComposite;
	}

	public void addProgres(DownloadProgressComposite dlProgress) {
		dlProgress.setLayoutData(new GridData(SWT.FILL, SWT.FILL, true, false));
		dlProgress.setLayout(new GridLayout());
		dlProgress.setViewDate(m_dateView);
		m_dlProgress.add(dlProgress);
		m_downloadComposite.getParent().layout();
		m_downloadComposite.getParent().pack();
		// dlProgress.pack();
		// m_downloadComposite.getParent().layout();
		// dlProgress.getShell().layout();

	}

	public void removeDlProgress(final DownloadProgressComposite dlProgress) {
		m_dlProgress.remove(dlProgress);
		dlProgress.dispose();
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
//				m_downloadComposite.redraw();
//				m_downloadComposite.getParent().layout();
				Point size = m_downloadComposite.computeSize(SWT.DEFAULT, SWT.DEFAULT);
				m_downloadComposite.setSize(size);

			}
		});

	}

	public void saveStatus() {
		File file = new File(System.getProperty("user.home") + File.separator
				+ "logs" + File.separator + m_userName + File.separator
				+ "download.tmp");
		if (!file.getParentFile().exists())
			file.getParentFile().mkdirs();
		FileOutputStream fos = null;
		DataOutputStream dos = null;
		try {
			fos = new FileOutputStream(file);
			dos = new DataOutputStream(fos);
			dos.writeInt(m_dlProgress.size());
			for (DownloadProgressComposite dlProgr : m_dlProgress) {
				dlProgr.saveStatus(dos);
			}
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		} finally {
			if (dos != null) {
				try {
					dos.close();
				} catch (IOException e) {
					e.printStackTrace();
				}
			}
			if (fos != null) {
				try {
					fos.close();
				} catch (IOException e) {
					e.printStackTrace();
				}
			}
		}
	}

	public void loadStatus() {
		File file = new File(System.getProperty("user.home") + File.separator
				+ "logs" + File.separator + m_userName + File.separator
				+ "download.tmp");
		if (file.exists()) {
			FileInputStream fis = null;
			DataInputStream dis = null;
			try {
				fis = new FileInputStream(file);
				dis = new DataInputStream(fis);
				int n = dis.readInt();
				DownloadProgressComposite dlProgr;
				while (n > 0) {
					n--;
					dlProgr = new DownloadProgressComposite(getParent(),
							SWT.NONE);
					dlProgr.loadStatus(dis);
					dlProgr.setViewDate(m_dateView);
					addProgres(dlProgr);
				}
			} catch (FileNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} finally {
				if (dis != null) {
					try {
						dis.close();
					} catch (IOException e) {
						e.printStackTrace();
					}
				}
				if (fis != null) {
					try {
						fis.close();
					} catch (IOException e) {
						e.printStackTrace();
					}
				}
			}
		}
	}

	@Override
	public boolean close() {
		saveStatus();
		super.close();
		IWorkbenchPage page = PlatformUI.getWorkbench()
				.getActiveWorkbenchWindow().getActivePage();
		MainView mainView = (MainView) page.findView(MainView.ID);
		mainView.setDownload(null);
		return true;
	}

	@Override
	public int open() {
		super.open();
		loadStatus();
		return Window.OK;
	}

}
