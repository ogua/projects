/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lamere;

import java.sql.Connection;
import java.sql.DriverManager;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class Mysqliconnect {
     Connection conn = null;
    public static Connection dbconnect(){
     try{
      Class.forName("com.mysql.jdbc.Driver");
      Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/covenant","ogua","senior");
      JOptionPane.showMessageDialog(null, "Connection was successfully");
      return conn;
     }  
     catch(Exception e){
      JOptionPane.showMessageDialog(null, "e");
      return null;
     }
    
    }
}
