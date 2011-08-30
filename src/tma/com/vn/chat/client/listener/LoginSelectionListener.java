package tma.com.vn.chat.client.listener;

import org.apache.log4j.Logger;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.events.SelectionListener;
import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.PartInitException;
import org.eclipse.ui.PlatformUI;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.view.LoginView;
import tma.com.vn.chat.client.view.MainView;

public class LoginSelectionListener implements SelectionListener {
	private static Logger m_log = Logger.getLogger(ChatService.class);

	@Override
	public void widgetDefaultSelected(SelectionEvent e) {
		// TODO Auto-generated method stub
	}

	@Override
	public void widgetSelected(SelectionEvent e) {
		// TODO Auto-generated method stub
		IWorkbenchPage page = PlatformUI.getWorkbench().getActiveWorkbenchWindow().getActivePage();
		LoginView loginView = (LoginView) page.findView(LoginView.ID);

		String userName = loginView.getTxt_username().getText().toString();
		String password = loginView.getTxt_password().getText().toString();
		if (userName == null || userName.equals("") || password == null || password.equals("")) {
			loginView.showMessageInStatusLine("Please enter Username and Password");
		} else {
			if (ChatService.SINGLETON.login(userName, password)) {
				// Success
				try {
					loginView.getUserInfo().setUserName(userName);
					page.showView(MainView.ID);
				} catch (PartInitException error) {
					// TODO Auto-generated catch block
					m_log.debug("LoginSelectionListener - widgetSelected() -PartInit Exception",
							error);
				}
			} else {
				loginView.showMessageInStatusLine("Username or Password invalid");

			}
		}
	}

}
