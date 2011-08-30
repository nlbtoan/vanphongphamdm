package tma.com.vn.chat.server.app;

import java.io.Serializable;


public class MessageNotify implements Serializable{
	public static final String ADDCLIENT = "ADDCLIENT";
	public static final String REMOVECLIENT = "REMOVECLIENT";
	public static final String STATUS = "STATUS";
	
	private String m_typeNoti;
	private UserInfo m_userInfo;
	public MessageNotify(String typeNoti, UserInfo user) {
		super();
		this.m_typeNoti = typeNoti;
		this.m_userInfo = user;
	}
	public String getTypeNoti() {
		return m_typeNoti;
	}
	public void setTypeNoti(String typeNoti) {
		this.m_typeNoti = typeNoti;
	}
	public UserInfo getUser() {
		return m_userInfo;
	}
	public void setUser(UserInfo user) {
		this.m_userInfo = user;
	}
	
	
}
