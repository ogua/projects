/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package tables;

import javafx.application.Application;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class Tables extends Application {
    TableView<Product> table;
    @Override
    public void start(Stage primaryStage) {
       
        //name column
        TableColumn<Product, String> names = new TableColumn<>("Name");
        names.setMinWidth(200);
        names.setCellValueFactory(new PropertyValueFactory<>("name"));
        
        //rice column
        TableColumn<Product, Double> prices = new TableColumn<>("Price");
        prices.setMinWidth(200);
        prices.setCellValueFactory(new PropertyValueFactory<>("price"));
        
        //rice column
        TableColumn<Product, String> qty = new TableColumn<>("Quantity");
        qty.setMinWidth(200);
        qty.setCellValueFactory(new PropertyValueFactory<>("quantity"));
       
        table = new TableView<>();
        table.setItems(getproduct());
        table.getColumns().addAll(names,prices,qty);
        VBox vb = new VBox();
        vb.setPadding(new Insets(20));
        vb.getChildren().add(table);
        Scene scene = new Scene(vb, 700, 550);
        
        primaryStage.setTitle("Table Creation!");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    public ObservableList<Product> getproduct(){
        ObservableList<Product> products = FXCollections.observableArrayList();
        products.add(new Product("shoe",100.0,10));
        products.add(new Product("Bag",200.0,3));
        products.add(new Product("shoe",100.0,10));
        products.add(new Product("Canvas",400.0,40));
        return products;
    }
}
