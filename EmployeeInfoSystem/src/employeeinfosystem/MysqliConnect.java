/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package employeeinfosystem;

import java.sql.Connection;
import java.sql.DriverManager;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class MysqliConnect {
    Connection conn = null;
    public static Connection Dbconnect(){
    try{
        Class.forName("com.mysql.jdbc.Driver");
        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/employeesystem","root","");
        return conn;
    }catch(Exception e){
     JOptionPane.showMessageDialog(null, "unable to connect to the database. check your connection and try again");
     return null;
    }
    }
}
