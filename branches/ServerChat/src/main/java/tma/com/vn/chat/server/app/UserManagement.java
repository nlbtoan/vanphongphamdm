package tma.com.vn.chat.server.app;

import java.util.HashMap;
import java.util.Map;

import tma.com.vn.chat.server.api.IUserManagement;
import tma.com.vn.chat.server.dao.IUserDAO;

public class UserManagement implements IUserManagement {
	private Map<String, UserInfo> userOnlines = new HashMap<String, UserInfo>();
	private IUserDAO m_daoService;
	private JmsSender m_jmsSender;
	private Map<String, Room> rooms = new HashMap<String, Room>();

	public UserManagement(IUserDAO daoService, JmsSender jmsSender) {
		this.m_daoService = daoService;
		this.m_jmsSender = jmsSender;
	}

	public void setDaoService(IUserDAO daoService) {
		this.m_daoService = daoService;
	}

	public IUserDAO getDaoService() {
		return m_daoService;
	}

	public void setJmsSender(JmsSender jmsSender) {
		this.m_jmsSender = jmsSender;
	}

	public JmsSender getJmsSender() {
		return m_jmsSender;
	}

	@Override
	public boolean register(String userName, String passwd) {
		return m_daoService.insertUser(new User(userName, passwd));
	}

	@Override
	public boolean login(String userName, String passwd) {
		User user = new User(userName, passwd);
		if (!userOnlines.containsKey(userName)){
			if (m_daoService.isLoginSuccess(user)) {
				userOnlines.put(userName, new UserInfo(userName, UserInfo.READYSTATUS));
				// notify for all client update list users online
				m_jmsSender.notifyAddClient(userName);
				return true;
			}
		}
		return false;
	}

	@Override
	public Map<String, UserInfo> getUserOnlines() {
		return userOnlines;
	}

	@Override
	public void logout(String userName) {
		userOnlines.remove(userName);
		// notify for all client update list usrs online
		m_jmsSender.notifyRemoveClient(userName);
	}

	@Override
	public void setStatus(UserInfo userInfo) {
		if(userOnlines.containsKey(userInfo.getUserName())){
			userOnlines.get(userInfo.getUserName()).setStatus(userInfo.getStatus());
			m_jmsSender.notifyStatusClient(userInfo);
		}
	}
	

	@Override
	public void addInvite(Map<String, UserInfo> users, Room room) {
		if (rooms.containsKey(room.getBossRoom()+room.getRoomName())){
//			rooms.get(room.getBossRoom()+room.getRoomName()).addInvite(users);
			m_jmsSender.notiInvitation(users, room);
		}
	}

	@Override
	public boolean createRoom(Room room) {
		if(!rooms.containsKey(room.getBossRoom()+room.getRoomName())){
			room.addAccept(new UserInfo(room.getBossRoom(), UserInfo.READYSTATUS));
			this.rooms.put(room.getBossRoom()+room.getRoomName(), room);
			return true;
		}
		return false;
	}
	
	@Override
	public void closeRoom(Room room){
		if(rooms.containsKey(room.getBossRoom()+room.getRoomName())){
			Room roomRemove = rooms.remove(room.getBossRoom()+room.getRoomName());
			m_jmsSender.notiRemoveRoom(roomRemove.getUsersAccept(), roomRemove);
		}
	}

	@Override
	public Room accept(ObjRoomMsg roomInfo, UserInfo user) {
		Room room = new Room(user.getUserName(), roomInfo.getToRoomName());
		if (rooms.containsKey(roomInfo.getBossRoom()+roomInfo.getToRoomName())){
			room = rooms.get(roomInfo.getBossRoom()+roomInfo.getToRoomName());
			room.addAccept(user);
			m_jmsSender.notiJoin(room.getUsersAccept(), rooms.get(roomInfo.getBossRoom()+roomInfo.getToRoomName()), user.getUserName());
		}
		return room;
	}
	
	@Override
	public void unJoin(UserInfo user, Room room){
		if (rooms.containsKey(room.getBossRoom()+room.getRoomName())){
			rooms.get(room.getBossRoom()+room.getRoomName()).removeAccept(user);
			m_jmsSender.notiUnjoin(rooms.get(room.getBossRoom()+room.getRoomName()).getUsersAccept(), room);
		}
	}

}
