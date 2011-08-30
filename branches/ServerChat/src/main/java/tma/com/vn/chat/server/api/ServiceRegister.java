package tma.com.vn.chat.server.api;

import org.jboss.system.ServiceMBeanSupport;
import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class ServiceRegister extends ServiceMBeanSupport implements
		ServiceRegisterMBean {
	private ApplicationContext m_context = null;

	// The lifecycle
	protected void startService() throws Exception {
		m_context = new ClassPathXmlApplicationContext(
				"/META-INF/spring-jms.xml");
	}

	protected void stopService() throws Exception {
		((ClassPathXmlApplicationContext) m_context).close();
	}
}
