/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package databases;

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
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ProgressBar;
import javafx.scene.control.ProgressIndicator;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.Pane;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author OGUA
 */
public class SignupController implements Initializable {

    @FXML
    private TextField uname;
    @FXML
    private TextField upass;
    @FXML
    private Button ulogin;
    @FXML
    private Label login;
    @FXML
    private Label unameError;
    @FXML
    private Label upasswordError;
    private Connection conn;
    private ResultSet rs;
    private PreparedStatement pr;
    @FXML
    private ProgressIndicator progindicator;
    @FXML
    private ProgressBar progressbar;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        progindicator.setVisible(false);    
        progressbar.setVisible(false);
    }    

    @FXML
    private void UserLogin(ActionEvent event) {
        progindicator.setVisible(true);
        String username = uname.getText().toString().trim();
        String pasword = upass.getText().toString().trim();
        if(username.isEmpty() || pasword.isEmpty()){
            if(username.isEmpty()){
                unameError.setText("Uname Cant Be Empty");
                uname.requestFocus();
                progindicator.setVisible(false);
            }else{
                 unameError.setText("");
            }
            
            if(pasword.isEmpty()){
                upasswordError.setText("Password Cant Be Empty");
                upass.requestFocus();
                progindicator.setVisible(false);
            }else{
                upasswordError.setText("");
            }
        
            return;
        }else if(pasword.length() < 5){
            progindicator.setVisible(false);
            unameError.setText("");
            upasswordError.setText("");
            upasswordError.setText("Password is too Short. Must be atleast 6 characters");
            upass.requestFocus();
            return;
        }else{
             unameError.setText("");
             upasswordError.setText("");
            try {
                progindicator.setVisible(true);
                conn = MysqliConnection.Dbconnect();
                String sql = "INSERT INTO `users`(`email`, `password`) VALUES (?,?)";
                pr = conn.prepareStatement(sql);
                pr.setString(1, username);
                pr.setString(2, pasword);
                int i = pr.executeUpdate();
                if(i > 0){
                    JOptionPane.showMessageDialog(null, "Details Added to database Successfully");
                    unameError.setText("");
                    upasswordError.setText("");
                    progindicator.setVisible(false);
                    pr.close();
                }else{
                    JOptionPane.showMessageDialog(null, "Failed to  Add Details into the  database");
                    pr.close();
                    progindicator.setVisible(false);
                }
            } catch (SQLException ex) {
                Logger.getLogger(SignupController.class.getName()).log(Level.SEVERE, null, ex);
                progindicator.setVisible(false);
            }
             
             
        }
    }

    @FXML
    private void GotoLoginPage(MouseEvent event) {
        try{
         ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("FXMLDocument.fxml").openStream());
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
