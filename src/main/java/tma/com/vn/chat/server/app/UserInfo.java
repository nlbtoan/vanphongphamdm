package tma.com.vn.chat.server.app;

import java.io.Serializable;

public class UserInfo implements Serializable{
	public static final String BUSYSTATUS = "BUSY";
	public static final String READYSTATUS = "READY";
	public static final String FREESTATUS = "FREE";

	private String m_userName;
	private String m_status;
	
	public UserInfo(String userName, String status) {
		this.m_userName = userName;
		this.m_status = status;
	}
	public String getUserName() {
		return m_userName;
	}
	public void setUserName(String userName) {
		this.m_userName = userName;
	}
	public String getStatus() {
		return m_status;
	}
	public void setStatus(String status) {
		this.m_status = status;
	}
	

}
