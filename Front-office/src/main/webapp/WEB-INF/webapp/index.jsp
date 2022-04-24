
<%
	if (session.getAttribute("utilisateur") == null) {
		%>
		<jsp:include page="../../connexion.jsp"/>
		<%
	}else {
		%>
		<jsp:include page="../../accueil.jsp" />
		<%
	}
%>
