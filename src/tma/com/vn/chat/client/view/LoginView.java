package tma.com.vn.chat.client.view;

import org.eclipse.swt.SWT;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Event;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Link;
import org.eclipse.swt.widgets.Listener;
import org.eclipse.swt.widgets.Text;
import org.eclipse.ui.IActionBars;
import org.eclipse.ui.part.ViewPart;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.dialog.Download;
import tma.com.vn.chat.client.dialog.RegisterDialog;
import tma.com.vn.chat.client.listener.LoginSelectionListener;
import tma.com.vn.chat.server.app.UserInfo;
public class LoginView extends ViewPart {

	public static final String ID = "ClientChat.loginView";
	protected Text txt_username;
	protected Text txt_password;
	private Button bt_login;
	public UserInfo m_userInfo = new UserInfo("", "Free");

	public UserInfo getUserInfo() {
		return m_userInfo;
	}

	public Text getTxt_username() {
		return txt_username;
	}

	public Text getTxt_password() {
		return txt_password;
	}

	public LoginView() {
		// TODO Auto-generated constructor stub
	}

	@Override
	public void createPartControl(final Composite parent) {
		// TODO Auto-generated method stub
//		TesetDiablog registerDialog = new TesetDiablog(parent.getShell());
//		registerDialog.open();
//		InvitationNotification inviteNotification = new InvitationNotification(parent.getShell(), "LongVuong", "ChatRoom2");
//		inviteNotification.open();
		GridLayout layout = new GridLayout();
		layout.marginWidth = 60;
		layout.marginHeight = 60;
		parent.setLayout(layout);

		Label lb_username = new Label(parent, SWT.NONE);
		lb_username.setText("User Name");
		

		GridData gridData = new GridData(GridData.HORIZONTAL_ALIGN_CENTER);
		gridData.widthHint = 120;
		gridData.heightHint = 15;
		txt_username = new Text(parent, SWT.SINGLE | SWT.BORDER);
		txt_username.setTextLimit(40);
		txt_username.setLayoutData(gridData);
		txt_username.setFocus();

		Label lb_password = new Label(parent, SWT.NONE);
		lb_password.setText("Password");
		txt_password = new Text(parent, SWT.PASSWORD | SWT.SINGLE | SWT.BORDER);
		txt_password.setLayoutData(new GridData(120, 15));
		txt_password.setTextLimit(40);
		
		bt_login = new Button(parent, SWT.PUSH);
		bt_login.setText(" Login ");
		bt_login.setLayoutData(new GridData(GridData.HORIZONTAL_ALIGN_CENTER));
		bt_login.addSelectionListener(new LoginSelectionListener());

		Link link = new Link(parent, SWT.NONE);
		link.setText("Click here to <a>Register</a>");
		link.setSize(400, 400);
		link.addListener(SWT.Selection, new Listener() {
			public void handleEvent(Event event) {
				RegisterDialog registerDialog = new RegisterDialog(parent.getShell());
				registerDialog.open();
				if (registerDialog.getChatterName() != null) {
					ChatService.SINGLETON.register(registerDialog.getChatterName(), registerDialog.getChaterPassword());
					showMessageInStatusLine("Your account has been created!");
				}
			}
		});
	}
	
	@Override
	public void setFocus() {
		// TODO Auto-generated method stub
		bt_login.setFocus();
	}

	// Show message on Status Line
	public void showMessageInStatusLine(String string) {
		// TODO Auto-generated method stub
		IActionBars bars = getViewSite().getActionBars();
		bars.getStatusLineManager().setMessage(string);
	}
}
