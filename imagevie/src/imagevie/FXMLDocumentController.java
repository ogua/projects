/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package imagevie;

import java.io.File;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.stage.Window;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML
    private Button brow;
    @FXML
    private ImageView imageview;
    private FileChooser filechooser;
    private File file;
    private TextField textfiled;
    private Window Stage;
    private Image image;
    
    @FXML
    private void handleButtonAction(ActionEvent event) {
        file = filechooser.showOpenDialog(Stage);
        if(file!= null){
         textfiled.setText(file.getAbsolutePath());
         image = new Image(file.toURI().toString(),100,100,true,true);
         imageview = new ImageView(image);
        }
        
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        filechooser = new FileChooser();
    }    
    
}
