/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package prog;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.animation.Transition;
import javafx.animation.TranslateTransition;
import javafx.concurrent.Task;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ProgressBar;
import javafx.scene.control.ProgressIndicator;
import javafx.scene.image.Image;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.util.Duration;

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
       task.setOnSucceeded(e->{
       Stage stage = (Stage) panean.getScene().getWindow();
       panean.setStyle("-fx-background-color:#abc;");
       stage.close();
           try {
               Stage stage2 = new Stage();
               Parent root = FXMLLoader.load(getClass().getResource("/ncwcdatabase/Mainprog.fxml"));
               Scene scene = new Scene(root);
               stage2.setScene(scene);
               stage2.initStyle(StageStyle.UTILITY);
               stage2.setTitle("Main Programme");
               stage2.getIcons().add(new Image("/image/logo.png"));
               stage2.show();
           } catch (IOException ex) {
               Logger.getLogger(ProgressController.class.getName()).log(Level.SEVERE, null, ex);
           }
        
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
