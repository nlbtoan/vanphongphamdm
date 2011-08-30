package tma.com.vn.chat.server.app;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.UniqueConstraint;

@Entity
@Table(name="UserChat", uniqueConstraints = {@UniqueConstraint(columnNames={"USERNAME"})})
public class User implements Serializable {
	public String m_userName;
	public String m_passwd;
	public String m_status;
	public User(){
		
	}
	public User(String userName, String passwd) {
		super();
		this.m_userName = userName;
		this.m_passwd = passwd;
	}
	@Id
	@Column(name="USERNAME", length=30, nullable=false)
	public String getUserName() {
		return m_userName;
	}
	public void setUserName(String userName) {
		this.m_userName = userName;
	}
	@Column(name="PASSWD", length=30, nullable=false)
	public String getPasswd() {
		return m_passwd;
	}
	public void setPasswd(String passwd) {
		this.m_passwd = passwd;
	}
	

}
