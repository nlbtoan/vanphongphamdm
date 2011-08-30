package tma.com.vn.chat.client.view;

import java.util.HashMap;
import java.util.Map;

import javax.jms.JMSException;
import javax.jms.ObjectMessage;

import org.apache.log4j.Logger;
import org.eclipse.jface.action.Action;
import org.eclipse.jface.action.MenuManager;
import org.eclipse.jface.action.Separator;
import org.eclipse.jface.viewers.DoubleClickEvent;
import org.eclipse.jface.viewers.IDoubleClickListener;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.jface.viewers.TableViewer;
import org.eclipse.jface.viewers.TableViewerColumn;
import org.eclipse.swt.SWT;
import org.eclipse.swt.graphics.Font;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.Table;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.part.ViewPart;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.app.ObjectChatMsg;
import tma.com.vn.chat.client.app.ObjectSendFileNoti;
import tma.com.vn.chat.client.app.ReciveFileManagement;
import tma.com.vn.chat.client.dialog.ArchiveHistoryDialog;
import tma.com.vn.chat.client.dialog.ChatBox;
import tma.com.vn.chat.client.dialog.ChatRoom;
import tma.com.vn.chat.client.dialog.CreateRoomDialog;
import tma.com.vn.chat.client.dialog.Download;
import tma.com.vn.chat.client.listener.ChatMessageListener;
import tma.com.vn.chat.client.model.ChatterColumnLabelProvider;
import tma.com.vn.chat.client.model.ChatterListModelProvider;
import tma.com.vn.chat.client.model.StatusColumnLabelProvider;
import tma.com.vn.chat.client.notification.InvitationNotification;
import tma.com.vn.chat.server.app.MessageNotify;
import tma.com.vn.chat.server.app.ObjRoomMsg;
import tma.com.vn.chat.server.app.Room;
import tma.com.vn.chat.server.app.UserInfo;

public class MainView extends ViewPart implements ChatMessageListener {

	public static final String ADDCLIENT = "ADDCLIENT";
	public static final String REMOVECLIENT = "REMOVECLIENT";
	public static final String SEPARATOR = "_";
	public static final String ID = "ClientChat.mainView";
	public static final String BUSYSTATUS = "BUSY";
	public static final String READYSTATUS = "READY";
	public static final String FREESTATUS = "FREE";
	Composite m_top;
	private static Logger m_log = Logger.getLogger(ChatService.class);
	private Action m_logoutAction;
	private Action m_busyStAction, m_freeStAction, m_readyStAction, m_createRoomAction;

	protected UserInfo m_userInfo = new UserInfo("", UserInfo.READYSTATUS);
	
	private Download m_download;

	// Store the List of Users online, this List will be retrieved from Server
	private Map<String, UserInfo> onlineUsers;
	// Store information of it own User
	// Store the Chat Dialog Box of this User
	private Map<String, ChatBox> chatBoxs = new HashMap<String, ChatBox>();
	private Map<String, ChatRoom> chatRooms = new HashMap<String, ChatRoom>();

	public Map<String, ChatRoom> getChatRooms() {
		return chatRooms;
	}

	private Table table;
	private TableViewer tableViewer;
	private Action m_viewArchive;
	private Action m_downloadAction;

	public Map<String, ChatBox> getChatBoxs() {
		return chatBoxs;
	}

	public MainView() {
		// TODO Auto-generated constructor stub
	}

	public UserInfo getUserInfo() {
		return m_userInfo;
	}

	public void setUserInfo(UserInfo user) {
		this.m_userInfo = user;

	}

