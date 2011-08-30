package tma.com.vn.chat.client.listener;

import org.eclipse.swt.events.KeyEvent;
import org.eclipse.swt.events.KeyListener;

import tma.com.vn.chat.client.dialog.IChat;

public class ChatKeyListener implements KeyListener {
	IChat chatComponent;

	public ChatKeyListener(IChat chatComponent) {
		this.chatComponent = chatComponent;
	}

	@Override
	public void keyReleased(KeyEvent e) {
		int keycode = e.keyCode;
		if (keycode == 13) {
			chatComponent.chat();
		}
	}

	@Override
	public void keyPressed(KeyEvent e) {
		// TODO Auto-generated method stub
	}
}