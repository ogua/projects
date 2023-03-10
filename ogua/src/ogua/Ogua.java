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
import javafx.scene.control.TextField;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class Ogua extends Application {
    Stage primaryStage;
    Scene scene1;
    @Override
    public void start(Stage primaryStage) {
        // label for input textfiled
        TextField tf = new TextField();
        Button btf = new Button("GetField");
        btf.setOnAction(e ->Isset(tf, tf.getText()));
        
        
        
        // first Scene
        Label label = new Label();
        label.setText("THIS IS SCENE 1");
        Button btn = new Button();
        btn.setText("go scene 2");
        btn.setOnAction(e ->{
        primaryStage.setScene(scene1);
         
        }
        );
        // Alert box
        Button btn2 = new Button();
        btn2.setText("click modal");
        btn2.setOnAction(e ->AlertBox.handle());
        
        
        //comfirmation alert code
        Button btn3 = new Button();
        btn3.setText("PAY");
        btn3.setOnAction(e ->{
        System.out.println("your comfirmation was");
        });
         
        
        //close button
        Button btn4 = new Button();
        btn4.setText("close");
        btn4.setOnAction(e ->{
         primaryStage.close();
        });
                
        //LAYOUT FOR SCENE PRIMARY
        VBox Layout1 = new VBox();
        Layout1.setAlignment(Pos.CENTER);
        Layout1.getChildren().addAll(tf,btf,label,btn,btn2,btn3,btn4);
        Scene scene = new Scene(Layout1, 300, 250);
        primaryStage.setTitle("Hello Dcene one!");
        primaryStage.setScene(scene);
        primaryStage.show();
        
        // Second Scene1
         Label label1 = new Label();
        label1.setText("THIS IS SCENE 2");
        Button btn1 = new Button();
        btn1.setText("go scene 1");
        btn1.setOnAction(e ->primaryStage.setScene(scene));
        
         //LAYOUT FOR SCENE PRIMARY
        FlowPane Layout = new FlowPane();
        Layout.getChildren().addAll(btn1,label1);
        scene1 = new Scene(Layout, 300, 250);
        
        
     primaryStage.setOnCloseRequest(e ->{
     
      handleclose();
     });
        
        
    }
    // handle close button * &times
     private void handleclose(){
        boolean result = comfirmationBox.handle();
        if(result)
           primaryStage.close();
        
     }
    
     
     // validate TextField
     private boolean Isset(TextField tf, String message){
           try{
               int age = Integer.parseInt(tf.getText());
               System.out.println(age);
               return true;
           }catch(NumberFormatException e){
            System.out.println( message + "is not an a number");
            return false;
           }
     }
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
