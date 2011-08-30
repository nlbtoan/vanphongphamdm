package tma.com.vn.chat.server.dao;

import static org.mockito.Mockito.*;

import java.util.ArrayList;
import java.util.List;

import org.hibernate.SessionFactory;
import org.mockito.Mockito;
import org.springframework.dao.DataAccessException;
import org.springframework.dao.DataRetrievalFailureException;
import org.springframework.orm.hibernate3.HibernateTemplate;

import tma.com.vn.chat.server.app.User;

import junit.framework.TestCase;
public class ImplUserDAOTest extends TestCase{
	private UserDAOImpl m_implUserDAO;
	private SessionFactory m_sessionFactory;
	private HibernateTemplate m_hibernateTemplate;
	
	@Override
	protected void setUp(){
		m_sessionFactory = mock(SessionFactory.class);
		m_hibernateTemplate = mock(HibernateTemplate.class);
		m_implUserDAO = new UserDAOImpl(m_sessionFactory);
		m_implUserDAO.setHibernateTemplate(m_hibernateTemplate);
	}
	
	public void testInsertUser(){
		User user = new User("a","123");
		
		when(m_hibernateTemplate.save(user)).thenReturn(user);
		assertTrue(m_implUserDAO.insertUser(user));
		
		when(m_hibernateTemplate.save(user)).thenThrow(new DataRetrievalFailureException("test"));
		assertFalse(m_implUserDAO.insertUser(user));
	}
	

	
	public void testIsUserExist(){
		when(m_hibernateTemplate.find(anyString())).thenReturn(new ArrayList<User>());
		assertFalse(m_implUserDAO.isUserExist("abc"));
		List<User> users = new ArrayList<User>();
		users.add(new User("a","abc"));
		when(m_hibernateTemplate.find(anyString())).thenReturn(users);
		assertTrue(m_implUserDAO.isUserExist("abc"));
	}
	
	public void testIsLoginSuccess(){
		User user = new User("a","abc");
		when(m_hibernateTemplate.find(anyString())).thenReturn(new ArrayList<User>());
		assertFalse(m_implUserDAO.isLoginSuccess(user));
		
		List<User> users = new ArrayList<User>();
		users.add(user);
		when(m_hibernateTemplate.find(anyString())).thenReturn(users);
		assertTrue(m_implUserDAO.isLoginSuccess(user));
	}
}
