package controllers;

import java.io.IOException;
import java.util.ArrayList;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import models.Etudiant;
import utils.RouteUtils;

@WebServlet("/EtudiantController")
public class EtudiantController extends HttpServlet {
	private static final long serialVersionUID = 1L;
    
	//Registre d'actions
	String actions[] = {"all", "add", "connexion"};
	
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		//Récupérer le nom de l'action passé en paramètre de la requête
		String action = request.getParameter("action");
		
		//Request dispatcher pour faire le routage
		RequestDispatcher rt = null;
		
		//Mettre en place le routage principal
		if (RouteUtils.isValid(actions, action)) {
			switch(action) {
				case "connexion":
					boolean mdp = Etudiant.authentification(request.getParameter("id_etudiant"), request.getParameter("pwd_etudiant"));
					if (mdp) {
						HttpSession session = request.getSession();
						session.setAttribute("utilisateur", request.getParameter("id_etudiant"));
						rt = request.getRequestDispatcher("index.jsp");
						//J'ouvre une session
						//et je redirige vers la page d'accueil
					}else {
						rt = request.getRequestDispatcher("connexion.jsp?error=error");
						//Prévenir que le mdp ou l'identifiant est incorrect
					}
					break;
				default :
					rt = request.getRequestDispatcher("Views/error.jsp?message=action " + action + " n'existe pas");
					break;
			}
		}
		else //L'action n'est pas valide 
		{
			rt = request.getRequestDispatcher("Views/error.jsp?message=action " + action + " invalide");
		}
		
		//Activer le dispatcher pour faire suivre la requête
		rt.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}
}
