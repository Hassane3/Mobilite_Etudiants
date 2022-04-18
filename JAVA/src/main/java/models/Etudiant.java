package models;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

import models.Etudiant;
//import models.Utilisateur;
import utils.DbUtils;

public class Etudiant {
	int etudiantID;
    String etudiantNom;
    String etudiantPrenom;
    String etudiantEmail;
    int etudiantAnnee;
    int etudiantCodeDiplome;

   
    
    @Override
	public String toString() {
		return "Etudiant [etudiantID=" + etudiantID + ", etudiantNom=" + etudiantNom + ", etudiantPrenom="
				+ etudiantPrenom + ", etudiantEmail=" + etudiantEmail + ", etudiantAnnee=" + etudiantAnnee
				+ ", etudiantCodeDiplome=" + etudiantCodeDiplome + "]";
	}

	public int getEtudiantID() {
		return etudiantID;
	}

	public void setEtudiantID(int etudiantID) {
		this.etudiantID = etudiantID;
	}

	public String getEtudiantNom() {
		return etudiantNom;
	}

	public void setEtudiantNom(String etudiantNom) {
		this.etudiantNom = etudiantNom;
	}

	public String getEtudiantPrenom() {
		return etudiantPrenom;
	}

	public void setEtudiantPrenom(String etudiantPrenom) {
		this.etudiantPrenom = etudiantPrenom;
	}

	public String getEtudiantEmail() {
		return etudiantEmail;
	}

	public void setEtudiantEmail(String etudiantEmail) {
		this.etudiantEmail = etudiantEmail;
	}

	public int getEtudiantAnnee() {
		return etudiantAnnee;
	}

	public void setEtudiantAnnee(int etudiantAnnee) {
		this.etudiantAnnee = etudiantAnnee;
	}

	public int getEtudiantCodeDiplome() {
		return etudiantCodeDiplome;
	}

	public void setEtudiantCodeDiplome(int etudiantCodeDiplome) {
		this.etudiantCodeDiplome = etudiantCodeDiplome;
	}

	public static ArrayList<Etudiant> getEtudiants(){
         ArrayList<Etudiant> etudiants = new ArrayList<>();
            
        try {
            String sql = "select * from etudiants;";
            java.sql.Connection c = DbUtils.connecter();
            java.sql.ResultSet rs = DbUtils.query(sql, c);
          
            while (rs.next()){
                Etudiant etudiant = new Etudiant();
                etudiant.setEtudiantID(rs.getInt("numEtudiant"));
                etudiant.setEtudiantNom(rs.getString("nomEtudiant"));
                etudiant.setEtudiantPrenom(rs.getString("prenomEtudiant"));
                etudiant.setEtudiantEmail(rs.getString("mailEtudiant"));
                etudiant.setEtudiantAnnee(rs.getInt("annee"));
                etudiant.setEtudiantCodeDiplome(rs.getInt("codeDiplome"));
                etudiants.add(etudiant);
            }
            
            DbUtils.deconnecter(c);
        } catch (SQLException ex) {
//            Logger.getLogger(User.class.getName()).log(Level.SEVERE, null, ex);
        }
        return etudiants;
    }
	
	public static boolean authentification(String identifiant, String pass){
        boolean result = false;
        
        try {
            String sql = "select pass from etudiant where mail=\"" + identifiant + "\";";
            java.sql.Connection c = DbUtils.connecter();
            java.sql.ResultSet rs = DbUtils.query(sql, c);
          
            String pwd = rs.getString("pass");
            
            if (pwd != null && pwd.equals(pass)){
                result = true;
            }
            DbUtils.deconnecter(c);
        } catch (SQLException ex) {
//            Logger.getLogger(User.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return result;
    }
    
    
}
