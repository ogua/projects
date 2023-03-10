/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package javafxapplication41;

import java.awt.HeadlessException;
import java.io.File;
import java.net.MalformedURLException;
import java.net.URL;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.stage.Window;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
    private Label label;
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
    @FXML
    private VBox vbox;
    @FXML
    BorderPane layout;
    @FXML
    private TextField fname;
    @FXML
    private TextField resident;
    @FXML
    private TextField occupation;
    @FXML
    private TextField oname;
    @FXML
    private TextField status;
    @FXML
    private TextField age;
    @FXML
    private Button submit;
     Connection conn = null;
     Statement stmt = null;
    
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
        }
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
    }    

    @FXML
    private void subitdtat(ActionEvent event) {
          
    }
    
}
