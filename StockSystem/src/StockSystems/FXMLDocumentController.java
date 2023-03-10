/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package StockSystems;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Optional;
import java.util.ResourceBundle;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import static javafx.fxml.FXMLLoader.load;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
    private Label label;
    @FXML
    private Label statuslabel;
    @FXML
    private Button Login;
    @FXML
    private TextField userN;
    @FXML
    private PasswordField userP;
    @FXML
    private Button tryto;
    Connection conn = null;
    PreparedStatement prd = null;
    ResultSet rs = null;
    @FXML
    private MenuItem admin;
    @FXML
    private MenuItem Exit;
    @FXML
    private VBox mainPaneV;
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
    }    

    @FXML
    private void LOginToMain(ActionEvent event) throws ClassNotFoundException, SQLException {
       conn = Mysqlidatabase.database();
       String sql = "SELECT * FROM cashier WHERE cashierid = '"+userN.getText()+"' AND password = '"+userP.getText()+"'";
       try{
         prd = conn.prepareStatement(sql);
         rs = prd.executeQuery();
         while(rs.next()){
         JOptionPane.showMessageDialog(null, "Login Successfully");
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new  FXMLLoader();
        Pane root = loader.load(getClass().getResource("Bill.fxml").openStream());
        BillController controll = (BillController)loader.getController();
        controll.getUser(userN.getText());
        Scene scene = new Scene(root); 
        stage.getIcons().add(new Image("/images/logo.png"));
        stage.setScene(scene);
        stage.setOnCloseRequest(e->{               
        e.consume();
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Comfirmation");
        alert.setContentText("Are you sure you want to close the prog");
        Optional <ButtonType> alerts = alert.showAndWait();
        if(alerts.get() == ButtonType.OK){
                   stage.close();
                   Platform.exit();
                }
                
            });
        stage.show();
         }
       }catch(Exception e){
        JOptionPane.showMessageDialog(null, e);
       }
    }

    @FXML
    private void tryTomain(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new  FXMLLoader();
        Pane root = loader.load(getClass().getResource("Bill.fxml").openStream());        
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.show();
    }

    @FXML
    private void AdminLogin(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Admin.fxml"));
        mainPaneV.getChildren().setAll(pane);
    }

    @FXML
    private void ExitProg(ActionEvent event) {
        Platform.exit();
        System.exit(0);
    }
    
}
