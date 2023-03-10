/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;
import java.sql.*;
import javafx.scene.control.Label;
import javax.swing.*;
/**
 *
 * @author ogua
 */
public class Mysqlilogin {
    Connection conn = null;
    Label status;
    
    public static Connection Dbconnect(){
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
