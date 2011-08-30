package tma.com.vn.chat.client.clientchat;


import org.eclipse.ui.IPageLayout;
import org.eclipse.ui.IPerspectiveFactory;
import tma.com.vn.chat.client.view.LoginView;

public class Perspective implements IPerspectiveFactory {

	public static final String ID = "ClientChat.perspective";

	public void createInitialLayout(IPageLayout layout) {
		String editorArea = layout.getEditorArea();
		layout.setEditorAreaVisible(false);
		layout.setFixed(false);
		layout.addStandaloneView(LoginView.ID,  false, IPageLayout.LEFT, 1.0f, editorArea);	
		
	}
}
