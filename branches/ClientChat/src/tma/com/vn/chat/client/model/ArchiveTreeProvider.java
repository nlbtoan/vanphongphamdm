package tma.com.vn.chat.client.model;

import java.io.File;

import org.eclipse.jface.viewers.IContentProvider;
import org.eclipse.jface.viewers.ITreeContentProvider;
import org.eclipse.jface.viewers.Viewer;

public class ArchiveTreeProvider implements ITreeContentProvider {
	String m_rootPath;
	
	public ArchiveTreeProvider(String rootPath) {
		// TODO Auto-generated constructor stub
		this.m_rootPath = rootPath;
	}
	
	@Override
	public Object[] getChildren(Object parentElement) {
		// TODO Auto-generated method stub
		return ((File) parentElement).listFiles();
	}

	@Override
	public Object getParent(Object element) {
		// TODO Auto-generated method stub
		return ((File) element).getParentFile();
	}

	@Override
	public boolean hasChildren(Object element) {
		// TODO Auto-generated method stub
		Object[] obj = getChildren(element);
		return obj == null? false : obj.length > 0;
	}
	
	

	@Override
	public Object[] getElements(Object inputElement) {
		// TODO Auto-generated method stub
		return new File(m_rootPath).listFiles();
	}

	@Override
	public void dispose() {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void inputChanged(Viewer viewer, Object oldInput, Object newInput) {
		// TODO Auto-generated method stub
		
	}



}
