/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package databases;

import java.awt.Image;
import java.io.IOException;
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
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.Pane;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javax.swing.JOptionPane;

/**
 *
 * @author OGUA
 */
public class FXMLDocumentController implements Initializable {
    
    private Label label;
    @FXML
    private TextField uname;
    @FXML
    private TextField upass;
    @FXML
    private Button ulogin;
    @FXML
    private Label signup;
    @FXML
    private Label unameError;
    @FXML
    private Label upasswordError;
    private Connection conn;
    private ResultSet rs;
    private PreparedStatement pr;
    
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void UserLogin(ActionEvent event) throws IOException {
        String username = uname.getText().toString().trim();
        String pasword = upass.getText().toString().trim();
        if(username.isEmpty() || pasword.isEmpty()){
            if(username.isEmpty()){
                unameError.setText("Uname Cant Be Empty");
                uname.requestFocus();
            }else{
                 unameError.setText("");
            }
            
            if(pasword.isEmpty()){
                upasswordError.setText("Password Cant Be Empty");
                upass.requestFocus();
            }else{
                upasswordError.setText("");
            }
        
            return;
        }else{
             unameError.setText("");
             upasswordError.setText("");
            try {
                conn = MysqliConnection.Dbconnect();
                String sql = "SELECT `email`, `password` FROM `users` WHERE `email` = ? AND `password` = ?";
                pr = conn.prepareStatement(sql);
                pr.setString(1, username);
                pr.setString(2, pasword);
                rs = pr.executeQuery();
                if(rs.next()){
                    JOptionPane.showMessageDialog(null, "User Login Successfully");
                   ((Node)event.getSource()).getScene().getWindow().hide();
                    Stage stage = new Stage();
                    FXMLLoader loads = new FXMLLoader();
                    Pane root = loads.load(getClass().getResource("MianProgramme.fxml").openStream());
                    Scene scene = new Scene(root);
                    stage.setScene(scene);
                    stage.initStyle(StageStyle.UTILITY);
                    stage.setTitle("MainProgramme Form");
                    stage.initModality(Modality.APPLICATION_MODAL);
                    stage.show();
                }else{
                     JOptionPane.showMessageDialog(null, "Failed!, Username or Password Incorrect");
                }
            } catch (SQLException ex) {
                Logger.getLogger(SignupController.class.getName()).log(Level.SEVERE, null, ex);
            }
             
             
        }
    }

    @FXML
    private void GotoSignupPage(MouseEvent event) {
       try{
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("Signup.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
        stage.initStyle(StageStyle.UTILITY);
        stage.setTitle("SignUp Form");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    
}
