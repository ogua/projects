/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package menus;

import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.scene.layout.BorderPane;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class Menus extends Application {
    
    @Override
    public void start(Stage primaryStage) {
        Menu menu = new Menu("File");
        
        MenuItem item1 = new MenuItem("open");
        MenuItem item2 = new MenuItem("open");
        MenuItem item3 = new MenuItem("open");
        
        menu.getItems().addAll(item1, item2, item3);
        
        MenuBar menubar = new MenuBar();
        menubar.getMenus().add(menu);
        
        BorderPane root = new BorderPane();
        root.setTop(menubar);
       
        
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
    
}