	@Override
	public void createPartControl(final Composite parent) {
		
		// Get UserOnline from Server in Init
		onlineUsers = ChatService.SINGLETON.getUsersOnline();

		// Get LoginView in Workbench
		LoginView loginView = (LoginView) PlatformUI.getWorkbench().getActiveWorkbenchWindow()
				.getActivePage().findView(LoginView.ID);
		setUserInfo(loginView.getUserInfo());

		// Add Logout Button
		createActions();
		createMenu();

		// Get the information of Chatter in LoginView, using for MainView
		parent.getShell().setText("Hello " + getUserInfo().getUserName());

		// Hide LoginView
		PlatformUI.getWorkbench().getActiveWorkbenchWindow().getActivePage().hideView(loginView);
		// Get the content for the viewer, setInput will call getElements in the
		// Make the selection available to other views
		tableViewer = new TableViewer(parent, SWT.NONE);
		tableViewer.setContentProvider(new ChatterListModelProvider());

		table = tableViewer.getTable();
		table.setLinesVisible(true);
		table.setHeaderVisible(true);
		table.setLayoutData(new GridData(GridData.FILL_BOTH));
		table.setFont(new Font(parent.getDisplay(), "Arial", 12, SWT.NORMAL));

		// Set value for each Column
		TableViewerColumn usernameViewerColumn = new TableViewerColumn(tableViewer, SWT.NONE);
		usernameViewerColumn.getColumn().setWidth(100);
		usernameViewerColumn.getColumn().setText("Chat List");
		usernameViewerColumn.getColumn().setMoveable(true);
		usernameViewerColumn.getColumn().setResizable(true);
		usernameViewerColumn.setLabelProvider(new ChatterColumnLabelProvider());

		TableViewerColumn statusViewerColumn = new TableViewerColumn(tableViewer, SWT.NONE);
		statusViewerColumn.getColumn().setWidth(100);
		statusViewerColumn.getColumn().setText("Status");
		statusViewerColumn.getColumn().setMoveable(true);
		statusViewerColumn.getColumn().setResizable(true);
		statusViewerColumn.setLabelProvider(new StatusColumnLabelProvider());

		tableViewer.addDoubleClickListener(new IDoubleClickListener() {
			@Override
			public void doubleClick(DoubleClickEvent event) {
				// Get value of TableViewer Row
				openChatBox(event);
			}
		});
		// Set value for Provider
		tableViewer.setInput(onlineUsers);

		ChatService.SINGLETON.addMessageListener(this);
		m_top = parent;
//		m_download = new Download(parent.getShell(),m_userInfo.getUserName());
//		m_download.open();
	}
	
	public Download getDownload(){
		return m_download;
	}
	
	public void setDownload(Download dl){
		m_download = dl;
	}
	
	
	public Composite getParent(){
		return m_top;
	}

	protected void openChatBox(DoubleClickEvent event) {
		// TODO Auto-generated method stub
		IStructuredSelection selection = (IStructuredSelection) event.getSelection();
		UserInfo obj = (UserInfo) selection.getFirstElement();
		String chaterName = (String) obj.getUserName();
		if (chatBoxs.containsKey(chaterName)) {
			ChatBox chatBox = chatBoxs.get(chaterName);
			// Focus on chosen ChatBox
			chatBox.open();
		} else {
			ChatBox chatBox = new ChatBox(getSite().getShell(), getUserInfo().getUserName(),
					chaterName);
			chatBoxs.put(chaterName, chatBox);
			chatBox.setBlockOnOpen(false);
			chatBox.open();
		}
	}

	public void createMenu() {
		// TODO Auto-generated method stub
		MenuManager mgr = (MenuManager) getViewSite().getActionBars().getMenuManager();
		mgr.add(m_freeStAction);
		mgr.add(m_readyStAction);
		mgr.add(m_busyStAction);
		mgr.add(new Separator());
		mgr.add(m_createRoomAction);
		mgr.add(m_viewArchive);
		mgr.add(new Separator());
		mgr.add(m_downloadAction);
		mgr.add(new Separator());
		mgr.add(m_logoutAction);
		
	}

