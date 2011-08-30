package tma.com.vn.chat.client.dialog;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

import org.eclipse.jface.dialogs.IDialogConstants;
import org.eclipse.jface.dialogs.TitleAreaDialog;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.jface.viewers.ListViewer;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Layout;
import org.eclipse.swt.widgets.List;
import org.eclipse.swt.widgets.Shell;

import tma.com.vn.chat.client.app.ChatService;
import tma.com.vn.chat.client.model.FriendListContentProvider;
import tma.com.vn.chat.client.model.FriendListLabelProvider;
import tma.com.vn.chat.server.app.UserInfo;

public class InvitationListDialog extends TitleAreaDialog {

	private ListViewer friendsViewer;
	private List list;
	private Map<String, UserInfo> onlineFriendList = new HashMap<String, UserInfo>();
	public Map<String, UserInfo> chosenFriendList = new HashMap<String, UserInfo>();

	public Map<String, UserInfo> getChosenFriendList() {
		return chosenFriendList;
	}

	public InvitationListDialog(Shell parentShell) {
		super(parentShell);
		// TODO Auto-generated constructor stub
	}

	@Override
	protected Control createDialogArea(Composite parent) {
		onlineFriendList = ChatService.SINGLETON.getUsersOnline();
		getShell().setText("Friend Invitation Dialog");
		Layout layout = new GridLayout(1, false);
		parent.setLayout(layout);

		friendsViewer = new ListViewer(parent);
		friendsViewer.setContentProvider(new FriendListContentProvider());
		friendsViewer.setLabelProvider(new FriendListLabelProvider());
		friendsViewer.setInput(onlineFriendList);
		GridData gridData = new GridData(GridData.FILL_HORIZONTAL);
		gridData.heightHint = 100;
		list = friendsViewer.getList();
		list.setLayoutData(gridData);

		return parent;

	}

	@Override
	protected void createButtonsForButtonBar(Composite parent) {

		Button bt_invite = createButton(parent, SWT.OPEN, "Open", true);
		bt_invite.setText(" Invite ");
		bt_invite.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent e) {
				IStructuredSelection selections = (IStructuredSelection) friendsViewer
						.getSelection();
				Iterator iterator = selections.iterator();
				
				while(iterator.hasNext()){
					UserInfo friend = (UserInfo) iterator.next();
					chosenFriendList.put(friend.getUserName(), friend);
				}
				close();
			}
		});
		createButton(parent, IDialogConstants.CANCEL_ID, IDialogConstants.CANCEL_LABEL, false);
	}
}
