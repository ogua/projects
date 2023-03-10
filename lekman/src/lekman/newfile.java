/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lekman;

import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Label;
import javafx.scene.control.RadioButton;
import javafx.scene.control.TextField;
import javafx.scene.control.ToggleButton;
import javafx.scene.layout.GridPane;
import javafx.stage.Modality;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class newfile {
    public static void file(){
    Stage primaryStage = new Stage();
    
    GridPane grid = new GridPane();
    grid.setPadding(new Insets(20));
    grid.setAlignment(Pos.CENTER);
    grid.setHgap(10);
    grid.setVgap(10);
    
    
    Label username = new Label("FirstName");
    grid.add(username, 0, 0);
    
    TextField user = new TextField();
    user.setPromptText("FirstName");
    user.setPrefColumnCount(20);
    grid.add(user,1,0);
    
    Label last = new Label("Other Names");
    grid.add(last, 0, 1);
    
    TextField users = new TextField();
    users.setPromptText("Other Names");
     grid.add(users, 1, 1);
     
    Label gender = new Label("Gender");
    grid.add(gender, 0, 2);
    
    ToggleButton toggle = new ToggleButton();
    
    ChoiceBox<String> choice = new ChoiceBox();
    choice.getItems().addAll("Select Your Gender","Male","Female");
    choice.setValue("Select Your Gender");
    grid.add(choice,1,2);
    Label age = new Label("Age");
    grid.add(age,0,3);
    
    TextField Age = new TextField();
    Age.setPromptText("Enter Age");
    grid.add(Age,1,3);
    
    
    Button ok = new Button("Submit");
    grid.add(ok,0,4);
    ok.setOnAction(e->Fucalert.getall(users, user, choice, Age));
    Button clear = new Button("Clear");
    grid.add(clear, 1, 4);   
    
    Scene scene = new Scene(grid, 400, 300);
        
    primaryStage.setTitle("Add New Detail");
    primaryStage.initModality(Modality.APPLICATION_MODAL);
    primaryStage.setScene(scene);
    primaryStage.show();
    
    
    }
}