	public void createActions() {
		// TODO Auto-generated method stub

		m_logoutAction = new Action("Logout") {
			public void run() {
				// Dispose Composite, and Logout
				// Logout method is in dispose method that override from parent
				dispose();
				PlatformUI.getWorkbench().close();
			}
		};

		m_freeStAction = new Action("Free") {
			public void run() {
				getUserInfo().setStatus(FREESTATUS);
				ChatService.SINGLETON.changeStatus(getUserInfo());
			}
		};

		m_readyStAction = new Action("Ready") {
			public void run() {
				getUserInfo().setStatus(READYSTATUS);
				ChatService.SINGLETON.changeStatus(getUserInfo());
			}
		};

		m_busyStAction = new Action("Do not Disturb") {
			public void run() {
				getUserInfo().setStatus(BUSYSTATUS);
				ChatService.SINGLETON.changeStatus(getUserInfo());
			}
		};

		m_createRoomAction = new Action("Create Chat Room") {
			public void run() {
				CreateRoomDialog createRoomDialog = new CreateRoomDialog(getViewSite().getShell());
				createRoomDialog.open();
				if (createRoomDialog.getRoomName() != null) {
					String roomName = createRoomDialog.getRoomName();
					if (chatRooms.containsKey(roomName)) {
						ChatRoom chatRoom = chatRooms.get(roomName);
						// Focus on chosen ChatBox
						chatRoom.open();
					} else {
						ChatRoom chatRoom = new ChatRoom(getSite().getShell(), roomName,
								getUserInfo().getUserName());
						ChatService.SINGLETON.createRoom(roomName);
						chatRooms.put(roomName, chatRoom);
						chatRoom.setBlockOnOpen(false);
						chatRoom.open();
					}
				}
			}
		};

		m_viewArchive = new Action("View Archive") {
			public void run() {
				ArchiveHistoryDialog archiveDialog = new ArchiveHistoryDialog(getSite().getShell(),
						getUserInfo().getUserName());
				archiveDialog.open();
			}
		};
		m_downloadAction = new Action("Downloads"){
			public void run(){
				if (m_download == null){
					m_download = new Download(getParent().getShell(), m_userInfo.getUserName());
					m_download.open();
				}
			}
		};
	}

	@Override
	public void setFocus() {
		// TODO Auto-generated method stub
		tableViewer.getControl().setFocus();
	}

	/**
	 * Message coming There are 2 type of Message: ObjectMessage: message have responsibility to
	 * notify that an User just login or logout ObjectChatMessage: notify that another User just
	 * send text message to this User
	 */
	@Override
	public void newMessage(Object message) {
		if (message instanceof ObjectMessage) {
			try {
				Object objMsg = ((ObjectMessage) message).getObject();
				if (objMsg instanceof MessageNotify) {
					// Update when receiving a message notify add or remove User
					handleNotify(objMsg);
				} else if (objMsg instanceof ObjectChatMsg) {
					// Open new or Reuse current ChatBox when receiving a
					// message chat
					handleChat(objMsg);
				} else if (objMsg instanceof ObjectSendFileNoti) {
					handleReciveFile((ObjectSendFileNoti) objMsg);
				} else if (objMsg instanceof ObjRoomMsg){
					handleRoomNoti((ObjRoomMsg)objMsg);
				}
			} catch (JMSException error) {
				// TODO Auto-generated catch block
				m_log.debug("MainView - newMessage() - JMS Exception", error);
			}
		}
	}

