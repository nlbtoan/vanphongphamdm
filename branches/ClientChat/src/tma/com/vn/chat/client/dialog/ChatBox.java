package tma.com.vn.chat.client.dialog;

import java.io.File;
import java.util.concurrent.Executors;
import java.util.concurrent.ScheduledExecutorService;
import java.util.concurrent.TimeUnit;

import javax.jms.JMSException;
import javax.jms.ObjectMessage;

import org.apache.log4j.Logger;
import org.eclipse.jface.window.ApplicationWindow;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.FileDialog;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.swt.widgets.Text;
import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.forms.events.HyperlinkAdapter;
import org.eclipse.ui.forms.events.HyperlinkEvent;
import org.eclipse.ui.forms.widgets.Form;
import org.eclipse.ui.forms.widgets.FormToolkit;
import org.eclipse.ui.forms.widgets.Hyperlink;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.app.NamedThreadFactory;
import tma.com.vn.chat.client.app.ObjectChatMsg;
import tma.com.vn.chat.client.app.ObjectSendFileNoti;
import tma.com.vn.chat.client.app.ReciveFile;
import tma.com.vn.chat.client.app.ReciveFileManagement;
import tma.com.vn.chat.client.listener.ChatKeyListener;
import tma.com.vn.chat.client.listener.ChatMessageListener;
import tma.com.vn.chat.client.view.MainView;

public class ChatBox extends ApplicationWindow implements IChat {

	// private Button bt_enter;
	private Text txt_chatBox, txt_msgBox;
	private Button bt_sendFile;
	private String fromUser, toUser;
	private Hyperlink lk_accept, lk_deny, lk_archive, lk_fileName;
	private static final String[] FILTER_EXTS = { "*.*", "*.exe", "*.jpg",
			"*.txt", "*.xls", "*.csv" };
	private ReciveFile m_recFile = null;
	private static Logger m_log = Logger.getLogger(ChatService.class);
	private static final int POST_PROCESSING_CHECK_INTERVAL = 5; // seconds

	// private ScheduledExecutorService postProcessingExecutor;

	public void setReciveFile(ReciveFile recFile) {
		this.m_recFile = recFile;
	}

