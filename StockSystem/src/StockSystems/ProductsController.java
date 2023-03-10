/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package StockSystems;

import java.awt.HeadlessException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.MouseEvent;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class ProductsController implements Initializable {
    @FXML
    private TableColumn<Products, String> date;
    @FXML
    private TextField barcode;
    @FXML
    private TextField product;
    @FXML
    private TextField priceout;
    @FXML
    private TableView<Products> table;
    @FXML
    private TableColumn<Products, String> bcode;
    @FXML
    private TableColumn<Products, String> pduct;
    @FXML
    private TableColumn<Products, String> pricI;
    @FXML
    private TableColumn<Products, String> priceO;
    @FXML
    private TableColumn<Products, String> Qty;
    @FXML
    private DatePicker tdate;
    @FXML
    private TextField pricein;
    @FXML
    private TextField quantity;
    @FXML
    private Button clear;
    Connection conn = null;
    PreparedStatement pr = null;
    ResultSet rs = null;
    LocalDate ld;
    private ObservableList<Products> data;
    @FXML
    private TableColumn<Products, String> Tid;
     Statement stmt = null;
    @FXML
    private Button add;
    @FXML
    private Button DELECT;
    @FXML
    private TextField IDQ;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        conn = Mysqlidatabase.database();
        data = FXCollections.observableArrayList();
        getcollumse();
        try {
            databaseconnect();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(ProductsController.class.getName()).log(Level.SEVERE, null, ex);
        }
        IDQ.setDisable(true);
    }    

     private void getcollumse(){
     Tid.setCellValueFactory(new PropertyValueFactory<>("id"));
     bcode.setCellValueFactory(new PropertyValueFactory<>("barcode"));
     pduct.setCellValueFactory(new PropertyValueFactory<>("Product"));
     pricI.setCellValueFactory(new PropertyValueFactory<>("Pricein")); 
     priceO.setCellValueFactory(new PropertyValueFactory<>("Priceout"));
     Qty.setCellValueFactory(new PropertyValueFactory<>("qty"));
     date.setCellValueFactory(new PropertyValueFactory<>("date"));
    }
     private void databaseconnect() throws ClassNotFoundException, SQLException{
    conn = Mysqlidatabase.database();
    String sql = "select * from Products";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Products(rs.getInt(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getString(5),rs.getString(6),rs.getString(7)));
    
    }
    table.setItems(data);
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    rs.close();
    }
    @FXML
    private void clearData(ActionEvent event) {
      barcode.clear();
      product.clear();
      pricein.clear(); 
      priceout.clear();
      quantity.clear();
    }
    private void cleadrdata(){
      barcode.clear();
      product.clear();
      pricein.clear(); 
      priceout.clear();
      quantity.clear();
    }
    @FXML
     private void getdatafromtabele(MouseEvent event){
        Products getit = table.getItems().get(table.getSelectionModel().getSelectedIndex());
        IDQ.setText(String.valueOf(getit.getId()));
        barcode.setText(getit.getBarcode());
        product.setText(getit.getProduct());
        pricein.setText(getit.getPricein());
        priceout.setText(getit.getPriceout());
        quantity.setText(getit.getQty());
        tdate.getValue();
    }
    @FXML
    private void Adddata(ActionEvent event) throws SQLException {
       conn = Mysqlidatabase.database();
       String sql = "INSERT INTO `products`(`Barcode`, `Product`, `PriceIn`, `PriceOut`, `Quantity`, `Date`, `Total`) VALUES (?,?,?,?,?,?,?) ";
       String bar = barcode.getText();
       String pro = product.getText();
       String priceI = pricein.getText();
       String priceo = priceout.getText();
       String qty = quantity.getText();
       double tot = Double.valueOf(pricein.getText() + priceout.getText());
       ld = tdate.getValue();
       String dates = ld.toString();
       
        try {
            pr=conn.prepareStatement(sql);
            pr.setString(1, bar);
            pr.setString(2, pro);
            pr.setString(3, priceI);
            pr.setString(4, priceo);
            pr.setString(5, qty);
            pr.setString(6, dates);
            pr.setDouble(7, tot);
            int i = pr.executeUpdate();
            if(i == 1){
            
                JOptionPane.showMessageDialog(null, "Successfuully");
                refreshTable();
            }
            else{
            
                JOptionPane.showMessageDialog(null, "Failrd to insert data");
            }
        } catch (SQLException ex) {
            Logger.getLogger(ProductsController.class.getName()).log(Level.SEVERE, null, ex);
        }
        finally{
        pr.close();
        }
    }
     private void refreshTable() throws SQLException{
     
         data.clear();
         conn = Mysqlidatabase.database();
    String sql = "select * from Products";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Products(rs.getInt(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getString(5),rs.getString(6),rs.getString(7)));
    
    }
    table.setItems(data);
    }catch(SQLException e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    rs.close();
     }
    @FXML
    private void DELECTdATA(ActionEvent event) {
        Alert alert = new Alert(AlertType.CONFIRMATION);
        alert.setTitle("Comfirmation Alert");
        alert.setHeaderText(null);
        alert.setContentText("ARE YOU SURE YOU WANT TO DELECT THIS FIELD");
        Optional <ButtonType> action = alert.showAndWait();
        if(action.get() == ButtonType.OK){
        
            conn = Mysqlidatabase.database();
         String sql = "DELETE FROM `products` WHERE id = ?";
        try {
            pr = conn.prepareStatement(sql);
            pr.setString(1, IDQ.getText());
            pr.executeUpdate();
            JOptionPane.showMessageDialog(null, "Row Delected Successfully");
            pr.close();
            refreshTable();
        } catch (SQLException ex) {
            Logger.getLogger(ProductsController.class.getName()).log(Level.SEVERE, null, ex);
        }
            
        }
         
    }
}
