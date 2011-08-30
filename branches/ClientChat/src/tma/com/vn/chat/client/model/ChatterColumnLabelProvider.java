package tma.com.vn.chat.client.model;

import org.eclipse.jface.viewers.ColumnLabelProvider;

import tma.com.vn.chat.server.app.UserInfo;


public class ChatterColumnLabelProvider extends ColumnLabelProvider {
	
	@Override
	public String getText(Object element) {
		return ((UserInfo)element).getUserName();
	}
}