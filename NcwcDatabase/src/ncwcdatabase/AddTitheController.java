/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class AddTitheController implements Initializable {
    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;

    @FXML
    private TextField cardid;
    @FXML
    private TextField firstname;
    @FXML
    private TextField other_n;
    @FXML
    private ComboBox<String> month;
    @FXML
    private ComboBox<String> year;
    @FXML
    private TextField amount;
    @FXML
    private Button submit,cls;
    @FXML
    private Label errorid;
    @FXML
    private Label errorname;
    @FXML
    private Label errorothername;
    @FXML
    private Label errorAmount;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        ObservableList<String> Month = FXCollections.observableArrayList("IAN","FEB","MAR","APRIL","MAY","JUNE","JULY","AUG","SEP","OCT","NOV","DEC");
        month.setItems(Month);
        if(! cardid.getText().isEmpty()){
         cardid.setStyle("-fx-background-color:white;");
        }
        
        ObservableList<String>  Year = FXCollections.observableArrayList("2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021","2022","2023","2024","2025");
         year.setItems(Year);
    }    
    @FXML
    private void InsertTithe(ActionEvent event) throws SQLException {
         boolean carid = Validate.Textfieldempty(cardid, errorid, "CARDID CANT BE EMPTY");
         boolean Firstname = Validate.Textfieldempty(firstname, errorname, "FIRSTNAME CANT BE EMPTY");
         boolean Othername = Validate.Textfieldempty(other_n, errorothername, "OTHERNAMES CANT BE EMPTY");
         boolean Amount = Validate.NumberFort(amount, errorAmount, " IS NOT A NUMBER");

         if(carid && Firstname && Othername && Amount){
         conn = Mysqlilogin.Dbconnect();
         String sql = "INSERT INTO tithe (CARDID,FIRSTNAME,OTHER_NAMES,MON,AMOUNT,YEAR) values ('"+cardid.getText()+"','"+firstname.getText()+"','"+other_n.getText()+"','"+month.getValue()+"','"+amount.getText()+"','"+year.getValue()+"')";
         stmt = conn.createStatement();
         stmt.executeLargeUpdate(sql);
         JOptionPane.showMessageDialog(null, "Details inserted into database successfully");
         clearData();
     }
         
    }
   @FXML
    private void clearAllData(ActionEvent e){
   cardid.clear();firstname.clear();other_n.clear();amount.clear();
   
   }
   private void clearData(){
   cardid.clear();firstname.clear();other_n.clear();amount.clear();
   
   }
    
}
