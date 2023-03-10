/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lamere;


import javafx.application.Application;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.layout.VBox;
import javafx.scene.text.Text;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class Lamere extends Application {
    Scene scene2;
    @Override
     public void start(Stage primaryStage) {
        // buttons
        Text text = new Text();
        text.setText("WELCOME TO SCENE ONE PARAGRAPH ONE");
        
        
        ChoiceBox<String> choice = new ChoiceBox<>();
        choice.getItems().addAll("nun","ict","pretech","science","BSC.Infor. Tech Mgmnt");
        
        
        Button btn = new Button();
        btn.setText("go to scene2");
        btn.setOnAction(e ->primaryStage.setScene(scene2));
        
        
        //layout for scene1
        VBox vb = new VBox(20);
        vb.setAlignment(Pos.CENTER);
        vb.getChildren().addAll(text,choice,btn);
        Scene scene1 = new Scene(vb, 300, 250);
        
        
        primaryStage.setTitle("SCENE ONE PARAGRAPH ONE");
        primaryStage.setScene(scene1);
        primaryStage.show();
        
        
        //section for scene 2
         Text text2 = new Text();
         text2.setText("WELCOME TO SCENE TWO PARAGRAPH ONE");
         text2.setUnderline(true);
         
        Button btn3 = new Button("modal box");
        btn3.setOnAction(e->AlertBox.handleArlert("THIS IS A MODEL BOX","THIS IS AN EXAMPLE OF AN ALERT MODAL SCENE,"));
        
        Button btn2 = new Button();
        btn2.setText("go to scene1");
        btn2.setOnAction(e ->primaryStage.setScene(scene1));
        //layout for scene1
        VBox vb2 = new VBox(20);
        vb2.setAlignment(Pos.CENTER);
        vb2.getChildren().addAll(text2,btn3,btn2);
        scene2 = new Scene(vb2, 400, 250);
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
