/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ogua;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.stage.Modality;
import javafx.stage.Stage;
/**
 *
 * @author ogua
 */
public class AlertBox {
    public static void handle(){
        Stage primaryStage = new Stage();
        Label label = new Label();
        label.setText("Please comple action here before going");
       
        Button btn = new Button();
        btn.setText("Ok");
        btn.setOnAction(e ->{
        System.out.println("you clicked me");
        });
        
        
        Button btn2 = new Button();
        btn2.setText("Cancel");
        btn2.setOnAction(e -> {
           primaryStage.close();
        });
        VBox vb = new VBox(20);
        vb.setAlignment(Pos.CENTER);
        vb.getChildren().addAll(label,btn,btn2);
        
        Scene scene = new Scene(vb);
        primaryStage.initModality(Modality.APPLICATION_MODAL);
        primaryStage.setMaxWidth(250);
        primaryStage.setTitle("model box to display");
        primaryStage.setScene(scene);
        primaryStage.showAndWait();
        
        
        
        
    
    }
}
