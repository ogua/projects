/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package mmmm;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javafx.fxml.FXML;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class sqliconnect {
     @FXML
   Connection conn = null;
   public static Connection dbconnect(){
    try{
        Class.forName("com.mysql.jdbc.Driver");
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/ncwcdatabase","root","");
        return conn;
    }catch(Exception e){
     JOptionPane.showMessageDialog(null, "unable to connect to the database. check your connection and try again");
     return null;
    }
    }
}
