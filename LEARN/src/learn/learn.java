/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package learn;

import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.TilePane;
import javafx.scene.layout.HBox;
import javafx.scene.text.Text;
import javafx.scene.text.TextAlignment;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class learn extends Application {
    private Insets Insets;
    
    @Override
    public void start(Stage primaryStage) {
        GridPane grid = new GridPane();
        grid.setPadding(new Insets(20,20,20,20));
        grid.setVgap(20.0);
        grid.setHgap(20.0);
        grid.setStyle("-fx-background-color:#ABC;");
        grid.setHgap(5.0);
        
        FlowPane anchorpane = new FlowPane();
        Text label = new Text();
        label.setText("WELCOME To Ogua Solution Center");
        anchorpane.setPadding(new Insets(10,20,20,20));
        anchorpane.setAlignment(Pos.CENTER);
        anchorpane.getChildren().add(label);
        
        
        TilePane tilepane = new TilePane();
        Button file = new Button("file");
        Button Edit = new Button("Edit");
        Button View = new Button("Edit");
        HBox hbox1 = new HBox();
        hbox1.getChildren().addAll(file,Edit,View);
        tilepane.getChildren().add(hbox1);
       
        Text text = new Text();
        text.setText("USERNAME");
        grid.add(text,0,0);
        
        TextField tf = new TextField();
        tf.setPrefColumnCount(10);
        grid.add(tf,1,0);
        
        Text text2 = new Text();
        text2.setText("PASSWORD");
        grid.add(text2,0,1);
        
        TextField pwd = new TextField();
        pwd.setPrefColumnCount(10);
        grid.add(pwd,1,1);
        
        Button Submit = new Button();
        Submit.setText("SUBMIT");
        Button Cancel = new Button();
        Cancel.setText("CANCEL");
        Submit.setOnAction(new EventHandler<ActionEvent>(){
            @Override
            public void handle(ActionEvent e){
            System.out.println("OK WAS CLICKED");
            }
        });
        Cancel.setOnAction(new EventHandler<ActionEvent>(){
            @Override
            public void handle(ActionEvent e){
            System.out.println("CANCEL");
            }
        });
        
        HBox hb = new HBox();
        HBox hb2 = new HBox();
        hb2.getChildren().add(Cancel);
        hb.getChildren().add(Submit);
        grid.add(hb,0,2);
        grid.add(hb2,1,2);
        HBox hb3 = new HBox();
        hb3.setPadding(new Insets(10,10,10,10));
        
        BorderPane pane = new BorderPane();
        pane.setTop(anchorpane);
        pane.setTop(tilepane);
        pane.setCenter(grid);
        
        Scene scene = new Scene(pane, 400, 350);
        primaryStage.setTitle("LEARNING SESSION");
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
