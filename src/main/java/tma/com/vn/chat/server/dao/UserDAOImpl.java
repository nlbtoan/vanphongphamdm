package tma.com.vn.chat.server.dao;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.hibernate.SessionFactory;
import org.springframework.dao.DataAccessException;
import org.springframework.orm.hibernate3.HibernateTemplate;

import tma.com.vn.chat.server.app.User;

public class UserDAOImpl implements IUserDAO {
	private static Log m_log = LogFactory.getLog(UserDAOImpl.class);
	
	private HibernateTemplate m_hibernateTemplate;

	public UserDAOImpl(SessionFactory sessionFactory) {
		this.m_hibernateTemplate = new HibernateTemplate(sessionFactory);
	}

	public HibernateTemplate getHibernateTemplate() {
		return m_hibernateTemplate;
	}
	
	public void setHibernateTemplate(HibernateTemplate hibernateTemp){
		this.m_hibernateTemplate = hibernateTemp;
	}

	public boolean insertUser(User user) {
		try {
			m_log.info("Inser user");
			this.m_hibernateTemplate.save(user);
			return true;
		} catch (DataAccessException e) {
			m_log.debug("Insert user error"+ e);
			return false;
		}
	}

	public boolean isUserExist(String userName) {
		try {
			m_log.info("Check user exist.");
			if (m_hibernateTemplate.find(
					String.format("from User user where userName = '%s'",
							userName)).size() != 0)
				return true;
		} catch (DataAccessException error) {
			m_log.debug("Query error: ", error);
		}
		return false;
	}

	public boolean isLoginSuccess(User user) {
		try {
			m_log.info("Check login");
			if (m_hibernateTemplate
					.find(String
							.format("from User user where userName = '%s' and passwd = '%s'",
									user.getUserName(), user.getPasswd()))
					.size() != 0)
				return true;
		} catch (DataAccessException error) {
			m_log.debug("Check login: ", error);
		}
		return false;
	}
}
