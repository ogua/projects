/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package StockSystems;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ResourceBundle;
import java.util.function.Predicate;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuButton;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class ProductInfoController implements Initializable {
    @FXML
    private VBox mainPane;
    @FXML
    private TableView<product> table;
    @FXML
    private TableColumn<product,String> pid;
    @FXML
    private TableColumn<product,String> pname;
    @FXML
    private TableColumn<product,String> pwty;
    @FXML
    private TableColumn<product,String> pamount;
    @FXML
    private TableColumn<product,String> pdesc;
    @FXML
    private TextField filtersearch;
    ObservableList<product> data;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    @FXML
    private MenuItem billMenu;
    @FXML
    private Label Time;
    @FXML
    private Label date;
    @FXML
    private Button logout;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         data = FXCollections.observableArrayList();
         databaseProduct();
         getcollumse();
         
          FilteredList<product> filterdata = new FilteredList<>(data, e-> true);
         filtersearch.setOnKeyReleased(e ->{
          filtersearch.textProperty().addListener((observableValue, oldValue, newValue) ->{
      
              filterdata.setPredicate((Predicate<? super product>) prod->{ 
                  if(newValue == null || newValue.isEmpty()){
                  
                      return true;
                  }
                  String LowercaseFilter = newValue.toLowerCase();
                  if(String.valueOf(prod.getId()).contains(newValue)){
                     return true;
                  }
                  else if(prod.getName().toLowerCase().contains(LowercaseFilter)){
                     return true;
                  }
                  else if(prod.getDescription().contains(newValue)){
                   return true;
                  }
                  return false;
              });
          });
          SortedList<product> sortedadata = new SortedList<>(filterdata);
          sortedadata.comparatorProperty().bind(table.comparatorProperty());
          table.setItems(sortedadata);
        });
    }    
 private void getcollumse(){
         pid.setCellValueFactory(new PropertyValueFactory<>("id"));
         pname.setCellValueFactory(new PropertyValueFactory<>("name"));
         pwty.setCellValueFactory(new PropertyValueFactory<>("qty"));
         pamount.setCellValueFactory(new PropertyValueFactory<>("Amount"));
         pdesc.setCellValueFactory(new PropertyValueFactory<>("description"));
     }
    @FXML
    private void BillMenu(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Bill.fxml"));
        mainPane.getChildren().setAll(pane);
    }


    @FXML
    private void LogoutMenu(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new  FXMLLoader();
        Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());        
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.show();
    }
     private void databaseProduct(){
    conn = MysqliConnect.dbConnect();
    String sql = "SELECT * FROM `product`";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new product(rs.getInt("ProductId"),rs.getString("name"),rs.getInt("Quantity"),rs.getDouble("Amount"),rs.getString("Desciption")));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
    private void Logout(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new  FXMLLoader();
        Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());        
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.show();
    }

    
}
