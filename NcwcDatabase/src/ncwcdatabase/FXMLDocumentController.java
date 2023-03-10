/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.awt.HeadlessException;
import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.input.KeyCode;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
   Connection conn = null;
    PreparedStatement prepare = null;
    ResultSet result = null;
   
    @FXML
    private TextField txtuser;
     
    @FXML
    private PasswordField txtpass;
    
    @FXML
    private Label status;
    @FXML
    private VBox vb;
    @FXML
    private Label lb;
    @FXML
    private Label gp;
    @FXML
    private Button login;
    
    @FXML
    private void handleButtonAction(ActionEvent event) {
         conn = Mysqlilogin.Dbconnect();
       String sql = "SELECT * FROM users WHERE username = ? AND password = ?";
       try{
           prepare = conn.prepareStatement(sql);
           prepare.setString(1, txtuser.getText());
           prepare.setString(2, txtpass.getText());
           result = prepare.executeQuery();
           if(result.next()){
              ((Node)event.getSource()).getScene().getWindow().hide();
              Stage stage = new Stage();
              JOptionPane.showMessageDialog(null,"Login Sucessfully !");
              status.setText("Login Successfully");
              FXMLLoader Loader = new FXMLLoader();
              Pane root = Loader.load(getClass().getResource("/prog/progress.fxml").openStream());       
              Scene scene = new Scene(root);       
              stage.setScene(scene);
              stage.initStyle(StageStyle.UNDECORATED);
              stage.show();
           }
           else{
           JOptionPane.showMessageDialog(null, "Username or Password incorrect");
            status.setText("User Login Failed");
           }
       }catch(Exception e){
           JOptionPane.showMessageDialog(null, e);
       }
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
           login.setStyle("-fx-text-fill:red;");
    }

    @FXML
    private void handlekeyEnter(KeyEvent event) {
        if(event.getCode() ==KeyCode.ENTER){
            conn = Mysqlilogin.Dbconnect();
       String sql = "SELECT * FROM users WHERE username = ? AND password = ?";
       try{
           prepare = conn.prepareStatement(sql);
           prepare.setString(1, txtuser.getText());
           prepare.setString(2, txtpass.getText());
           result = prepare.executeQuery();
           if(result.next()){
              ((Node)event.getSource()).getScene().getWindow().hide();
              Stage stage = new Stage();
              JOptionPane.showMessageDialog(null,"Login Sucessfully !");
              status.setText("Login Successfully");
              FXMLLoader Loader = new FXMLLoader();
              Pane root = Loader.load(getClass().getResource("/prog/progress.fxml").openStream());       
              Scene scene = new Scene(root);       
              stage.setScene(scene);
              stage.initStyle(StageStyle.UNDECORATED);
              stage.show();
           }
           else{
           JOptionPane.showMessageDialog(null, "Username or Password incorrect");
            status.setText("User Login Failed");
           }
       }catch(Exception e){
           JOptionPane.showMessageDialog(null, e);
       }
        } 
    }
 
   
}
