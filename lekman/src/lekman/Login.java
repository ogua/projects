/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lekman;

import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.scene.paint.CycleMethod;
import javafx.scene.paint.RadialGradient;
import javafx.scene.paint.Stop;
import javafx.scene.shape.Circle;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javafx.stage.StageStyle;

/**
 *
 * @author ogua
 */
public class Login {
    public static void log(){
    StackPane stack = new StackPane();
    Circle circle = new Circle(100,100,100);
     circle.setFill(new RadialGradient(-0.3, 135, 0.5, 0.5, 1, true, CycleMethod.NO_CYCLE, new Stop[] {
                    new Stop(0, Color.DARKGRAY),
                    new Stop(1, Color.BLACK)
                 }));
    Group group = new Group();
    Text text = new Text("LOGIN SCREEN PLEASE LOGIN");
    text.setFill(Color.WHITESMOKE);
    GridPane grid = new GridPane();
    grid.setAlignment(Pos.CENTER);
    grid.setHgap(5);
    grid.setVgap(5);
    VBox vb = new VBox();
    vb.setAlignment(Pos.CENTER);
    vb.setPadding(new Insets(10));
    TextField user1 = new TextField();
    user1.setPromptText("Enter Your UserNmae");
    user1.setPrefColumnCount(10);
    grid.add(user1, 0, 0);
    
    PasswordField pwd = new PasswordField();
    grid.add(pwd,0,1);
    pwd.setPromptText("Enter your Password");
    Button btn = new Button("Sigin");
    grid.add(btn,0,2);
    
    Button btn2 = new Button("Signup");
    grid.add(btn2,1,2);
    vb.getChildren().addAll(text,user1,pwd,btn,btn2);
    group.getChildren().addAll(circle,vb);
    Scene scene = new Scene(group,200,200,Color.TRANSPARENT);
    Stage primaryStage = new Stage(StageStyle.TRANSPARENT);
    primaryStage.setTitle("Loging Page");
    primaryStage.setScene(scene);
    primaryStage.show();
    }
}
