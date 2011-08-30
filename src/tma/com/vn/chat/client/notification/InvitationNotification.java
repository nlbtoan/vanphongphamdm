package tma.com.vn.chat.client.notification;

import org.eclipse.jface.dialogs.IDialogConstants;
import org.eclipse.jface.dialogs.TitleAreaDialog;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Shell;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.server.app.ObjRoomMsg;

public class InvitationNotification extends TitleAreaDialog {

	private String m_roomName;
	private String m_owner;
	Button bt_accept;
	private ObjRoomMsg m_roomInfo;
	private String m_command = "Cancel";
	
	public String getRoomName() {
		return m_roomName;
	}

	public String getOwner() {
		return m_owner;
	}

	@Override
	protected void setShellStyle(int newShellStyle) {
		// TODO Auto-generated method stub
		super.setShellStyle(newShellStyle | SWT.RESIZE | SWT.MAX);
	}

	public InvitationNotification(Shell parentShell) {
		super(parentShell);
		// TODO Auto-generated constructor stub
	}

	public InvitationNotification(Shell parentShell, String roomName, String owner, ObjRoomMsg objMsg) {
		super(parentShell);
		this.m_roomName = roomName;
		this.m_owner = owner;
		this.m_roomInfo = objMsg;
	}

	@Override
	protected Control createDialogArea(Composite parent) {
		setTitle("Join in Chat room Notification");
		setMessage("You get an inviation from " + m_owner + " to enjoy Chat Room " + m_roomName);
		return parent;
	}

	@Override
	protected void createButtonsForButtonBar(Composite parent) {
		bt_accept = createButton(parent, IDialogConstants.OK_ID, IDialogConstants.OK_LABEL, true);
		bt_accept.setText(" Accept ");
		bt_accept.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent e) {
				// Register Process
				m_command = "Accept";
				close();
			}
		});
		createButton(parent, IDialogConstants.CANCEL_ID, IDialogConstants.CANCEL_LABEL, false);
	}

	public String getCommand() {
		return m_command;
	}

	public void setCommand(String command) {
		this.m_command = command;
	}

}
