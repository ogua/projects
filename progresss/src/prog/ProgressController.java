/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package prog;

import com.sun.scenario.effect.Effect;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.concurrent.Task;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.ProgressBar;
import javafx.scene.control.ProgressIndicator;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Background;
import javafx.stage.Stage;
import javafx.stage.StageStyle;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class ProgressController implements Initializable {
    @FXML
    private ProgressBar pbar;
    @FXML
    private ProgressIndicator proind;
    @FXML
    private AnchorPane panean;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      
       Task task = MakeProgress(10);
        panean.setStyle("-fx-border-color: blue;"
                + "-fx-background-color:blue;"
                + "-fx-border-width: 2;"
                + "-fx-border-style: solid inside;");
        pbar.setBackground(Background.EMPTY);
       task.setOnSucceeded(e->{
       Stage stage = (Stage) panean.getScene().getWindow();
      
       stage.close();
       });
       pbar.progressProperty().bind(task.progressProperty());
       proind.progressProperty().bind(task.progressProperty());
       Thread thread = new Thread(task);
       thread.start();
    }    
   private Task MakeProgress(int seconds){
     return new Task(){
         @Override
         protected Object call() throws Exception {
           for(int i = 0; i< seconds; i++){
            updateProgress(i+1, seconds);
            Thread.sleep(1000);
           }
           return true;
         }
     };
   
   }
}
