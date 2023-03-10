/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.TextField;
import javafx.scene.image.ImageView;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MembefregController implements Initializable {
    @FXML
    private Button browse;
    @FXML
    private TextField textfield;
    @FXML
    private ImageView imageview;
    @FXML
    private TextField a1;
    @FXML
    private TextField a3;
    @FXML
    private ComboBox<?> a6;
    @FXML
    private TextField a4;
    @FXML
    private TextField a5;
    @FXML
    private Button save;
    @FXML
    private Button cls;
    @FXML
    private TextField a2;
    @FXML
    private TextField a7;
    @FXML
    private ComboBox<?> a8;
    @FXML
    private TextField a9;
    @FXML
    private TextField a11;
    @FXML
    private TextField a12;
    @FXML
    private TextField a10;
    @FXML
    private TextField a13;
    @FXML
    private TextField a15;
    @FXML
    private TextField a16;
    @FXML
    private TextField a14;
    Connection conn = null;
    PreparedStatement prep = null;
    ResultSet result = null;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
   

    @FXML
    private void handleButtonAction(ActionEvent event) {
    }

    @FXML
    private void HANDLENPUT(ActionEvent event) {
             conn = Mysqlilogin.Dbconnect();
        try{
             String sql = "INSERT INTO formreg (Firstname,Othernames,Age,Resident,M_Status) values (?,?,?,?,?)";
             prep = conn.prepareStatement(sql);
             prep.setString(1, "ogua");
             prep.setString(2, "lamere");
             prep.setString(3, "25");
             prep.setString(4, "teshie");
             prep.setString(5, "single");
             prep.execute();
             JOptionPane.showMessageDialog(null, "successfully");            
             prep.close();
        }catch(SQLException e){
       e.getErrorCode();
       
    }
    }

    @FXML
    private void Clearvaluesfrom(ActionEvent event) {
    }
    
}
