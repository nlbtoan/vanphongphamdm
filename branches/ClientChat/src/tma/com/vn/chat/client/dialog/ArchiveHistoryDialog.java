package tma.com.vn.chat.client.dialog;

import java.io.File;
import java.util.HashMap;
import java.util.Map;
import java.util.Set;

import org.eclipse.jface.viewers.ISelectionChangedListener;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.jface.viewers.SelectionChangedEvent;
import org.eclipse.jface.viewers.TreeViewer;
import org.eclipse.jface.window.ApplicationWindow;
import org.eclipse.swt.SWT;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.swt.widgets.Text;
import org.eclipse.swt.widgets.Tree;

import tma.com.vn.chat.client.model.ArchiveLabelProvider;
import tma.com.vn.chat.client.model.ArchiveTreeProvider;
import tma.com.vn.chat.client.util.FileOperation;

public class ArchiveHistoryDialog extends ApplicationWindow {
	private String selfName;
	private String chatter;
	TreeViewer treeViewer;
	Tree tree;
	Text textArea;
	Map<String, Set<String>> archiveList = new HashMap<String, Set<String>>();

	public ArchiveHistoryDialog(Shell parentShell) {
		super(parentShell);
		// TODO Auto-generated constructor stub
	}

	public ArchiveHistoryDialog(Shell shell, String fromUser) {
		// TODO Auto-generated constructor stub
		super(shell);
		this.selfName = fromUser;
	}

	public String getSelfName() {
		return selfName;
	}

	public void setSelfName(String yourName) {
		this.selfName = yourName;
	}

	public String getChatter() {
		return chatter;
	}

	public void setChatter(String chatter) {
		this.chatter = chatter;
	}

	@Override
	protected Control createContents(final Composite parent) {
		parent.setLayout(new GridLayout(1, true));
		Composite top = new Composite(parent, SWT.NONE);
		top.setLayout(new GridLayout(2, false));
		GridData gridData = new GridData(GridData.FILL_BOTH);
		top.setLayoutData(gridData);

		gridData = new GridData(GridData.FILL_BOTH);
		gridData.verticalSpan = 3;
		gridData.widthHint = 200;
		gridData.grabExcessVerticalSpace = true;
		treeViewer = new TreeViewer(top);
		tree = treeViewer.getTree();
		tree.setLayoutData(gridData);
		
		String rootPath = FileOperation.getUserHomePath() + "logs" + File.separator + selfName;
		File dir = new File(rootPath);
		if(!dir.exists()){
			dir.mkdirs();
		}
		
		treeViewer.setContentProvider(new ArchiveTreeProvider(rootPath));
		treeViewer.setLabelProvider(new ArchiveLabelProvider());
		treeViewer.addSelectionChangedListener(new ISelectionChangedListener() {
			@Override
			public void selectionChanged(SelectionChangedEvent event) {
				// TODO Auto-generated method stub
				IStructuredSelection selections = (IStructuredSelection) treeViewer.getSelection();
				File selectedFile = (File) selections.getFirstElement();
				String content = FileOperation.readContentFromFile(selectedFile);
				textArea.setText(content);
			}
		});
		treeViewer.setInput("");

		// TextArea
		textArea = new Text(top, SWT.MULTI | SWT.BORDER | SWT.WRAP | SWT.V_SCROLL);
		gridData = new GridData(GridData.FILL_BOTH);
		gridData.heightHint = 300;
		gridData.widthHint = 400;
		textArea.setLayoutData(gridData);
		textArea.setEditable(false);

		Text textFind = new Text(top, SWT.BORDER);
		gridData = new GridData(GridData.FILL_HORIZONTAL);
		gridData.heightHint = 30;
		textFind.setLayoutData(gridData);

		Button tb_find = new Button(top, SWT.PUSH | SWT.RIGHT);
		tb_find.setText("  Find  ");

		return top;
	}
}