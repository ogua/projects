/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lekman;

import static java.awt.Color.blue;
import java.net.MalformedURLException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Application;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.HPos;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Label;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.scene.control.RadioMenuItem;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.ToggleButton;
import javafx.scene.control.TreeItem;
import javafx.scene.control.TreeView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import net.sf.jasperreports.engine.*;
import net.sf.jasperreports.view.*;


/**
 *
 * @author ogua
 */
public class Lekman extends Application {
    TableView<Products> table;
    Scene scene2;
    Scene scene;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    String oguaahmed;
    @Override
    public void start(Stage primaryStage) {
       
       conn = Mysqliconnect.Dbconnect();  
        //menu items
            Menu file = new Menu("File");
        
        //menu list items for file
            MenuItem item1 = new MenuItem("New....");
            item1.setOnAction(e->newfile.file());
            MenuItem item2 = new MenuItem("NewFile....");
            item2.setOnAction(e->primaryStage.setScene(scene2));
            MenuItem item3 = new MenuItem("Open Project");
            MenuItem item4 = new MenuItem("Login....");
            item4.setOnAction(e->Login.log());
            MenuItem item5 = new MenuItem("exit");
            item5.setOnAction(e->primaryStage.close());
            
            file.getItems().addAll(item1,item2,item3,item4,item5);
            
       //menu items
            Menu edit = new Menu("Edit");
        
        //menu list items for Edit
            MenuItem item11 = new MenuItem("Undo");
            MenuItem item21 = new MenuItem("Redo");
            MenuItem item31 = new MenuItem("Cut");
            MenuItem item41 = new MenuItem("Copy");
            MenuItem item51 = new MenuItem("Past");
            
            
            edit.getItems().addAll(item11,item21,item31,item41,item51);
            
        //menu items
            Menu view = new Menu("View");
        
        //menu list items for Edit
            MenuItem item111 = new MenuItem("Editor");
            MenuItem item211 = new MenuItem("Split");
            MenuItem item311 = new MenuItem("Code");
            MenuItem item411 = new MenuItem("ToolBar");
            MenuItem item511 = new MenuItem("FullScreen");
            RadioMenuItem item611 = new RadioMenuItem("AutoSave");
            RadioMenuItem item711 = new RadioMenuItem("OnPageLoad");
            item611.setSelected(true);
            item611.disableProperty();
            view.getItems().addAll(item111,item211,item311,item411,item511,item611,item711);
            
        
        //menu items
            Menu nav = new Menu("Navigate");
        
        //menu list items for Edit
            MenuItem item1111 = new MenuItem("Go to File");
            item1111.setOnAction(e->newfile.file());
            MenuItem item2111 = new MenuItem("Go to Type");
            MenuItem item3111 = new MenuItem("Go to Symbol");
            MenuItem item4111 = new MenuItem("Go to Page");
            MenuItem item5111 = new MenuItem("Go to Source");
            MenuItem item6111 = new MenuItem("Back");
            MenuItem item7111 = new MenuItem("Forward");
            MenuItem item8111 = new MenuItem("Inspect");
            MenuItem item9111 = new MenuItem("Select in Favourites");
            
            
            nav.getItems().addAll(item1111,item2111,item3111,item4111,item5111,item6111,item7111,item8111,item9111);
            
             //menu items
            Menu sou = new Menu("Source");
        
        //menu list items for Edit
            MenuItem ite = new MenuItem("Format");
            MenuItem ite1 = new MenuItem("Imsert");
        
            sou.getItems().addAll(ite,ite1);
            
           //menu items
            Menu ref = new Menu("Refactor");
        
        //menu list items for Edit
            MenuItem ite11 = new MenuItem("Format");
            MenuItem ite23 = new MenuItem("Imsert");
        
          ref.getItems().addAll(ite11,ite23);
          
          
          MenuBar menus = new MenuBar();
          menus.getMenus().addAll(file,edit,view,nav,sou,ref);
        
        
          
          // leftside tree items
          
          TreeView<String> tree;
        
        // listviw items
          
         TreeItem<String>Projects,ogua,lamere,domingo,otula,nation;
         
         //root ie the project
         Projects = new TreeItem<>();
         Projects.setExpanded(true);
         
         // Brank Ogua
        ogua = makeitem("ogua",Projects);
        makeitem("source package",ogua);
        makeitem("combine",ogua);
        makeitem("Library",ogua);
        makeitem("meta-inf",ogua);
        
          // Brank Ogua
        lamere = makeitem("lamere",Projects);
        makeitem("source package",lamere);
        makeitem("combine",lamere);
        makeitem("Library",lamere);
        makeitem("meta-inf",lamere);
        
         // Brank Ogua
        domingo = makeitem("domingo",Projects);
        makeitem("source package",domingo);
        makeitem("combine",domingo);
        makeitem("Library",domingo);
        makeitem("meta-inf",domingo);
        
        
         // Brank Ogua
        otula = makeitem("otula",Projects);
        makeitem("source package",otula);
        makeitem("combine",otula);
        makeitem("Library",otula);
        makeitem("meta-inf",otula);
        
         // Brank Ogua
        nation = makeitem("nation",Projects);
        makeitem("source package",nation);
        makeitem("combine",nation);
        makeitem("Library",nation);
        makeitem("meta-inf",nation);
        
        tree = new TreeView<>(Projects);
        tree.setShowRoot(false);
        
        
        
         // ItemID
        TableColumn<Products, String> ID = new TableColumn<>("#ID NUMBER");
        ID.setMinWidth(100);
        ID.setCellValueFactory(new PropertyValueFactory<>("id"));
        
        // name
        TableColumn<Products, String> names = new TableColumn<>("ITEM");
        names.setMinWidth(200);
        names.setCellValueFactory(new PropertyValueFactory<>("name"));
        
        // price
        TableColumn<Products, Double> prices = new TableColumn<>("Price");
        prices.setMinWidth(200);
        prices.setCellValueFactory(new PropertyValueFactory<>("price"));
        
         // Quantity
        TableColumn<Products, String> qty = new TableColumn<>("Quantity");
        qty.setMinWidth(200);
        qty.setCellValueFactory(new PropertyValueFactory<>("quantity"));
        
        table = new TableView<>();
        table.setStyle("-fx-background-color:#abc;");
        table.setItems(getTable());
        table.getColumns().addAll(ID,names,prices,qty);
        
        VBox vb = new VBox();
        
        vb.getChildren().add(table);
        vb.setPadding(new Insets(20));
        
        
        try {
            //FOOTER TEXT
            URL url = new URL("http://www.blogoguaonlinecenter.com");
        } catch (MalformedURLException ex) {
            Logger.getLogger(Lekman.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        Text text = new Text();
        text.setText("COPY RIGHT 2017 - 2018 BY http://www.blogoguaonlinecenter.com All rights reserve");
        Button print = new Button();
        print.setText("japer");
         print.setOnAction(new EventHandler<ActionEvent>() {
           private String Oguaahmed;
            
            @Override
            public void handle(ActionEvent event) {
                  String name = oguaahmed;
                  HashMap param = new HashMap();
                  param.put("ENTER NAME", name);
                try {
                    String report = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\lekman\\src\\lekman\\report5.jrxml";
                    JasperReport jr = JasperCompileManager.compileReport(report);
                    JasperPrint jp = JasperFillManager.fillReport(jr, param, conn);
                    JasperViewer.viewReport(jp);
                } catch (JRException ex) {
                    Logger.getLogger(Lekman.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        });
        FlowPane fpane = new FlowPane();
        fpane.setPadding(new Insets(10));
        fpane.setStyle("-fx-background-color:#ccc;");
        fpane.getChildren().addAll(text,print);
        
        BorderPane bp = new BorderPane();
        bp.setTop(menus);
        bp.setLeft(tree);
        bp.setCenter(vb);
        bp.setBottom(fpane);
        
        
   
    
    GridPane grid1 = new GridPane();
    grid1.setPadding(new Insets(20));
    grid1.setAlignment(Pos.CENTER);
    grid1.setHgap(10);
    grid1.setVgap(10);
    
    
    Label username1 = new Label("FirstName");
    grid1.add(username1, 0, 0);
    
    TextField user1 = new TextField() ;
    user1.setPromptText("FirstName");
    user1.setPrefColumnCount(20);
    grid1.add(user1,1,0);
    
    Label last1 = new Label("Other Names");
    grid1.add(last1, 0, 1);
    
    TextField users1 = new TextField();
    users1.setPromptText("Other Names");
     grid1.add(users1, 1, 1);
     
    Label gender1 = new Label("Gender");
    grid1.add(gender1, 0, 2);
    
    ToggleButton toggle1 = new ToggleButton();
    
    ChoiceBox<String> choice1 = new ChoiceBox();
    choice1.getItems().addAll("Select Your Gender","Male","Female");
    choice1.setValue("Select Your Gender");
    grid1.add(choice1,1,2);
    Label age1 = new Label("Age");
    grid1.add(age1,0,3);
    
    TextField Age1 = new TextField();
    Age1.setPromptText("Enter Age");
    grid1.add(Age1,1,3);
    
    
    Button ok1 = new Button("Submit");
    grid1.add(ok1,0,4);
    Button clear1 = new Button("Clear");
    grid1.add(clear1, 1, 4);   
    
    Button clear2 = new Button("Back to Homepage");
    grid1.add(clear2, 1, 5); 
    clear2.setOnAction(e->primaryStage.setScene(scene));
    scene2 = new Scene(grid1, 900, 500);
        
        
        
     scene = new Scene(bp, 1000, 600);
       
        primaryStage.setTitle("Ogua Solution center");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
    public TreeItem<String> makeitem(String name, TreeItem<String>parent){
        TreeItem<String> items = new TreeItem<>(name);
        items.setExpanded(true);
        parent.getChildren().add(items);
        return items;
    }
    public ObservableList<Products> getTable(){
        ObservableList<Products> product = FXCollections.observableArrayList();
        product.add(new Products(1,"shoe",100.0,10));
        product.add(new Products(2,"Bag",200.0,3));
        product.add(new Products(3,"shoe",100.0,10));
        product.add(new Products(4,"Canvas",400.0,40));
        product.add(new Products(5,"pen",100.0,30));
        product.add(new Products(6,"gucci",200.0,32));
        product.add(new Products(7,"remote",100.0,80));
        product.add(new Products(8,"coat",400.0,100));
        return product;
    }
}
