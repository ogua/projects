/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package tryme;

import javafx.application.Application;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.ListView;
import javafx.scene.control.SelectionMode;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.TilePane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class Tryme extends Application {
     ListView<String> item ;
    @Override
    public void start(Stage primaryStage) {
        Button btn = new Button("Submit");
        btn.setOnAction(e->buttonclick());
       
        ChoiceBox<String> check = new ChoiceBox<>();
  
        
        ObservableList<String> listv = FXCollections.observableArrayList("Easy","Medium","Hard");
        item = new ListView<>();
        item.getItems().addAll(listv);
        VBox root = new VBox();
        root.getChildren().addAll(check,item,btn);
        
        
        
        Scene scene = new Scene(root, 300, 250);
        
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
    public void buttonclick(){
       ObservableList<String> area;
       area =  item.getSelectionModel().getSelectedItems();
       for(String items : area){
        JOptionPane.showMessageDialog(null, area);
       }
    }
}
