package tma.com.vn.chat.client.listener;

import java.util.Map;

import org.eclipse.jface.viewers.DoubleClickEvent;
import org.eclipse.jface.viewers.IDoubleClickListener;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.PlatformUI;

import tma.com.vn.chat.client.dialog.ChatBox;
import tma.com.vn.chat.client.view.MainView;

public class SelectChatterListener implements IDoubleClickListener {

	IWorkbenchPage page = PlatformUI.getWorkbench().getActiveWorkbenchWindow()
			.getActivePage();
	MainView mainView = (MainView) page.findView(MainView.ID);
	Map<String, ChatBox> chatBoxs;
	@Override
	public void doubleClick(DoubleClickEvent event) {
		// TODO Auto-generated method stub
		IStructuredSelection selection = (IStructuredSelection) event
				.getSelection();
		Object obj = selection.getFirstElement();
		String chaterName = (String) obj;
		chatBoxs = mainView.getChatBoxs();
		if (chatBoxs.containsKey(chaterName)) {
			ChatBox chatBox = chatBoxs.get(chaterName);
			// Focus on chosen ChatBox
			chatBox.open();
		} else {
			ChatBox chatBox = new ChatBox(mainView.getSite().getShell(), mainView.getUserInfo().getUserName(),
					chaterName);
			chatBoxs.put(chaterName, chatBox);
			chatBox.setBlockOnOpen(false);
			chatBox.open();
		}
	}
}
