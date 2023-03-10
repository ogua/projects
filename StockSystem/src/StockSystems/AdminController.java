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
import java.util.ResourceBundle;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class AdminController implements Initializable {
    @FXML
    private Label statuslabel;
    @FXML
    private Button Login;
    @FXML
    private TextField userN;
    @FXML
    private PasswordField userP;
     Connection conn = null;
    PreparedStatement prd = null;
    ResultSet rs = null;
    @FXML
    private MenuItem Exit;
    @FXML
    private VBox mainPaneV;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void LOginToMain(ActionEvent event) {
         conn = Mysqlidatabase.database();
       String sql = "SELECT * FROM `admin` WHERE `AdminID` = ? AND `password` = ?";
       int user = Integer.parseInt(userN.getText());
       String pass = userP.getText();
       try{
         prd = conn.prepareStatement(sql);
         prd.setInt(1, user);
         prd.setString(2, pass);
         rs = prd.executeQuery();
         while(rs.next()){
         JOptionPane.showMessageDialog(null, "Login Successfully");
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("Main.fxml"));        
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.show();
         }
       }catch(Exception e){
        JOptionPane.showMessageDialog(null, e.getStackTrace());
       }
    }

    private void TryMain(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Main.fxml"));
        mainPaneV.getChildren().setAll(pane);
    }

    @FXML
    private void ExitAppl(ActionEvent event) {
        Platform.exit();
        System.exit(0);
    }
    
}
