/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lamere;

import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.text.Text;
import javafx.stage.Modality;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class AlertBox {
    public static void handleArlert(String title, String message){
        Stage primaryStage = new Stage();
     // buttons
        Text text = new Text();
        text.setText(title);
        
        GridPane gp = new GridPane();
        gp.setPadding(new Insets(20,20,20,20));
        gp.setVgap(20);
        gp.setHgap(20);
        gp.setAlignment(Pos.CENTER);
        
        Label label = new Label();
        label.setText("please enter your age");
        gp.add(label, 0, 0);
        
        TextField textfield = new TextField();
        gp.add(textfield, 0, 1);
        
        Button ok = new Button("Ok");
        gp.add(ok,0,2);
        ok.setOnAction(e->nuberfunc.intIsset(textfield, textfield.getText()));
        Button btn = new Button();
        btn.setText("click to close");
        btn.setOnAction(e->primaryStage.close());
        
        CheckBox checkbox1 = new CheckBox();
        checkbox1.setText("Male");
        CheckBox checkbox2 = new CheckBox();
        checkbox2.setText("FeMale");
        checkbox1.setSelected(true);
        
        Button check = new Button();
        check.setText("GO");
        check.setOnAction(e->nuberfunc.checkhandle(checkbox1,checkbox2));
        HBox hbox = new HBox();
        hbox.getChildren().addAll(checkbox1,checkbox2,check);
        
        VBox vb = new VBox(20);
        vb.setAlignment(Pos.CENTER);
        vb.getChildren().addAll(text,btn);
        
        BorderPane dp = new BorderPane();
        dp.setTop(hbox);
        dp.setLeft(vb);
        dp.setCenter(gp);
        
        Scene scene1 = new Scene(dp, 400, 250);
        primaryStage.initModality(Modality.APPLICATION_MODAL);
        primaryStage.setTitle("alert box");
        primaryStage.setScene(scene1);
        primaryStage.show();   
    }
    
    /// NOT ADDED TO ANY LABEL OR CHECKBOX
     private static void checkhandle(CheckBox checkbox1, CheckBox checkbox2){
         if(checkbox1.isSelected()){
         System.out.println(checkbox1.getText() + " is selected");
         }
         if(checkbox2.isSelected()){
         System.out.println(checkbox2.getText() + " is selected");
         }
     }
}
