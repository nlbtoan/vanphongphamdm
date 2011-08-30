package tma.com.vn.chat.client.dialog;

import java.util.HashMap;
import java.util.Map;

import javax.jms.JMSException;
import javax.jms.ObjectMessage;

import org.eclipse.jface.viewers.ListViewer;
import org.eclipse.jface.window.ApplicationWindow;
import org.eclipse.swt.SWT;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.List;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.swt.widgets.Text;
import org.eclipse.ui.PlatformUI;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.app.ObjectChatRoomMsg;
import tma.com.vn.chat.client.listener.ChatKeyListener;
import tma.com.vn.chat.client.listener.ChatMessageListener;
import tma.com.vn.chat.client.listener.FriendInvitationListener;
import tma.com.vn.chat.client.model.FriendListContentProvider;
import tma.com.vn.chat.client.model.FriendListLabelProvider;
import tma.com.vn.chat.client.view.MainView;
import tma.com.vn.chat.server.app.UserInfo;

public class ChatRoom extends ApplicationWindow implements ChatMessageListener, IChat  {

	private String m_roomName;
	private String m_selfName;
	private Map<String, UserInfo> friendList = new HashMap<String, UserInfo>();
	private Text txt_chatBox;
	private ListViewer friendsViewer;

	public Map<String, UserInfo> getFriendList() {
		return friendList;
	}

	public void addFriend(String userName){
		friendList.put(userName, new UserInfo(userName, UserInfo.READYSTATUS));
		//refresh view list friendlist
		refeshTableViewer();
		
	}
	
	public void removeFriend(String userName){
		friendList.remove(userName);
		//refresh view list friendlist
		refeshTableViewer();
	}
	
	
	public void setFriendList(Map<String, UserInfo> friendList) {
		this.friendList = friendList;
//		refeshTableViewer();
	}


	private Text txt_chatMsg;

	public ListViewer getFriendsViewer() {
		return friendsViewer;
	}

	private Button bt_invite;
	private List list;

	public String getRoomName() {
		return m_roomName;
	}

	public String getM_selfName() {
		return m_selfName;
	}

	public ChatRoom(Shell parentShell, String roomName, String selfName) {
		super(parentShell);
		this.m_roomName = roomName;
		this.m_selfName = selfName;
		friendList.put(m_selfName, new UserInfo(m_selfName, UserInfo.READYSTATUS));
		ChatService.SINGLETON.addMessageListener(this);
	}

	public ChatRoom(Shell parentShell) {
		super(parentShell);
		friendList.put(m_selfName, new UserInfo(m_selfName, UserInfo.READYSTATUS));
		ChatService.SINGLETON.addMessageListener(this);
	}

	@Override
	protected Control createContents(final Composite parent) {

		parent.setLayout(new GridLayout(1, false));

		Composite top = new Composite(parent, SWT.NONE);
		getShell().setText("Chat Room: " + this.m_roomName);

		top.setLayout(new GridLayout(2, false));

		GridData gridData = new GridData(GridData.FILL_BOTH);
		gridData.widthHint = 200;
		gridData.heightHint = 150;
		gridData.verticalSpan = 2;
		txt_chatBox = new Text(top, SWT.MULTI | SWT.VERTICAL | SWT.WRAP | SWT.BORDER);
		txt_chatBox.setLayoutData(gridData);
		// txt_chatBox.setEditable(false);

		friendsViewer = new ListViewer(top);
		friendsViewer.setContentProvider(new FriendListContentProvider());
		friendsViewer.setLabelProvider(new FriendListLabelProvider());
		friendsViewer.setInput(friendList);

		gridData = new GridData(GridData.FILL_HORIZONTAL);
		gridData.heightHint = 200;
		list = friendsViewer.getList();
		list.setLayoutData(gridData);

		gridData = new GridData(SWT.NONE);
		bt_invite = new Button(top, SWT.PUSH);
		bt_invite.setText("  Invite  ");
		bt_invite.setLayoutData(gridData);
		bt_invite.addSelectionListener(new FriendInvitationListener(this));

		gridData = new GridData(GridData.FILL_BOTH);
		gridData.heightHint = 30;
		gridData.horizontalSpan = 2;
		txt_chatMsg = new Text(top, SWT.SINGLE | SWT.BORDER);
		txt_chatMsg.setLayoutData(gridData);
		txt_chatMsg.addKeyListener(new ChatKeyListener(this));
		txt_chatMsg.setTextLimit(500);
		txt_chatMsg.setFocus();

		return top;
	}

	protected void cleanMessage() {
		// TODO Auto-generated method stub
		this.txt_chatMsg.setText("");
	}
	
	public void setVisibleInvite(boolean visible){
		bt_invite.setVisible(visible);
	}
	
	
	/**
	 * Some Notification this method will get:
	 * - Get Accept join Chat Room, this user will be added to friendList, after that refesh Friend Viewer
	 * - Close Chat Room, if Owner close Chat Room, an message will send to other user to notify 
	 * that this Chat room will close. Nothing happen if this is not Chat Room owner
	 * - Get Cancel Chat Room notification, it mean chat room will be closed
	 */
	@Override
	public void newMessage(Object obj) {
		if (obj instanceof ObjectMessage) {
			receiveMessages(obj);
		} 
	}

	private void receiveMessages(Object obj) {
		// TODO Auto-generated method stub
		try {
			Object objMsg = ((ObjectMessage) obj).getObject();
			if (objMsg instanceof ObjectChatRoomMsg) {
				ObjectChatRoomMsg objChat = (ObjectChatRoomMsg) objMsg;
				if (objChat.getToRoom().equals(m_roomName)) {
					showMessage(objChat.getFromUser() + ": " + objChat.getMessage());
				}
			}
		} catch (JMSException ignor) {
			
		}
	}
	
	public void showMessage(final String txtMsg) {
		Display.getDefault().asyncExec(new Runnable() {
			@Override
			public void run() {
				txt_chatBox.append(txtMsg + "\n");
			}
		});
	}

	@Override
	public boolean close() {
		// Remove ChatBox just closed from ChatBoxList
		((MainView) PlatformUI.getWorkbench().getActiveWorkbenchWindow().getActivePage().findView(
				MainView.ID)).getChatRooms().remove(m_roomName);
		ChatService.SINGLETON.removeMessageListener(this);
		// If user that close room is Room Owner, a notify will be sent to room member
		// to said that this room had been canceled 
		// Do something here
				
		super.close();
		return true;
	}
	
	
	public void chat() {
		ObjectChatRoomMsg msgObj = new ObjectChatRoomMsg( m_selfName, m_roomName, txt_chatMsg.getText());
		try {
			ChatService.SINGLETON.sendMessageRoom(msgObj, friendList);
			cleanMessage();
		} catch (JMSException error) {
		}
	}
	
	private void refeshTableViewer() {
		friendsViewer.getList().getDisplay().asyncExec(new Runnable() {
			public void run() {
				friendsViewer.setInput(friendList);
				friendsViewer.refresh();
			}
		});
	}

}
