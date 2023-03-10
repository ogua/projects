/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ecommerce;

import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 *
 * @author OGUA
 */
public class Ecommerce extends Application {
    
    @Override
    public void start(Stage primaryStage) {

        GridPane gp = new GridPane();

        
        
        TextField tf = new TextField();
        tf.setPromptText("Enter Your First Name");
       
        PasswordField tf2 = new PasswordField();
        tf2.setPromptText("Enter Your Password");
        
        Button btn = new Button();
        btn.setText("Login");
        
        gp.add(tf, 0, 0);
        gp.add(tf2, 0, 1);
        gp.add(btn, 0, 2);
        
        btn.setOnAction(e->{
            if(tf.getText().isEmpty()){
                tf.requestFocus();
                return;
            }
        });
        
        Scene scene = new Scene(gp, 300, 250);
        
        primaryStage.setTitle("Hello World!");
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
