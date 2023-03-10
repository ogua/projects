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
import java.sql.SQLException;
import java.time.LocalDate;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.Map;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.function.Predicate;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Platform;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuButton;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.scene.input.KeyCode;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javax.swing.JOptionPane;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperCompileManager;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.design.JRDesignQuery;
import net.sf.jasperreports.engine.design.JasperDesign;
import net.sf.jasperreports.engine.xml.JRXmlLoader;
import net.sf.jasperreports.view.JasperViewer;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class BillController implements Initializable {
    @FXML
    private MenuItem billMenu;
    @FXML
    private MenuItem ProdInfo;
    @FXML
    private Button addBill;
    @FXML
    private Button resetBill;
    @FXML
    private TextField billno;
    @FXML
    private TextField prdtid;
    @FXML
    private TextField oName;
    @FXML
    private TextField pPrice;
    @FXML
    private TextField pQty;
    @FXML
    private TextField pDcntt;
    @FXML
    private DatePicker pDate;
    LocalDate ld;
    @FXML
    private TableColumn<Sales, String> pidtable;
    @FXML
    private TableColumn<Sales, String> pnameTable;
    @FXML
    private TableColumn<Sales, String> patyTable;
    @FXML
    private TableColumn<Sales, String> ppxTable;
    @FXML
    private TableColumn<Sales, String> pdcnTable;
    @FXML
    private TableColumn<Sales, String> totTable;
    @FXML
    private TextField TableTotal;
    @FXML
    private Button printBill;
    @FXML
    private TableColumn<Bill, String> BilDtae;
    @FXML
    private TableColumn<Bill, String> BillNo;
    @FXML
    private TableColumn<Bill, String> BilAmount;
    @FXML
    private TextField searchBill;
    @FXML
    private VBox mainPaneV;
    @FXML
    private Button logout;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    private ObservableList<Sales> data;
    private ObservableList<Bill> datas;
    @FXML
    private TableView<Sales> table;
    @FXML
    private TableView<Bill> table2;
     @FXML
    private Label Time;
    @FXML
    private Label date;
    @FXML
    private TextField pricside;
    @FXML
    private TextField cntdix;
   @FXML
    private Button Calcu;
    @FXML
    private AnchorPane uSERid;
    @FXML
    private Label lablet;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
            data = FXCollections.observableArrayList();
            databaseconnect();
            getcollumse();
            
            datas = FXCollections.observableArrayList();
            databaseBill();
            getcollumseBill();
            
            GenerateID();
            
             FilteredList<Bill> filterdata = new FilteredList<>(datas, e-> true);
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
                  return false;
              });
          });
          SortedList<Bill> sortedadata = new SortedList<>(filterdata);
          sortedadata.comparatorProperty().bind(table2.comparatorProperty());
          table2.setItems(sortedadata);
        });
             
             
        //time and Date
             Calendar cal = new GregorianCalendar();
             int month = cal.get(Calendar.MONTH);
             int year = cal.get(Calendar.YEAR);
             int day = cal.get(Calendar.DAY_OF_MONTH);
             date.setText((month +1)+"/"+day+"/"+year);
             
             int hour = cal.get(Calendar.HOUR);
             int minute = cal.get(Calendar.MINUTE);
             Time.setText(hour+":"+minute);
             
    } 
     private void getcollumse(){
         pidtable.setCellValueFactory(new PropertyValueFactory<>("productid"));
         pnameTable.setCellValueFactory(new PropertyValueFactory<>("name"));
         patyTable.setCellValueFactory(new PropertyValueFactory<>("qty"));
         ppxTable.setCellValueFactory(new PropertyValueFactory<>("price"));
         pdcnTable.setCellValueFactory(new PropertyValueFactory<>("discount"));
         totTable.setCellValueFactory(new PropertyValueFactory<>("total"));
     }
    private void databaseconnect(){
    conn = MysqliConnect.dbConnect();
    String sql = "SELECT * FROM sale WHERE BillId = ?";
    try{
    pr = conn.prepareStatement(sql);
    pr.setString(1, billno.getText());
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Sales(rs.getInt("Productid"),rs.getString("name"),rs.getInt("Quantity"),rs.getDouble("Price"),rs.getInt("Discount"),rs.getDouble("Total")));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
    private void databaseBill(){
    conn = MysqliConnect.dbConnect();
    String sql = "SELECT * FROM `bill_t` ORDER BY BillId DESC";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      datas.add(new Bill(rs.getString("date"),rs.getInt("BillId"),rs.getDouble("total")));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table2.setItems(datas);
    
    }
     private void getcollumseBill(){
         BilDtae.setCellValueFactory(new PropertyValueFactory<>("date"));
         BillNo.setCellValueFactory(new PropertyValueFactory<>("billId"));
         BilAmount.setCellValueFactory(new PropertyValueFactory<>("total"));     
     }
    @FXML
    private void BillMenu(ActionEvent event) {
    }

    @FXML
    private void ProductInformation(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("ProductInfo.fxml"));
        mainPaneV.getChildren().setAll(pane);
    }

    @FXML
    private void LogoutMenu(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new  FXMLLoader();
        Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());        
        Scene scene = new Scene(root);
        stage.getIcons().add(new Image("/images/logo.png"));
        stage.setScene(scene);
        stage.show();
    }

    @FXML
    private void AddBill(ActionEvent event) {
      conn = MysqliConnect.dbConnect();
      String sql = "INSERT INTO `sale`(`BillId`, `Productid`, `name`, `Price`, `Quantity`, `Discount`, `Total`, `date`) VALUES (?,?,?,?,?,?,?,?)";
      int bill = Integer.parseInt(billno.getText());
      int prod = Integer.parseInt(prdtid.getText());
      String name = oName.getText();
      double pric = Double.parseDouble(pPrice.getText());
      int qty = Integer.parseInt(pQty.getText());
      int dixcnt = Integer.parseInt(pDcntt.getText());
      double qtyprice = qty * pric;
      double dix = Double.valueOf(dixcnt);
      double dixs = dix/100;
      double subans = dixs * qtyprice;
      double ans = qtyprice - subans;
      ld = pDate.getValue();
      String dates = ld.toString();
        try {
            pr = conn.prepareStatement(sql);
            pr.setInt(1, bill);
            pr.setInt(2, prod);
            pr.setString(3, name);
            pr.setDouble(4, pric);
            pr.setInt(5, qty);
            pr.setInt(6, dixcnt);
            pr.setDouble(7, ans);
            pr.setString(8, dates);
            int i = pr.executeUpdate();
            if(i == 1){
             subQuantity();
             refreshSale(); 
             clearField();
            }      
            else{
            
                JOptionPane.showMessageDialog(null, "Unable to add details");
            }
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @FXML
    private void ResetBill(ActionEvent event) {
         Alert alert = new Alert(AlertType.CONFIRMATION);
        alert.setTitle("Reset Comfirmation");
        alert.setContentText("Are you sure you want to Reset the Bill Products");
        Optional <ButtonType> action = alert.showAndWait();
        if(action.get() == ButtonType.OK){
        
            conn = MysqliConnect.dbConnect();
        String sql = "DELETE FROM `sale` WHERE BillId = ?";
        try {
            pr = conn.prepareStatement(sql);
            pr.setString(1, billno.getText());
            pr.executeUpdate();
            refreshSale(); 
            JOptionPane.showMessageDialog(null, "Bill Reset Successfully");
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        }
        
    }

    @FXML
    private void PrintBill(ActionEvent event) throws JRException{
                    Map parameters = new HashMap();
		    parameters.put("BillID", billno.getText());
                    parameters.put("BUILLSUB", billno.getText());      
                    String report = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\StockSystem\\src\\StockSystems\\report1.jrxml";
                    JasperReport jr = JasperCompileManager.compileReport(report);
                    JasperPrint jp = JasperFillManager.fillReport(jr, parameters, conn);
                    JasperViewer.viewReport(jp,false);                       
                    GenerateID();
                    data.clear();
                    clearField();
    }

    @FXML
    private void getbill(ActionEvent event) {
        conn = MysqliConnect.dbConnect();
        String sql = "select BillId from sale";
        
    }

    
    //refresh for sales
    private void refreshSale(){   
    data.clear();
    conn = MysqliConnect.dbConnect();
    String sql = "SELECT * FROM sale WHERE BillId = ?";
    try{
    pr = conn.prepareStatement(sql);
    pr.setString(1, billno.getText());
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Sales(rs.getInt("Productid"),rs.getString("name"),rs.getInt("Quantity"),rs.getDouble("Price"),rs.getInt("Discount"),rs.getDouble("Total")));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
    
    //refresh for bills Table
    private void refershBill(){
    datas.clear();
    conn = MysqliConnect.dbConnect();
    String sql = "SELECT * FROM `bill_t` ORDER BY BillId DESC";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      datas.add(new Bill(rs.getString("date"),rs.getInt("BillId"),rs.getDouble("total")));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table2.setItems(datas);
    
    }
// clear data from field
    private void clearField(){
    prdtid.clear();
    oName.clear();
    pPrice.clear();
    pQty.clear();
        
    }
    private void SearchData(KeyEvent event) throws SQLException {
        if(event.getCode() == KeyCode.ENTER){
         conn = MysqliConnect.dbConnect();
         String sql = "SELECT * FROM `product` WHERE ProductId = ?";
         int pids = Integer.parseInt(prdtid.getText());
            try {
                pr = conn.prepareStatement(sql);
                pr.setInt(1, pids);
                rs = pr.executeQuery();
                while(rs.next()){          
                    oName.setText(rs.getString("name"));
                    pPrice.setText(rs.getString("Amount"));
                    pQty.setText("1");
                    pDcntt.setText("0");
                }
            } catch (SQLException ex) {
                Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
            }
            pr.close();
            rs.close();
        }
    }

    @FXML
    private void calculate(ActionEvent event) throws SQLException {
         conn = MysqliConnect.dbConnect();
         String sql = "SELECT SUM(Total) FROM sale WHERE BillId = ?";
        try {
            double GrandTotal = Double.parseDouble(billno.getText());
            pr = conn.prepareStatement(sql);
            pr.setDouble(1, GrandTotal);
            rs = pr.executeQuery();
            if(rs.next()){        
             String num2 = rs.getString("SUM(Total)");
             TableTotal.setText(num2);
              InsertBill();
            }
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
        pr.close();
        rs.close();
    }
    private void InsertBill(){
    conn = MysqliConnect.dbConnect();
    String sql = "INSERT INTO `bill_t`(`CashierID`, `BillId`, `total`, `date`) VALUES (?,?,?,?)";
    int cahId = Integer.parseInt(lablet.getText());
    int billId = Integer.parseInt(billno.getText());
    double TotalP = Double.parseDouble(TableTotal.getText());
    ld = pDate.getValue();
    String datess = ld.toString();
        try {
            pr = conn.prepareStatement(sql);
            pr.setInt(1, cahId);
            pr.setInt(2, billId);
            pr.setDouble(3, TotalP);
            pr.setString(4, datess);
            int i = pr.executeUpdate();
            if(i==1){
            refershBill();
            }
            else{
            JOptionPane.showMessageDialog(null, "Failed to insert data");
            }
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
    private void GenerateID(){
      conn = MysqliConnect.dbConnect();
      String sql = "SELECT MAX(BillId) FROM sale";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
            
                String Inv = rs.getString("MAX(BillId)");
                int invoice = Integer.parseInt(Inv);
                int invices = invoice + 1;
                billno.setText(String.valueOf(invices));
            }
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void getUser(String user){
      lablet.setText(user);       
    }

    @FXML
    private void GetField(ActionEvent event) throws SQLException {
         conn = MysqliConnect.dbConnect();
         String sql = "SELECT * FROM `product` WHERE ProductId = ?";
         int pids = Integer.parseInt(prdtid.getText());
            try {
                pr = conn.prepareStatement(sql);
                pr.setInt(1, pids);
                rs = pr.executeQuery();
                while(rs.next()){          
                    oName.setText(rs.getString("name"));
                    pPrice.setText(rs.getString("Amount"));
                    pQty.setText("1");
                    pDcntt.setText("0");
                }
            } catch (SQLException ex) {
                Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
            }
            pr.close();
            rs.close();
    }
    private void subQuantity(){
      conn = MysqliConnect.dbConnect();
      String sql = "SELECT `Quantity` FROM `product` WHERE `ProductId` = ?";
      int num1 = Integer.parseInt(prdtid.getText());
      try {
            pr = conn.prepareStatement(sql);
            pr.setInt(1,num1);
            rs = pr.executeQuery();
            if(rs.next()){
                int num5 = Integer.parseInt(pQty.getText());
                String num2 = rs.getString("Quantity");
                int num3 = Integer.parseInt(num2);
                int num4 = num3 - num5 ;
                String sql2 = "UPDATE `product` SET `Quantity`= ? WHERE `ProductId` = ?";
                pr = conn.prepareStatement(sql2);
                pr.setInt(1, num4);
                pr.setInt(2, num1);
                pr.executeUpdate();
            }
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
      
    }
}
