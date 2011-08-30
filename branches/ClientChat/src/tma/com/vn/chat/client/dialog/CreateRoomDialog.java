package tma.com.vn.chat.client.dialog;

import org.eclipse.jface.dialogs.IDialogConstants;
import org.eclipse.jface.dialogs.TitleAreaDialog;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.swt.widgets.Text;

public class CreateRoomDialog extends TitleAreaDialog {

	private Label lb_roomName;
	private Text txt_roomName;
	private Button bt_createRoom;
	public String roomName;

	public CreateRoomDialog(Shell parentShell) {
		super(parentShell);
		// TODO Auto-generated constructor stub
	}

	public String getRoomName() {
		return roomName;
	}

	protected Control createDialogArea(Composite parent) {
		setTitle("Create Room");
		GridLayout gridLayout = new GridLayout(2, false);
		parent.setLayout(gridLayout);
		parent.setBounds(200, 200, 250, 100);

		lb_roomName = new Label(parent, SWT.NONE);
		lb_roomName.setText("Room Name");

		txt_roomName = new Text(parent, SWT.SINGLE | SWT.BORDER);
		txt_roomName.setLayoutData(new GridData(120, 15));
		txt_roomName.setTextLimit(50);
		return parent;
	}

	@Override
	protected void createButtonsForButtonBar(Composite parent) {
		bt_createRoom = createButton(parent, 999, "Create", true);
		bt_createRoom.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent e) {
				// Register Process
				roomName = txt_roomName.getText().toString();
				if (roomName.length() != 0 && !roomName.contains(" ")) {
					close();
				} else {
					setErrorMessage(" Please enter Chat Room name with no white space");
				}
			}
		});
		createButton(parent, IDialogConstants.CANCEL_ID, IDialogConstants.CANCEL_LABEL, false);
	}
	
	
}