	public void setAcceptLinkVisible(final boolean visible) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				lk_accept.setVisible(visible);
			}
		});
	}

	public void setDenyLinkVisible(final boolean visible) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				lk_deny.setVisible(visible);
			}
		});
	}

	public void setTextDeny(final String text) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				lk_deny.setText(text);
			}
		});
	}

	public void setFileName(final String str) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				lk_fileName.setText(str);
			}
		});
	}

	private void setFileNameCompleted(final String status) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				lk_fileName.setText(lk_fileName.getText() + status);
			}
		});
	}

	private ChatMessageListener m_chatListener = new ChatMessageListener() {
		@Override
		public void newMessage(Object obj) {
			if (obj instanceof ObjectMessage) {
				receiveMessages((ObjectMessage) obj);
			}
		}
	};

	public ChatBox(Shell parentShell, String fromUser, String toUser) {
		super(parentShell);
		this.fromUser = fromUser;
		this.toUser = toUser;
		ChatService.SINGLETON.addMessageListener(m_chatListener);
	}

	protected Control createContents(final Composite parent) {
		getShell().setText(this.fromUser + " - " + this.toUser);
		FormToolkit toolkit = new FormToolkit(parent.getDisplay());
		final Form form = toolkit.createForm(parent);
		GridData gridData = new GridData(GridData.FILL_BOTH);
		form.getBody().setLayout(new GridLayout(3, true));

		gridData.widthHint = 200;
		gridData.heightHint = 150;
		gridData.horizontalSpan = 3;
		txt_chatBox = toolkit.createText(form.getBody(), null, SWT.MULTI
				| SWT.VERTICAL | SWT.WRAP);
		txt_chatBox.setLayoutData(gridData);
		txt_chatBox.setEditable(false);

		gridData = new GridData();
		gridData.verticalSpan = 2;
		bt_sendFile = toolkit.createButton(form.getBody(), "Send File",
				SWT.PUSH);
		bt_sendFile.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent event) {
				openFileDialog(parent);
			}
		});
		bt_sendFile.setLayoutData(gridData);

		gridData = new GridData();
		gridData.horizontalSpan = 2;
		lk_fileName = toolkit.createHyperlink(form.getBody(), "", SWT.NONE);
		lk_fileName.setVisible(true);
		lk_fileName.setLayoutData(gridData);

		lk_accept = toolkit.createHyperlink(form.getBody(), "Accept", SWT.NONE);
		lk_accept.setVisible(false);
		// Open dialog to save file when click Accept Link
		lk_accept.addHyperlinkListener(new HyperlinkAdapter() {
			@Override
			public void linkActivated(HyperlinkEvent e) {
				saveFileDialog(form);
			}
		});

		lk_deny = toolkit.createHyperlink(form.getBody(), "Deny", SWT.NONE);
		lk_deny.setVisible(false);

		gridData = new GridData(GridData.FILL_HORIZONTAL);
		gridData.heightHint = 30;
		gridData.horizontalSpan = 3;
		txt_msgBox = toolkit.createText(form.getBody(), "");
		txt_msgBox.setLayoutData(gridData);
		txt_msgBox.setTextLimit(500);

		txt_msgBox.addKeyListener(new ChatKeyListener(this));
		txt_msgBox.setFocus();
		return parent;
	}

	protected void saveFileDialog(Composite form) {
		if (m_recFile == null) {
			return;
		}
		// TODO Auto-generated method stub
		FileDialog dlg = new FileDialog(form.getShell(), SWT.SAVE);
		dlg.setFilterExtensions(FILTER_EXTS);
		String fileSaveName = dlg.open();
		if (fileSaveName != null) {
			m_recFile.setPathFile(fileSaveName);

			IWorkbenchPage page = PlatformUI.getWorkbench()
					.getActiveWorkbenchWindow().getActivePage();
			MainView mainView = (MainView) page.findView(MainView.ID);
			if (mainView.getDownload() == null) {
				Download dl = new Download(mainView.getParent().getShell(),
						fromUser);
				dl.open();
				mainView.setDownload(dl);
			}
			DownloadProgressComposite dlProgress = new DownloadProgressComposite(
					mainView.getDownload().getParent(), SWT.NONE);
			dlProgress.setFromUser(toUser);
			dlProgress.setSize(m_recFile.getSize());
			dlProgress.setFileName(m_recFile.getPathFile());
			mainView.getDownload().addProgres(dlProgress);
			m_recFile.addListener(dlProgress);
			// mainView.getDownload().open();

			// Save file here
			setAcceptLinkVisible(false);
			ChatService.SINGLETON.beginReciveFile(m_recFile, fileSaveName,
					toUser);
			// m_recFile = null;
			startPostProcessingExecutorRecive(ChatService.createKey(
					fileSaveName, toUser));

		}
	}

	protected void openFileDialog(Composite parent) {
		// TODO Auto-generated method stub
		FileDialog fileDialog = new FileDialog(parent.getShell());
		fileDialog.setText("Select a File");
		fileDialog.open();
		if (fileDialog != null) {
			// Set the text box to the new selection
			setFileName(fileDialog.getFileName());
			refersh();
			ChatService.SINGLETON.sendFile(fileDialog.getFilterPath()
					+ File.separator + fileDialog.getFileName(), toUser);
			startPostProcessingExecutorSend(ChatService.createKey(
					fileDialog.getFilterPath() + File.separator
							+ fileDialog.getFileName(), toUser));
		}
	}

	private void receiveMessages(ObjectMessage obj) {
		try {
			Object objMsg = obj.getObject();
			if (objMsg instanceof ObjectChatMsg) {
				ObjectChatMsg objChat = (ObjectChatMsg) objMsg;
				if ((objChat.getFrom().equals(toUser) && objChat.getTo()
						.equals(fromUser))) {
					showMessage(objChat.getFrom() + ": " + objChat.getTxtMsg());
				}
			} else if (objMsg instanceof ObjectSendFileNoti) {
				receiveFiles((ObjectSendFileNoti) objMsg);
			}
		} catch (JMSException error) {
			if (m_log.isDebugEnabled()) {
				m_log.debug("MainView - newMessage() - JMS Exception: ", error);
			}
		}
	}

	private void receiveFiles(ObjectSendFileNoti objSendFile) {
		// TODO Auto-generated method stub
		if (objSendFile.getTo().equals(fromUser)
				&& objSendFile.getFrom().equals(toUser)) {
			setAcceptLinkVisible(true);
			setDenyLinkVisible(true);
			setFileName(objSendFile.getFileName());
			refersh();
			setReciveFile(ReciveFileManagement.SINGLETON.createReciveFile(
					objSendFile.getHostName(), objSendFile.getPort(),
					objSendFile.getFileName(), objSendFile.getSize()));
		}
	}

	// Show message in Status Bar
	public void showMessage(final String txtMsg) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				txt_chatBox.append(txtMsg + "\n");
			}
		});
	}

	public void chat() {
		// TODO Auto-generated method stub
		ObjectChatMsg msgObj = new ObjectChatMsg(fromUser, toUser,
				txt_msgBox.getText());
		try {
			ChatService.SINGLETON.sendMessage(msgObj);
			showMessage(this.fromUser + " : " + txt_msgBox.getText());
			cleanMessage();
		} catch (JMSException error) {
			if (m_log.isDebugEnabled()) {
				m_log.debug("MainView - newMessage() - JMS Exception: ", error);
			}
		}
	}

	protected void cleanMessage() {
		this.txt_msgBox.setText("");
	}

	@Override
	public boolean close() {
		// Remove ChatBox just closed from ChatBoxList
		try {
			ChatService.SINGLETON
					.saveChatContent(toUser, txt_chatBox.getText());
		} catch (Exception e) {
			e.printStackTrace();
		}
		((MainView) PlatformUI.getWorkbench().getActiveWorkbenchWindow()
				.getActivePage().findView(MainView.ID)).getChatBoxs().remove(
				toUser);
		ChatService.SINGLETON.removeMessageListener(m_chatListener);
		super.close();
		return true;
	}

	private void startPostProcessingExecutorRecive(final String from_path) {
		final ScheduledExecutorService postProcessingExecutor = Executors
				.newSingleThreadScheduledExecutor(new NamedThreadFactory(
						"CheckReciveFile"));
		postProcessingExecutor.scheduleAtFixedRate(new Runnable() {
			@Override
			public void run() {

				if (ChatService.SINGLETON.chechReciveCompleted(from_path)) {
					setFileNameCompleted(" completed");
					setDenyLinkVisible(false);
					refersh();
					postProcessingExecutor.shutdown();
				}
			}

		}, POST_PROCESSING_CHECK_INTERVAL, POST_PROCESSING_CHECK_INTERVAL,
				TimeUnit.SECONDS);
	}

	private void refersh() {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				bt_sendFile.getParent().layout();
			}
		});
	}

	private void startPostProcessingExecutorSend(final String from_path) {
		final ScheduledExecutorService postProcessingExecutor = Executors
				.newSingleThreadScheduledExecutor(new NamedThreadFactory(
						"CheckReciveFile"));
		postProcessingExecutor.scheduleAtFixedRate(new Runnable() {
			@Override
			public void run() {

				if (ChatService.SINGLETON.checkSendCompleted(from_path)) {
					setFileNameCompleted(" completed");
					setDenyLinkVisible(false);
					refersh();
					postProcessingExecutor.shutdown();
				}
			}

		}, POST_PROCESSING_CHECK_INTERVAL, POST_PROCESSING_CHECK_INTERVAL,
				TimeUnit.SECONDS);
	}
}
