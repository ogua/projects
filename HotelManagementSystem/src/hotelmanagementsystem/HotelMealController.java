/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package hotelmanagementsystem;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class HotelMealController implements Initializable {
    @FXML
    private TextField MC1;
    @FXML
    private TextField MU1;
    @FXML
    private Button update1;
    @FXML
    private TextField MU2;
    @FXML
    private TextField MC2;
    @FXML
    private Button update2;
    @FXML
    private TextField MU3;
    @FXML
    private TextField MC3;
    @FXML
    private Button update3;
   Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         //meal one
        getMealPrice();
       //meal two
        getMealPrice2();
        //meal three
        getMealPrice3();
    }    

    
    @FXML
    private void Update1(ActionEvent event) {
         conn = MysqliConnect.Dbconnect();
         String sql = "UPDATE `meal` SET Meal1 = '"+MU1.getText()+"'";
        try {
            pr = conn.prepareStatement(sql);
            pr.executeUpdate();
            JOptionPane.showMessageDialog(null, "Price " +MC1.getText()+  "HAS BEEN UPTATED TO " +MU1.getText()+  "SUCCESSFULLY");
            MU1.clear();
             getMealPrice();
        } catch (SQLException ex) {
            Logger.getLogger(HotelController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void Update2(ActionEvent event) {
      conn = MysqliConnect.Dbconnect();
      String sql = "UPDATE `meal` SET `Meal2` = '"+MU2.getText()+"'";
      try {
            pr = conn.prepareStatement(sql);
            pr.executeUpdate();
            JOptionPane.showMessageDialog(null, "Price " +MC2.getText()+  "HAS BEEN UPTATED TO " +MU2.getText()+  "SUCCESSFULLY");
            MU2.clear();
            getMealPrice2();
      } catch (SQLException ex) {
            Logger.getLogger(HotelController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void Update3(ActionEvent event) {
         conn = MysqliConnect.Dbconnect();
         String sql = "UPDATE `meal` SET `Meal3` = '"+MU3.getText()+"'";
        try {
            pr = conn.prepareStatement(sql);
            pr.executeUpdate();
            JOptionPane.showMessageDialog(null, "Price " +MC3.getText()+  "HAS BEEN UPTATED TO " +MU3.getText()+  "SUCCESSFULLY");
            MU3.clear();
            getMealPrice3();
        } catch (SQLException ex) {
            Logger.getLogger(HotelController.class.getName()).log(Level.SEVERE, null, ex);
        }  
    }
    
    private void getMealPrice(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT `Meal1` FROM meal";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
              String price1 = rs.getString("Meal1");
              int price11 = Integer.parseInt(price1);
              MC1.setText(String.valueOf(price11));
            }
        } catch (SQLException ex) {
            Logger.getLogger(HotelController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    private void getMealPrice2(){
    conn = MysqliConnect.Dbconnect();
     String sql = "SELECT `Meal2` FROM meal";
      try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
              String price1 = rs.getString("Meal2");
              int price11 = Integer.parseInt(price1);
              MC2.setText(String.valueOf(price11));
            }
        } catch (SQLException ex) {
            Logger.getLogger(HotelController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    private void getMealPrice3(){
    conn = MysqliConnect.Dbconnect();
     String sql = "SELECT `Meal3` FROM meal";
      try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
              String price1 = rs.getString("Meal3");
              int price11 = Integer.parseInt(price1);
              MC3.setText(String.valueOf(price11));
            }
        } catch (SQLException ex) {
            Logger.getLogger(HotelController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
