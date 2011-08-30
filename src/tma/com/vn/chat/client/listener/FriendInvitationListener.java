package tma.com.vn.chat.client.listener;

import java.util.HashMap;
import java.util.Map;

import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.events.SelectionListener;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.dialog.ChatRoom;
import tma.com.vn.chat.client.dialog.InvitationListDialog;
import tma.com.vn.chat.server.app.UserInfo;

public class FriendInvitationListener implements SelectionListener {
	
	
	ChatRoom chatRoom;
	private Map<String, UserInfo> inviteFriendList = new HashMap<String, UserInfo>();
	public FriendInvitationListener(ChatRoom chatRoom) {
		// TODO Auto-generated constructor stub
		this.chatRoom = chatRoom;
	}

	@Override
	public void widgetDefaultSelected(SelectionEvent e) {
		// TODO Auto-generated method stub
	
	}

	@Override
	public void widgetSelected(SelectionEvent e) {
		// TODO Auto-generated method stub
		InvitationListDialog inviteDialog = new InvitationListDialog(chatRoom.getShell());
		inviteDialog.open();
		if(inviteDialog != null){
			inviteDialog.getChosenFriendList();
			for(Object user: inviteDialog.getChosenFriendList().values().toArray()){
				UserInfo userInfo = (UserInfo) user;
				inviteFriendList.put(userInfo.getUserName(), userInfo);
			}
			// Send Invitation Here ...
			System.out.println(inviteFriendList.size());
			ChatService.SINGLETON.addInvite(inviteFriendList, chatRoom.getRoomName());
			inviteFriendList = new HashMap<String, UserInfo>();
		}
		//chatRoom.getFriendsViewer().refresh();
	}
}
