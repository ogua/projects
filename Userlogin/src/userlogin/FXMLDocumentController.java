/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package userlogin;

import java.net.URL;
import java.sql.*;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.control.TreeItem;
import javafx.scene.control.TreeView;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    @FXML
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
    private TreeView<String> treeview;
     
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
              JOptionPane.showMessageDialog(null,"Connection Sucessfully");
              status.setText("Login Successfully");
              ((Node)event.getSource()).getScene().getWindow().hide();
              Stage stage = new Stage();
              FXMLLoader loader = new  FXMLLoader();
              Pane root = loader.load(getClass().getResource("AddMember.fxml").openStream());
              FXMLDocumentController controller = (FXMLDocumentController)loader.getController();
              Scene scene = new Scene(root);
              stage.setScene(scene);
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
     @FXML
     private void AddnewMember(ActionEvent event){
         try{
         Stage primarystage = new Stage();
              FXMLLoader loader = new  FXMLLoader();
              Pane root = loader.load(getClass().getResource("AddMember.fxml").openStream());
              FXMLDocumentController controller = (FXMLDocumentController)loader.getController();
              Scene scene = new Scene(root);
              primarystage.setScene(scene);
              primarystage.show();
         }catch(Exception e){
         JOptionPane.showMessageDialog(null, e);
         }    
     }
     @FXML
     private void UserLogout(ActionEvent event){
      try{
       ((Node)event.getSource()).getScene().getWindow().hide();
              Stage stage = new Stage();
              FXMLLoader loader = new  FXMLLoader();
              Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());
              FXMLDocumentController controller = (FXMLDocumentController)loader.getController();
              Scene scene = new Scene(root);
              stage.setScene(scene);
              stage.show();
      }catch(Exception e){
      JOptionPane.showMessageDialog(null, e);
      }
     
     }  
    @FXML
     private void ExitWindow(ActionEvent event){
     System.exit(0);   
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
     TreeItem<String> parent = new TreeItem<>("NCWC");
     
     //BRANCHES
     TreeItem<String> branch = new TreeItem<>("AddMe");
     parent.getChildren().add(branch);
     treeview.setRoot(parent);
     
    }  
    
}