	private void handleRoomNoti(final ObjRoomMsg objMsg) {
		//Noti invite
		if (objMsg.getType().equals(ObjRoomMsg.INVITE)){
			//show dialog 
			Display.getDefault().asyncExec(new Runnable() {
				@Override
				public void run() {
					InvitationNotification inviteNotification = new InvitationNotification(getViewSite().getShell(), objMsg.getBossRoom(), objMsg.getToRoomName(), objMsg);
					inviteNotification.open();
					//if accept create chatRoom
					if(inviteNotification != null && inviteNotification.getCommand().equals("Accept")){
						Room room = ChatService.SINGLETON.accept(objMsg);
						ChatRoom chatRoom = new ChatRoom(getSite().getShell(), room.getRoomName(),
								getUserInfo().getUserName());
						ChatService.SINGLETON.createRoom(room.getRoomName());
						chatRooms.put(room.getRoomName(), chatRoom);
						chatRoom.setFriendList(room.getUsersAccept());
						chatRoom.setBlockOnOpen(false);
						chatRoom.open();
						chatRoom.setVisibleInvite(false);
					}
				}
			});
			 //Noti one user unjoin room
		}else if(objMsg.getType().equals(ObjRoomMsg.UNJOIN)){
			System.out.println("Room name remove: "+objMsg.getToRoomName());
			chatRooms.get(objMsg.getToRoomName()).removeFriend(objMsg.getFromUser());

			//Noti one user join room
		}else if (objMsg.getType().equals(ObjRoomMsg.JOIN)){
			chatRooms.get(objMsg.getToRoomName()).addFriend(objMsg.getFromUser());
		}
		
	}

	private void handleChat(Object objMsg) {
		// TODO Auto-generated method stub
		final ObjectChatMsg objChatMsg = (ObjectChatMsg) objMsg;
		if (!chatBoxs.containsKey(objChatMsg.getFrom())
				&& objChatMsg.getTo().equals(getUserInfo().getUserName())) {
			Display.getDefault().asyncExec(new Runnable() {
				@Override
				public void run() {
					ChatBox chatBox = new ChatBox(getSite().getShell(),
							getUserInfo().getUserName(), objChatMsg.getFrom());
					chatBoxs.put(objChatMsg.getFrom(), chatBox);
					chatBox.setBlockOnOpen(false);
					chatBox.open();
					chatBox.showMessage(objChatMsg.getFrom() + ": " + objChatMsg.getTxtMsg());
				}
			});
		}

	}

	private void handleNotify(Object objMsg) {
		// TODO Auto-generated method stub
		MessageNotify msgNoti = (MessageNotify) objMsg;
		UserInfo msgUser = msgNoti.getUser();
		String msgUserName = msgUser.getUserName();
		String notiType = msgNoti.getTypeNoti();

		if (notiType.equals(MessageNotify.ADDCLIENT)) {
			onlineUsers.put(msgUserName, msgUser);
		} else if (notiType.equals(MessageNotify.REMOVECLIENT)
				&& onlineUsers.containsKey(msgUserName)) {
			onlineUsers.remove(msgUserName);
		} else {
			onlineUsers.get(msgUserName).setStatus(msgUser.getStatus());
		}
		refeshTableViewer();
	}

	// Refresh TableViewer
	private void refeshTableViewer() {
		// TODO Auto-generated method stub
		tableViewer.getTable().getDisplay().asyncExec(new Runnable() {
			public void run() {
				tableViewer.setInput(onlineUsers);
				tableViewer.refresh();
			}
		});
	}

	private void handleReciveFile(final ObjectSendFileNoti objSendFile) {
		if (!chatBoxs.containsKey(objSendFile.getFrom())
				&& objSendFile.getTo().equals(getUserInfo().getUserName())) {
			Display.getDefault().asyncExec(new Runnable() {
				@Override
				public void run() {
					ChatBox chatBox = new ChatBox(getSite().getShell(),
							getUserInfo().getUserName(), objSendFile.getFrom());
					chatBoxs.put(objSendFile.getFrom(), chatBox);
					chatBox.setBlockOnOpen(false);
					chatBox.open();
					chatBox.setAcceptLinkVisible(true);
					chatBox.setDenyLinkVisible(true);
					chatBox.setFileName(objSendFile.getFileName());
					chatBox.setReciveFile(ReciveFileManagement.SINGLETON.createReciveFile(
							objSendFile.getHostName(), objSendFile.getPort(), objSendFile
									.getFileName(), objSendFile.getSize()));
				}
			});
		}
	}
	
}
