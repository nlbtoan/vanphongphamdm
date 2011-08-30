package tma.com.vn.chat.server.dao;

import tma.com.vn.chat.server.app.User;


public interface IUserDAO {
	public boolean insertUser(User user);
	public boolean isUserExist(String userName);
	public boolean isLoginSuccess(User user);

}
