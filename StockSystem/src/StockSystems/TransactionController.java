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
public class TransactionController implements Initializable {
    @FXML
    private VBox main;
    @FXML
    private MenuItem aCash;
    @FXML
    private MenuItem Apro;
    @FXML
    private MenuItem Cdetail;
    @FXML
    private MenuItem transac;
    @FXML
    private MenuItem inven;
    @FXML
    private MenuItem UpdateS;
    @FXML
    private MenuItem sPerP;
    @FXML
    private MenuItem SperD;
    @FXML
    private Button lOut;
    @FXML
    private TableView<Bill> table;
    @FXML
    private TableColumn<Bill, String> a1;
    @FXML
    private TableColumn<Bill, String> a2;
    @FXML
    private TableColumn<Bill, String> a3;
    @FXML
    private TableColumn<Bill, String> a4;
    @FXML
    private TableColumn<Bill, String> a5;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    ObservableList<Bill> data;
    @FXML
    private TextField searchBill;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       data = FXCollections.observableArrayList();
       databaseBill();
       getcollumseBill();
       
        FilteredList<Bill> filterdata = new FilteredList<>(data, e-> true);
             searchBill.setOnKeyReleased(e ->{
             searchBill.textProperty().addListener((observableValue, oldValue, newValue) ->{
      
              filterdata.setPredicate((Predicate<? super Bill>) prod->{ 
                  if(newValue == null || newValue.isEmpty()){
                  
                      return true;
                  }
                  String LowercaseFilter = newValue.toLowerCase();
                  if(String.valueOf(prod.getBillId()).contains(newValue)){
                     return true;
                  }
                  if(String.valueOf(prod.getCashier()).contains(newValue)){
                     return true;
                  }
                  return false;
              });
          });
          SortedList<Bill> sortedadata = new SortedList<>(filterdata);
          sortedadata.comparatorProperty().bind(table.comparatorProperty());
          table.setItems(sortedadata);
        });
             
             
    } 
     private void databaseBill(){
    conn = MysqliConnect.dbConnect();
    String sql = "SELECT * FROM `bill_t` ORDER BY BillId DESC";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Bill(rs.getInt(1),rs.getInt(2),rs.getDouble(3),rs.getString(4),rs.getString(5)));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
     private void getcollumseBill(){
         a1.setCellValueFactory(new PropertyValueFactory<>("cashier"));
         a2.setCellValueFactory(new PropertyValueFactory<>("billId"));  
         a3.setCellValueFactory(new PropertyValueFactory<>("total"));
         a4.setCellValueFactory(new PropertyValueFactory<>("date"));
         a5.setCellValueFactory(new PropertyValueFactory<>("datetime"));     
     }
   @FXML
    private void Acash(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Main.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void aPro(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("AddProduct.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void cdetail(ActionEvent event) {
    }


    @FXML
    private void Trans(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Transaction.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Inven(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Inventory.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Updates(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Update.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void SperP(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("SalepProduct.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Sperd(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("SalespDay.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
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
