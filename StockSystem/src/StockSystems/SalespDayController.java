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
import java.time.LocalDate;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
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
public class SalespDayController implements Initializable {
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
    private TableView<Sales> table;
    @FXML
    private TableColumn<Sales, String> a1;
    @FXML
    private TableColumn<Sales, String> a2;
    @FXML
    private TableColumn<Sales, String> a3;
    @FXML
    private TableColumn<Sales, String> a4;
    ObservableList<Sales> data;
     Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    @FXML
    private DatePicker date1;
    @FXML
    private DatePicker date2;
    @FXML
    private Button SearchDate;
    LocalDate ld;
    LocalDate lds;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         data = FXCollections.observableArrayList();
         getcollumseBill();
    } 
    private void getcollumseBill(){
         a1.setCellValueFactory(new PropertyValueFactory<>("name"));
         a2.setCellValueFactory(new PropertyValueFactory<>("qty"));  
         a3.setCellValueFactory(new PropertyValueFactory<>("total"));
         a4.setCellValueFactory(new PropertyValueFactory<>("date"));
     }
    @FXML
    private void saerchData(ActionEvent event) {
     conn = MysqliConnect.dbConnect();
     ld = date1.getValue();
    lds = date2.getValue();
    String dat = ld.toString();
    String dats = lds.toString();
    String sql = "SELECT * FROM sale WHERE date BETWEEN '"+dat+"' AND '"+dats+"' ORDER BY BillId DESC";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Sales(rs.getString(3),rs.getInt(5),rs.getDouble(7),rs.getString(8)));
    refresh();
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);    
    }
    public void refresh(){
     data.clear();
     conn = MysqliConnect.dbConnect();
     ld = date1.getValue();
    lds = date2.getValue();
    String dat = ld.toString();
    String dats = lds.toString();
    String sql = "SELECT * FROM sale WHERE date BETWEEN '"+dat+"' AND '"+dats+"' ORDER BY BillId DESC";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Sales(rs.getString(3),rs.getInt(5),rs.getDouble(7),rs.getString(8)));
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data); 
        
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
