/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.awt.HeadlessException;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;
import java.net.MalformedURLException;
import java.net.URL;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Window;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MembershipRegisterController implements Initializable { 
    @FXML
    private Button browse;
    @FXML
    private TextField textfield;
    @FXML
    private ImageView imageview;
    private File file;
    private FileChooser filechooser;
    private Image image;
    private Window Stage;
    private FileInputStream fils;
     @FXML
    Button save,cls;
     @FXML
    ComboBox<String> a6;
    @FXML
    private TextField a1;
    @FXML
    private TextField a3;
    @FXML
    private TextField a4;
    @FXML
    private TextField a5;
    @FXML
    private TextField a2;
    @FXML
    private TextField a7;
    @FXML
    private TextField a9;
    @FXML
    private TextField a10;
    @FXML
    private TextField a11;
    @FXML
    private TextField a12;
    @FXML
    private TextField  a13;
    @FXML
    private TextField a14;
    @FXML
    private TextField a15;
    @FXML
    private TextField a16;
     Connection conn = null;
     Statement stmt = null;
     ResultSet rst = null;
     PreparedStatement pre = null;
    @FXML
     private DatePicker dates;
     private LocalDate  ldate;
    @FXML
    private ComboBox<String> a8;  
    @FXML
    private Label f1;
    @FXML
    private Label f2;
    @FXML
    private Label f3;
    @FXML
    private Label f4;
    @FXML
    private Label f5;
    @FXML
    private Label f6;
    @FXML
    private Label f7;
    @FXML
    private void getdate(ActionEvent event){
      ldate = dates.getValue();
      a11.setText(ldate.toString());
    }
    @FXML
    private void handleButtonAction(ActionEvent event) throws MalformedURLException{
        filechooser = new FileChooser();
        filechooser.setTitle("choose image");
        file = filechooser.showOpenDialog(Stage);
        FileChooser.ExtensionFilter extFilter = new FileChooser.ExtensionFilter("jpg files (*.jpg)","*.JPG");
        FileChooser.ExtensionFilter extFilte = new FileChooser.ExtensionFilter("Png files (*.png)","*.PNG");
        if(file != null){
        textfield.setText(file.getAbsolutePath());
        image = new Image(file.toURI().toURL().toString());
        imageview.setImage(image);
        }else{
            textfield.setText("no file is selected");
            textfield.setStyle("-fx-background-color:red;");
        }
    }
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        ObservableList<String> list = FXCollections.observableArrayList("Single","Married");
        a6.setItems(list);
         ObservableList<String> num = FXCollections.observableArrayList("","1","2","2","3","4","5","6","7","8","9","10");
        a8.setItems(num);
    } 
    @FXML
    private void SubmitData(ActionEvent event) throws FileNotFoundException {
      conn = Mysqlilogin.Dbconnect();
      String fname = a1.getText();
      String mname = a2.getText();
      String age = a4.getText();
      String resident = a5.getText();
      String status = a6.getValue();
      String occu = a3.getText();
      String naofspo = a7.getText();
      String nofchld = a8.getValue();
      String nation = a9.getText();
      String homet = a10.getText();
      String dapfbap = a11.getText();
      String add = a12.getText();
      String tel = a13.getText();
      String hseno = a14.getText();
      String nameofch = a15.getText();
      String pos = a16.getText();
       boolean FIRSTN = Validate.Textfieldempty(a1, f1, "FIRSTNAME CANT BE EMPTY");
       boolean Oname = Validate.Textfieldempty(a2, f2, "OTHERNAMES CANT BE EMPTY");
       boolean Occupation = Validate.Textfieldempty(a3, f3, "OCCUPATION CANT BE EMPTY");
       boolean ages = Validate.NumberFort(a4, f4, " IS NOT A NUMBER");
       boolean Rsident = Validate.Textfieldempty(a5, f5, "RESIDENT CANT BE EMPTY");
       boolean nationa = Validate.Textfieldempty(a9, f6, "NATIONALITY CANT BE EMPTY");
       boolean tELPONE = Validate.NumberFort(a13, f7, " IS NOT A NUMBER");

         if(FIRSTN && Oname && Occupation && ages && Rsident && nationa && tELPONE) {
            try{
      String query = "insert into formreg (Firstname,Othernames,Age,Resident,M_Status,Occupation,nameofspouse,noofchildren,nationality,hometown,dateofbaptism,address,Telno,Houseno,nameoffchrch,posinchrch,Image) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      pre = conn.prepareStatement(query);
      pre.setString(1, fname);
      pre.setString(2, mname);
      pre.setString(3, age);
      pre.setString(4, resident);
      pre.setString(5, status);
      pre.setString(6, occu);
      pre.setString(7, naofspo);
      pre.setString(8, nofchld);
      pre.setString(9, nation);
      pre.setString(10, homet);
      pre.setString(11, dapfbap);
      pre.setString(12, add);
      pre.setString(13, tel);
      pre.setString(14, hseno);
      pre.setString(15, nameofch);
      pre.setString(16, pos);
      fils = new FileInputStream(file);
      pre.setBinaryStream(17, (InputStream)fils, (int)file.length());
      int i = pre.executeUpdate();
      if(i>0){
            JOptionPane.showMessageDialog(null, "Details Saved Successfully into the Database");
           clearAll();
      }
      else{
            JOptionPane.showMessageDialog(null, "Failed");
      }
      }
      catch(SQLException e){
        JOptionPane.showMessageDialog(null, e.getMessage());  

      }
            }
     
    }
    private void HANDLENPUT(ActionEvent event) throws SQLException {
         conn = Mysqlilogin.Dbconnect();
         String sql = "insert into formreg (Firstname,Othernames,Age) values ('"+a1.getText()+"','"+a2.getText()+"','"+a4.getText()+"')";
         stmt = conn.createStatement();
         stmt.executeLargeUpdate(sql);
         JOptionPane.showMessageDialog(null, "Details inserted into database successfully");
       
    }
     @FXML
    private void Clearvaluesfrom(ActionEvent event){
     a1.clear();
     a2.clear();
     a3.clear();
     a4.clear();
     a5.clear();
     a7.clear();
     a9.clear();
     a10.clear();
     a11.clear();
     a12.clear();
     a13.clear();
     a14.clear();
     a15.clear();
     a16.clear();
    
    }
    private void clearAll(){
     a1.clear();
     a2.clear();
     a3.clear();
     a4.clear();
     a5.clear();
     a7.clear();
     a9.clear();
     a10.clear();
     a11.clear();
     a12.clear();
     a13.clear();
     a14.clear();
     a15.clear();
     a16.clear();
    
    }
}
