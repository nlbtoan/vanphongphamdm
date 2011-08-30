package tma.com.vn.chat.client.model;

import org.eclipse.jface.viewers.LabelProvider;

import tma.com.vn.chat.server.app.UserInfo;

public class FriendListLabelProvider extends LabelProvider {
	@Override
	public String getText(Object element) {
		return ((UserInfo)element).getUserName();
	}
}