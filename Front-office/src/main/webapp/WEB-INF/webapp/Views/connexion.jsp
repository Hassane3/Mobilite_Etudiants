<jsp:include page="../../header.jsp" />

<h1>Connexion</h1>
<form method="post" action="RouteController">
	<input type="hidden" name="controller" value="etudiant">
	<input type="hidden" name="action" value="connexion">
	
	<label for="id_etudiant">Identifiant</label>
	<input style="text" id="id_etudiant" name="id_etudiant" placeholder="identifiant">
	
	<label for="mdp_etudiant">Mot de passe</label>
	<input style="password" id="pwd_etudiant" name="pwd_etudiant">
	
	<input type="submit" value="Connexion">
</form>
<%
	if (request.getAttribute("error") != null) {
		out.print("<p>Les informations saisies sont incorrectes</p>");
	}
%>

<jsp:include page="../../footer.jsp" />