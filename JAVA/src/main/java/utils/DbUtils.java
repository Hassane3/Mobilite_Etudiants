package utils;

import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Hassane
 */

public class DbUtils {
	static public java.sql.Connection connecter(){
        java.sql.Connection conn = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");            
            try {
            	System.out.print("DbUtils");
                conn = java.sql.DriverManager.getConnection(
                        "jdbc:mysql://localhost:3306/mobilite_etudiants",
                        "root",
                        ""
                );
            } catch (SQLException ex) {
                Logger.getLogger(DbUtils.class.getName()).log(Level.SEVERE, null, ex);
            }
            
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DbUtils.class.getName()).log(Level.SEVERE, null, ex);
        }       
        return conn;
    }
    
    static public void deconnecter(java.sql.Connection c){
        if (c != null){
            try {
                c.close();
            } catch (SQLException ex) {
                Logger.getLogger(DbUtils.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }
    
    static public java.sql.ResultSet query(String sql, java.sql.Connection e){
        java.sql.ResultSet rs =  null;
        
        try {
            java.sql.Statement statement = e.createStatement();
            rs = statement.executeQuery(sql);
        } catch (SQLException ex) {
            Logger.getLogger(DbUtils.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return rs;
    }
    
    static public void update(String sql, java.sql.Connection c){
        try {
            java.sql.Statement statement = c.createStatement();
            statement.executeUpdate(sql);
            statement.close();
        } catch (SQLException ex) {
            Logger.getLogger(DbUtils.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
