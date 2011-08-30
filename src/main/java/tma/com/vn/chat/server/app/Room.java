package tma.com.vn.chat.server.app;

import java.io.Serializable;
import java.util.HashMap;
import java.util.Map;

public class Room implements Serializable{
	private String m_roomName;
	private Map<String, UserInfo> m_usersAccept = new HashMap<String, UserInfo>();
	

	private String m_bossRoom;
	
	public Room(String bossRoom, String roomName){
		this.m_bossRoom = bossRoom;
		this.m_roomName = roomName;
	}
	

	public String getRoomName() {
		return m_roomName;
	}

	public void setRoomName(String roomName) {
		this.m_roomName = roomName;
	}

	public String getBossRoom() {
		return m_bossRoom;
	}

	public void setBossRoom(String bossRoom) {
		this.m_bossRoom = bossRoom;
	}
	
	public Map<String, UserInfo> getUsersAccept() {
		return m_usersAccept;
	}
	
	public void addAccept(UserInfo user){
		this.m_usersAccept.put(user.getUserName(), user);
	}
	
	public void removeAccept(UserInfo user){
		if (m_usersAccept.containsKey(user.getUserName()))
			m_usersAccept.remove(user.getUserName());
	}
}
