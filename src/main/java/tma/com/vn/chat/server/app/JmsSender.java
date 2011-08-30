package tma.com.vn.chat.server.app;

import java.util.Map;

import javax.jms.JMSException;
import javax.jms.Message;
import javax.jms.ObjectMessage;
import javax.jms.Session;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.jms.core.JmsTemplate;
import org.springframework.jms.core.MessageCreator;

public class JmsSender {
	private static Log log = LogFactory.getLog(JmsSender.class);
	private JmsTemplate m_jmsTemplate;
	private String m_keyMessage = "userName";

	public JmsTemplate getJmsTemplate() {
		return m_jmsTemplate;
	}

	public void setJmsTemplate(JmsTemplate jmsTemplate) {
		this.m_jmsTemplate = jmsTemplate;
	}

	public void sendMessage(final MessageNotify objMsg) {
		MessageCreator messageCreator = new MessageCreator() {

			@Override
			public Message createMessage(Session session) throws JMSException {
				log.debug("Creating the message");
				ObjectMessage objectMsg = session.createObjectMessage(objMsg);
				objectMsg.setObjectProperty("public", "public");
				return objectMsg;
			}

		};
		m_jmsTemplate.send(messageCreator);
	}

	public void sendMessage(final ObjRoomMsg objMsg,
			final Map<String, UserInfo> users) {
		MessageCreator messageCreator = new MessageCreator() {

			@Override
			public Message createMessage(Session session) throws JMSException {
				log.debug("Creating the message");
				ObjectMessage objectMsg = session.createObjectMessage(objMsg);
				setHeaderProperties(users, objectMsg);
				
				return objectMsg;
			}

		};
		m_jmsTemplate.send(messageCreator);
	}
	public void sendMessage(final ObjRoomMsg objMsg,
			final Map<String, UserInfo> users, final String userName) {
		MessageCreator messageCreator = new MessageCreator() {

			@Override
			public Message createMessage(Session session) throws JMSException {
				log.debug("Creating the message");
				ObjectMessage objectMsg = session.createObjectMessage(objMsg);
				setHeaderProperties(users, objectMsg);
//				objectMsg.setObjectProperty(m_keyMessage, userName);
				return objectMsg;
			}

		};
		m_jmsTemplate.send(messageCreator);
	}

	public void notiInvitation(Map<String, UserInfo> users, Room room) {
		ObjRoomMsg obj = new ObjRoomMsg(room.getRoomName(), room.getBossRoom(),
				"", room.getBossRoom() + " want invite join room",
				ObjRoomMsg.INVITE);
		sendMessage(obj, users);
	}
	
	public void notiJoin(Map<String, UserInfo> users, Room room, String userName){
		ObjRoomMsg obj = new ObjRoomMsg(room.getRoomName(), room.getBossRoom(),
				userName, userName+" join room",
				ObjRoomMsg.JOIN);
		sendMessage(obj, users,  room.getBossRoom());
	}
	
	public void notiUnjoin(Map<String, UserInfo> users, Room room){
		ObjRoomMsg obj = new ObjRoomMsg(room.getRoomName(), room.getBossRoom(),
				"", " one user unjoin room",
				ObjRoomMsg.UNJOIN);
		sendMessage(obj, users, room.getBossRoom());
	}
	
	public void notiRemoveRoom(Map<String, UserInfo> users, Room room){
		ObjRoomMsg obj = new ObjRoomMsg(room.getRoomName(), room.getBossRoom(),
				"", room.getRoomName() + " had been close",
				ObjRoomMsg.REMOVEROOM);
		sendMessage(obj, users,  room.getBossRoom());
	}

	private void setHeaderProperties(Map<String, UserInfo> props,
			ObjectMessage msg) throws JMSException {
		if (props != null) {
			for (UserInfo user : props.values()) {
				msg.setObjectProperty(user.getUserName(), user.getUserName());
			}
		}
	}

	public void notifyAddClient(String userName) {
		try {
			sendMessage(new MessageNotify(MessageNotify.ADDCLIENT,
					new UserInfo(userName, UserInfo.READYSTATUS)));
		} catch (Exception ignor) {
		}

	}

	public void notifyRemoveClient(String userName) {
		try {
			sendMessage(new MessageNotify(MessageNotify.REMOVECLIENT,
					new UserInfo(userName, UserInfo.READYSTATUS)));
		} catch (Exception ignor) {
		}

	}

	public void notifyStatusClient(UserInfo user) {
		try {
			sendMessage(new MessageNotify(MessageNotify.STATUS, user));
		} catch (Exception ignor) {
		}

	}
}
