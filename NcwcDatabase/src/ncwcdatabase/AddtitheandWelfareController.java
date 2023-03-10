/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class AddtitheandWelfareController implements Initializable {
    @FXML
    private TextField TID;
    Connection conn;
    PreparedStatement pre;
    @FXML
    private TextField QID;
    @FXML
    private TextField WLD;
    @FXML
    private Button ADD;
    @FXML
    private Button CLEAR;
    @FXML
    private Label label1;
    @FXML
    private Label label2;
    @FXML
    private Label label3;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    


    @FXML
    private void ADDDETAILS(ActionEvent event) {
          boolean Qyery = Validate.NumberFort(QID, label1, " IS NOT A NUMBER");
          boolean welfare = Validate.NumberFort(WLD, label2, " IS NOT A NUMBER");
          boolean tithe = Validate.NumberFort(TID, label3, " IS NOT A NUMBER");
        if(Qyery && welfare && tithe){
        try{
          conn = Mysqlilogin.Dbconnect();
          pre = conn.prepareStatement ("UPDATE formreg SET Cardid = ?, TitheId = ? WHERE id = ?");
          pre.setString(1, WLD.getText());
          pre.setString(2, TID.getText());
          pre.setString(3, QID.getText());
          pre.executeUpdate();
         JOptionPane.showMessageDialog(null, "DETAILS UPDATED SUCCESSFULLY");
         CLEARDETAIL();
        }catch(Exception E){
              JOptionPane.showMessageDialog(null, "FAILED TO UPDATE DETAULS");
        }
    }
    }
    @FXML
    private void CLEARDETAILS(ActionEvent event) {
    WLD.clear();
    TID.clear();
    QID.clear();
    }
    private void CLEARDETAIL() {
    WLD.clear();
    TID.clear();
    QID.clear();
    }
    
}
