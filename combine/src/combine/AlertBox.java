/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package combine;

import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.stage.Modality;
import javafx.stage.Stage;
/**
 *
 * @author ogua
 */
public class AlertBox {
    public static void alert(){
        Stage primaryStage;
        //Layout for midle items
        GridPane grid = new GridPane();
        grid.setPadding(new Insets(20));
        grid.setVgap(5);
        grid.setHgap(5);
         //working on grid items
        Label label = new Label("UserName");
         grid.add(label, 0,0);
        
        TextField tf1 = new TextField("enter user name");
        tf1.setPrefColumnCount(20);
        grid.add(tf1,1,0);
        
        Label label2 = new Label("PassWord");
        grid.add(label2,0,1);
        
        PasswordField pwd = new PasswordField();
        grid.add(pwd,1,1);
        
        Label age = new Label("Age");
        grid.add(age,0,2);
                
        TextField tf2 = new TextField("please enter your age");
        grid.add(tf2,1,2);
        
        Label label3 = new Label("Gender");
        grid.add(label3,0,3);
        
        CheckBox check = new CheckBox("Male");
        grid.add(check,1,3);
        check.setSelected(true);
        
        CheckBox check2 = new CheckBox("Fmale");
        grid.add(check2,3,3);
              
        Button btn5 = new Button("Submit");
        grid.add(btn5,1,4);
        
        Scene scene = new Scene(grid, 550, 550);
        primaryStage = new Stage();
        primaryStage.initModality(Modality.APPLICATION_MODAL);
        primaryStage.setTitle("WELCOME TO OGUA SOLUTION CENTER");
        primaryStage.setScene(scene);
        primaryStage.show();
    
    
    }
}
