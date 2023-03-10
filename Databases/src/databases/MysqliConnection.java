/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package databases;

import java.sql.Connection;
import java.sql.DriverManager;
import javafx.scene.control.Label;
import javax.swing.JOptionPane;

/**
 *
 * @author OGUA
 */
public class MysqliConnection {
    Connection conn = null;
    Label status;
    
    public static Connection Dbconnect(){
    try{
        Class.forName("com.mysql.jdbc.Driver");
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/netbeansdatabase","root","");
        return conn;
    }catch(Exception e){
     JOptionPane.showMessageDialog(null, "unable to connect to the database. check your connection and try again");
     return null;
    }
    }
}
