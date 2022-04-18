<jsp:include page="../header.jsp" />
<h1>Erreur</h1>

<%
    String msg = request.getParameter("message");
    out.print("controler cible: " + request.getParameter("controler") 
            + "<br>action cible: " + request.getParameter("action") + "<br>");
    //out.print("Request parameters:<br>");
    //out.print(request.getParameterMap().toString());
    
    if (msg!=null){
        out.print("Message: "+msg);
    }
    
%>

<jsp:include page="../footer.jsp" />