package tma.com.vn.chat.server.api;

import java.io.Serializable;
import java.util.Map;

import tma.com.vn.chat.server.app.ObjRoomMsg;
import tma.com.vn.chat.server.app.Room;
import tma.com.vn.chat.server.app.UserInfo;

public interface IUserManagement extends Serializable{
	public boolean register(String userName, String passwd);
	public boolean login(String userName, String passwd);
	public void logout(String userName);
	public void setStatus(UserInfo userInfo);
	public Map<String, UserInfo> getUserOnlines();
	public boolean createRoom(Room room);
	public void closeRoom(Room room);
	public void addInvite(Map<String, UserInfo> users, Room room);
	public Room accept(ObjRoomMsg roomInfo, UserInfo user);
	public void unJoin(UserInfo user, Room room);
}
