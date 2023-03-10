/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package something;

import java.awt.Insets;
import javafx.application.Application;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TreeItem;
import javafx.scene.control.TreeView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.StackPane;
import javafx.scene.paint.Color;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class Something extends Application {
    TreeView<String> tree;
    TableView<Product> table;
    @Override
    public void start(Stage primaryStage) {
       //menu
        
        Menu menu = new Menu("file");
        
        
        MenuItem item1 = new MenuItem("Open");
        MenuItem item2 = new MenuItem("New");
        menu.getItems().addAll(item1,item2);
        
        MenuBar bar = new MenuBar();
        bar.getMenus().add(menu);
        
        
        
        // Treeview
        
        TreeItem<String>root, ogua, ahmed;
        //root
        root = new TreeItem<>();
        root.setExpanded(true);
        
        //ogua and create method
        ogua = makebranch("ogua", root);
        makebranch("kofi",ogua);
        makebranch("yaw",ogua);
        
        //ahmed make branches
        ahmed = makebranch("ahmed",root);
        makebranch("domingo",ahmed);
        
        tree = new TreeView<>(root);
        tree.setShowRoot(false);
        
        
        // colume 
        
        
        //name
        TableColumn<Product, String> cname = new TableColumn<>("Name");
        cname.setMinWidth(100);
        cname.setCellValueFactory(new PropertyValueFactory<>("name"));
        
          
        //age
        TableColumn<Product, String> cage = new TableColumn<>("Age");
        cage.setMinWidth(100);
        cage.setCellValueFactory(new PropertyValueFactory<>("age"));
        
        
          
        //name
        TableColumn<Product, String> ctry = new TableColumn<>("Country");
        ctry.setMinWidth(100);
        ctry.setStyle("-fx-background-Color:#ABX;");
        ctry.setCellValueFactory(new PropertyValueFactory<>("country"));
        
        
        table = new TableView<>();
        table.setItems(getproduct());
        table.getColumns().addAll(cname,cage,ctry);
        
        //layout for tabel
        StackPane stack = new StackPane();
        stack.getChildren().add(table);
        
        BorderPane bp = new BorderPane();
        bp.setTop(bar);
        bp.setLeft(tree);
        bp.setCenter(stack);
        Scene scene = new Scene(bp, 600, 550, Color.BLACK);
        
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
    public TreeItem<String> makebranch(String name, TreeItem<String> parent){
        TreeItem<String> trees = new TreeItem<>(name);
        trees.setExpanded(true);
        parent.getChildren().add(trees);
        return trees;
    }
    // table methos declairation
    public ObservableList<Product>getproduct(){
        ObservableList<Product> products = FXCollections.observableArrayList();
        products.add(new Product("Ogua",25,"Ghana"));
        products.add(new Product("Ogua",5,"sudan"));
        products.add(new Product("Ogua",2,"keyna"));
        products.add(new Product("Ogua",18,"burkina"));
        return products;
    }
}
