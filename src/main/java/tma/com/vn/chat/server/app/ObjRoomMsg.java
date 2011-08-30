package tma.com.vn.chat.server.app;

import java.io.Serializable;

public class ObjRoomMsg implements Serializable{
	public static final String MESSAGE = "MESSAGE";
	public static final String ADDROOM = "ADDROOM";
	public static final String REMOVEROOM = "REMOVEROOM";
	public static final String INVITE = "INVITE";
	public static final String UNJOIN = "UNJOIN";
	public static final String JOIN = "JOIN";
	
	private String m_toRoomName;
	private String m_bossRoom;
	private String m_fromUser;
	private String m_message;
	private String m_type;
	public ObjRoomMsg(String toRoomName, String bossRoom, String fromUser,
			String message, String type) {
		super();
		this.m_toRoomName = toRoomName;
		this.m_bossRoom = bossRoom;
		this.m_fromUser = fromUser;
		this.m_message = message;
		this.m_type = type;
	}
	public String getToRoomName() {
		return m_toRoomName;
	}
	public void setToRoomName(String toRoomName) {
		this.m_toRoomName = toRoomName;
	}
	public String getBossRoom() {
		return m_bossRoom;
	}
	public void setBossRoom(String bossRoom) {
		this.m_bossRoom = bossRoom;
	}
	public String getFromUser() {
		return m_fromUser;
	}
	public void setFromUser(String fromUser) {
		this.m_fromUser = fromUser;
	}
	public String getMessage() {
		return m_message;
	}
	public void setMessage(String message) {
		this.m_message = message;
	}
	public String getType() {
		return m_type;
	}
	public void setType(String type) {
		this.m_type = type;
	}
	
}
