/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package image;

import java.awt.image.BufferedImage;
import java.io.File;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Application;
import javafx.embed.swing.SwingFXUtils;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.scene.image.ImageView;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.TilePane;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javax.imageio.ImageIO;

/**
 *
 * @author ogua
 */
public class Image extends Application {
    Image image;
    ImageView imageview;
    FileChooser filechooser;
    File file;
    TextField img ;

    @Override
    public void start(Stage primaryStage) {
        BorderPane pane = new BorderPane();
        TilePane tile = new TilePane();
        Button btn = new Button("Browse");
        img = new TextField();
        tile.getChildren().addAll(btn,img);                
        btn.setOnAction(new EventHandler<ActionEvent>() {            
            @Override
            public void handle(ActionEvent event) {
               filechooser = new FileChooser();
               FileChooser.ExtensionFilter extFilter = new FileChooser.ExtensionFilter("jpg files (*.jpg)","*.JPG");
               File file = filechooser.showOpenDialog(null);
               try{
               BufferedImage buffer = ImageIO.read(file);
               image = SwingFXUtils.toFXImage(buffer, null);
               imageview.setImage(image);
               }catch(Exception e){
               
               }
            }
        });
        pane.setTop(tile);
        Scene scene = new Scene(pane, 300, 250);
        
        primaryStage.setTitle("Image browse");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
