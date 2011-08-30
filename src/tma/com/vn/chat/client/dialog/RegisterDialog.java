package tma.com.vn.chat.client.dialog;

import org.eclipse.jface.dialogs.IDialogConstants;
import org.eclipse.jface.dialogs.IMessageProvider;
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

public class RegisterDialog extends TitleAreaDialog {

	private Text txt_username;
	private Text txt_password;
	private Text txt_confirm;
	public String chatterName;
	public String chatterPassword;

	public String getChaterPassword() {
		return chatterPassword;
	}

	public void setChatterPassword(String chaterPassword) {
		this.chatterPassword = chaterPassword;
	}

	public String getChatterName() {
		return chatterName;
	}

	public void setChatterName(String chaterName) {
		this.chatterName = chaterName;
	}

	public RegisterDialog(Shell parentShell) {
		super(parentShell);
		// TODO Auto-generated constructor stub
	}

	@Override
	protected Control createDialogArea(Composite parent) {
		setTitle("Register");
		setMessage("Create Account for new User", IMessageProvider.INFORMATION);
		GridLayout layout = new GridLayout(2, false);
		parent.setLayout(layout);
		parent.setBounds(20, 20, 250, 300);

		Label lb_username = new Label(parent, SWT.NONE);
		lb_username.setText("Username");
		txt_username = new Text(parent, SWT.SINGLE | SWT.BORDER);
		txt_username.setLayoutData(new GridData(120, 15));
		txt_username.setTextLimit(40);
		txt_username.setFocus();

		Label lb_password = new Label(parent, SWT.NONE);
		lb_password.setText("Password");
		txt_password = new Text(parent, SWT.PASSWORD | SWT.SINGLE | SWT.BORDER);
		txt_password.setLayoutData(new GridData(120, 15));
		txt_password.setTextLimit(40);
		
		Label lb_confirm = new Label(parent, SWT.NONE);
		lb_confirm.setText("Confirm");
		txt_confirm = new Text(parent, SWT.PASSWORD | SWT.SINGLE | SWT.BORDER);
		txt_confirm.setLayoutData(new GridData(120, 15));
		txt_confirm.setTextLimit(40);
		
		return parent;
	}

	@Override
	protected void createButtonsForButtonBar(Composite parent) {
		
		Button bt_enter = createButton(parent, SWT.OPEN, "Open", true);
		bt_enter.setText(" Register ");
		bt_enter.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent e) {
				// Register Process
				if (txt_username.getText().length() != 0 
						&& !txt_username.getText().contains(" ")
						&& txt_password.getText().length() != 0
						&& txt_password.getText().equals(txt_confirm.getText())) {
					chatterName = txt_username.getText();
					chatterPassword = txt_password.getText();
					close();
				} else {
					setErrorMessage("Please input User name with no space.\nMake sure Password and Confirm equals");
				}
			}
		});
		createButton(parent, IDialogConstants.CANCEL_ID,
				IDialogConstants.CANCEL_LABEL, false);
		
	}

}
