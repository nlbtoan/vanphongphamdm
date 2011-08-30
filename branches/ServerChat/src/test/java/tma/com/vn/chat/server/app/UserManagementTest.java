package tma.com.vn.chat.server.app;

import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.when;

import org.mockito.Mockito;

import tma.com.vn.chat.server.dao.IUserDAO;
import junit.framework.TestCase;

public class UserManagementTest extends TestCase {
	private IUserDAO m_daoService;
	private JmsSender m_jmsSender;
	private UserManagement m_userManagement;

	protected void setUp() {
		m_daoService = mock(IUserDAO.class);
		m_jmsSender = mock(JmsSender.class);
		m_userManagement = new UserManagement(m_daoService, m_jmsSender);
	}

	public void testRegister() {
		when(m_daoService.insertUser(Mockito.any(User.class)))
				.thenReturn(true);
		assertTrue(m_userManagement.register("a", "abc"));

		when(m_daoService.insertUser(Mockito.any(User.class))).thenReturn(
				false);
		assertFalse(m_userManagement.register("a", "abc"));
	}

	public void testLogin() {
		when(m_daoService.isLoginSuccess(Mockito.any(User.class))).thenReturn(
				true);
		Mockito.doNothing().when(m_jmsSender)
				.notifyAddClient(Mockito.anyString());
		assertTrue(m_userManagement.login("a", "abc"));
		// test getListUserOnline
		assertEquals(m_userManagement.getUserOnlines().size(), 1);

		when(m_daoService.isLoginSuccess(Mockito.any(User.class))).thenReturn(
				false);
		assertFalse(m_userManagement.login("a", "abc"));
	}

	public void testLogout() {
		Mockito.doNothing().when(m_jmsSender)
				.notifyRemoveClient(Mockito.anyString());
		m_userManagement.logout("a");
		assertEquals(m_userManagement.getUserOnlines().size(), 0);
	}

}
