package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import java.net.*;
import java.io.*;
import java.beans.PropertyEditor;
import org.jboss.util.propertyeditor.PropertyEditors;

public final class displayOpResult_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List _jspx_dependants;

  private javax.el.ExpressionFactory _el_expressionfactory;
  private org.apache.InstanceManager _jsp_instancemanager;

  public Object getDependants() {
    return _jspx_dependants;
  }

  public void _jspInit() {
    _el_expressionfactory = _jspxFactory.getJspApplicationContext(getServletConfig().getServletContext()).getExpressionFactory();
    _jsp_instancemanager = org.apache.jasper.runtime.InstanceManagerFactory.getInstanceManager(getServletConfig());
  }

  public void _jspDestroy() {
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;


    try {
      response.setContentType("text/html");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;

      out.write("<?xml version=\"1.0\"?>\n");
      out.write("\n");

String hostname = "";
try
{
  hostname = InetAddress.getLocalHost().getHostName();
}
catch(IOException e){}

      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html \n");
      out.write("    PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\n");
      out.write("    \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n");
      out.write("\n");
      out.write("<html>\n");
      out.write("<head>\n");
      out.write("   <title>Operation Results</title>\n");
      out.write("   <link rel=\"stylesheet\" href=\"style_master.css\" type=\"text/css\" />\n");
      out.write("   <meta http-equiv=\"cache-control\" content=\"no-cache\" />\n");
      out.write("</head>\n");
      out.write("\n");
      org.jboss.jmx.adaptor.control.OpResultInfo opResultInfo = null;
      synchronized (request) {
        opResultInfo = (org.jboss.jmx.adaptor.control.OpResultInfo) _jspx_page_context.getAttribute("opResultInfo", PageContext.REQUEST_SCOPE);
        if (opResultInfo == null){
          opResultInfo = new org.jboss.jmx.adaptor.control.OpResultInfo();
          _jspx_page_context.setAttribute("opResultInfo", opResultInfo, PageContext.REQUEST_SCOPE);
        }
      }
      out.write('\n');

   if(opResultInfo.name == null)
   {

      out.write("\n");
      out.write("  \t");
      if (true) {
        _jspx_page_context.forward("/");
        return;
      }
      out.write('\n');
      out.write('\n');

   }

      out.write("    \n");
      out.write("<body leftmargin=\"10\" rightmargin=\"10\" topmargin=\"10\">\n");
      out.write("\n");
      out.write("<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\n");
      out.write(" <tr>\n");
      out.write("  <td height=\"105\" align=\"center\"><h1>JMX MBean Operation View</h1>");
      out.print( hostname );
      out.write("</td>\n");
      out.write("  <td height=\"105\" align=\"center\" width=\"300\">\n");
      out.write("    <p>\n");
      out.write("      <input type=\"button\" value=\"Back to Agent\" onClick=\"javascript:location='HtmlAdaptor?action=displayMBeans'\"/>\n");
      out.write("      <input type=\"button\" value=\"Back to MBean\" onClick=\"javascript:location='HtmlAdaptor?action=inspectMBean&amp;name=");
      out.print( request.getParameter("name") );
      out.write("'\"/>\n");
      out.write("    </p>\n");
      out.write("    <p>\n");
      out.write("    ");

      out.print("<input type='button' onClick=\"location='HtmlAdaptor?action=invokeOpByName");
      out.print("&amp;name=" + request.getParameter("name"));
      out.print("&amp;methodName=" + opResultInfo.name );
    
      for (int i=0; i<opResultInfo.args.length; i++)
      {
        out.print("&amp;argType=" + opResultInfo.signature[i]);
        out.print("&amp;arg" + i + "=" + opResultInfo.args[i]);
      }
    
      out.println("'\" value='Reinvoke MBean Operation'/>");
    
      out.write("\n");
      out.write("    </p>\n");
      out.write("  </td>\n");
      out.write(" </tr>\n");
      out.write("</table>\n");
      out.write("\n");

   if( opResultInfo.result == null )
   {
     out.println("Operation completed successfully without a return value!");
   }
   else
   {
      String opResultString = null;

      PropertyEditor propertyEditor = PropertyEditors.findEditor(opResultInfo.result.getClass());
      if(propertyEditor != null)
      {
         propertyEditor.setValue(opResultInfo.result);
         opResultString = propertyEditor.getAsText();
      }
      else
      {
         opResultString = opResultInfo.result.toString();
      }

      boolean hasPreTag = opResultString.startsWith("<pre>");
      if( hasPreTag == false ) out.println("<pre>");
      out.println(opResultString);
      if( hasPreTag == false ) out.println("</pre>");
   }

      out.write("\n");
      out.write("</body>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          try { out.clearBuffer(); } catch (java.io.IOException e) {}
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
