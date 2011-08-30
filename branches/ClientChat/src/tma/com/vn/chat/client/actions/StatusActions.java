package tma.com.vn.chat.client.actions;

import org.eclipse.jface.action.Action;
import org.eclipse.ui.PlatformUI;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.view.MainView;


public class StatusActions extends Action{
	public String status;
	MainView mainView = (MainView) PlatformUI.getWorkbench()
	.getActiveWorkbenchWindow().getActivePage().findView(MainView.ID);
	
	public StatusActions(String title, String status) {
		super(title);
		this.status = status;
	}
	
	public StatusActions(){
	}
	
	@Override
	public void run(){
		
		mainView.getUserInfo().setStatus(this.status);
		System.out.println(mainView.getUserInfo().getStatus());
		System.out.println("1234kl;1jgf");
		ChatService.SINGLETON.changeStatus(mainView.getUserInfo());
		super.run();
	}
	
	
}
