package controllers;


import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import utils.RouteUtils;

/**
 * Servlet implementation class RouteController
 */
@WebServlet("/RouteController")
public class RouteController extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	String[] controllers = {"etudiant", "universite", "diplome"};
	
	

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// Récupérer le nom du controleur passé en paramètre de la requête
		String controller = request.getParameter("controller");
		RequestDispatcher rq = null;
		if (RouteUtils.isValid(controllers, controller)) {
			switch (controller) {
			case "etudiant": 
				rq = request.getRequestDispatcher("EtudiantController");
				break;
			case "universite": 
				rq = request.getRequestDispatcher("UniversiteController");
				break;
			case "diplome": 
				rq = request.getRequestDispatcher("DiplomeController");
				break;
			default:
				rq = request.getRequestDispatcher("Views/error.jsp?message=controller n'existe pas");
			}	
		}
		else {
			rq = request.getRequestDispatcher("Views/error.jsp?message=controller invalide");
		}
		
		rq.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}