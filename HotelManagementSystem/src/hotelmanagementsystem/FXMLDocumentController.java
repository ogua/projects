/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package hotelmanagementsystem;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.LocalDate;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Platform;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.Pane;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javax.swing.JOptionPane;
import static jdk.nashorn.internal.objects.NativeString.substr;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
    private Label label;
    @FXML
    private TextField cref;
    @FXML
    private TextField cname;
    @FXML
    private TextField cothers;
    @FXML
    private TextField cPcode;
    @FXML
    private TextField cnumba;
    @FXML
    private TextField cemail;
    @FXML
    private TextField cnationality;
    @FXML
    private DatePicker cdateofB;
    @FXML
    private DatePicker cCheckin;
    @FXML
    private DatePicker cCheckout;
    @FXML
    private ComboBox<String> cidtype;
    @FXML
    private ComboBox<String> cgender;
    @FXML
    private ComboBox<String> cmeals;
    @FXML
    private ComboBox<String> croomType;
    @FXML
    private ComboBox<String> croomno;
    @FXML
    private ComboBox<String> croomEx;
    @FXML
    private TableColumn<Hotel, String> tref;
    @FXML
    private TableColumn<Hotel, String> tfirstname;
    @FXML
    private TableColumn<Hotel, String> tordername;
    @FXML
    private TableColumn<Hotel, String> tpostalcode;
    @FXML
    private TableColumn<Hotel, String> tnumber;
    @FXML
    private TableColumn<Hotel, String> temail;
    @FXML
    private TableColumn<Hotel, String> tnationaliy;
    @FXML
    private TableColumn<Hotel, String> tdateofb;
    @FXML
    private TableColumn<Hotel, String> tidtype;
    @FXML
    private TableColumn<Hotel, String> tgender;
    @FXML
    private TableColumn<Hotel, String> tcheckDate;
    @FXML
    private TableColumn<Hotel, String> tcheckoutDate;
    @FXML
    private TableColumn<Hotel, String> tmael;
    @FXML
    private TableColumn<Hotel, String> troomtype;
    @FXML
    private TableColumn<Hotel, String> troomno;
    @FXML
    private TableColumn<Hotel, String> textno;
    @FXML
    private TextField tax;
    @FXML
    private TextField subtotal;
    @FXML
    private TextField total;
    @FXML
    private Button update;
    @FXML
    private Button delete;
    @FXML
    private Button reset;
    @FXML
    private Button exit;
    ObservableList<String>idtype;
    ObservableList<String>gender;
    ObservableList<String>meal;
    ObservableList<String>roomtype;
    ObservableList<String>roomnum;
    ObservableList<String>roomext;
    @FXML
    private Button Grandtotal;
    @FXML
    private TableView<Hotel> table;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    @FXML
    private MenuItem MealPrice;
    @FXML
    private MenuItem updateMeal;
    LocalDate ld;
    LocalDate ld2;
    LocalDate ld3;
    private ObservableList<Hotel> data;
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       
            // id type
            idtype = FXCollections.observableArrayList("NationalID","Drivers Lencise","VoterID","NHISID");
            cidtype.setItems(idtype);
            
            //gender
            gender = FXCollections.observableArrayList("MALE","FEMALE");
            cgender.setItems(gender);
            
            //meal
            meal = FXCollections.observableArrayList("1","2","3");
            cmeals.setItems(meal);
            
            //room type
            roomtype = FXCollections.observableArrayList("1 Bed Room","2 Bed Room","3 Bed Room");
            croomType.setItems(roomtype);
            
            
            int mealprice1 = 1;
            int mealprice2 = 2;
            int mealprice3 = 3;
            
              cmeals.setOnAction(e->{
                if(cmeals.getValue().equals(String.valueOf(mealprice1))){
                    try {
                        conn = MysqliConnect.Dbconnect();
                        String sqll = "SELECT Meal1 FROM meal";
                        pr = conn.prepareStatement(sqll);
                        rs = pr.executeQuery();
                        if(rs.next()){
                            String meal = rs.getString("Meal1");
                            int pricemeal = Integer.parseInt(meal);
                            tax.setText(String.valueOf(pricemeal));
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(FXMLDocumentController.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
                else if(cmeals.getValue().equals(String.valueOf(mealprice2))){
                    try {
                        conn = MysqliConnect.Dbconnect();
                        String sql = "SELECT Meal2 FROM meal";
                        pr = conn.prepareStatement(sql);
                        rs = pr.executeQuery();
                        if(rs.next()){
                            String meal = rs.getString("Meal2");
                            int pricemeal = Integer.parseInt(meal);
                            tax.setText(String.valueOf(pricemeal));
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(FXMLDocumentController.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
                else if(cmeals.getValue().equals(String.valueOf(mealprice3))){
                    try {
                        conn = MysqliConnect.Dbconnect();
                        String sql = "SELECT Meal3 FROM meal";
                        pr = conn.prepareStatement(sql);
                        rs = pr.executeQuery();
                        if(rs.next()){
                            String meal = rs.getString("Meal3");
                            int pricemeal = Integer.parseInt(meal);
                            tax.setText(String.valueOf(pricemeal));
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(FXMLDocumentController.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            });
              
              
           ///room type
            croomType.setOnAction(e->{
             if(croomType.getValue().equalsIgnoreCase("1 Bed Room")){
                   //room num
            roomnum = FXCollections.observableArrayList("107","108","109","110","111","112");
            croomno.setItems(roomnum);
             
            //room ext
            roomext = FXCollections.observableArrayList("10","11","12","13","14");
            croomEx.setItems(roomext);
             }
             else if(croomType.getValue().equalsIgnoreCase("2 Bed Room")){
                 //room num
            roomnum = FXCollections.observableArrayList("100","101","102","106");
            croomno.setItems(roomnum);  
             
            //room ext
            roomext = FXCollections.observableArrayList("15","16","17","18","19","20");
            croomEx.setItems(roomext);
             }
             else if(croomType.getValue().equalsIgnoreCase("3 Bed Room")){
                 //room num
            roomnum = FXCollections.observableArrayList("103","104","105","106","107","108","109");
            croomno.setItems(roomnum);  
             
            //room ext
            roomext = FXCollections.observableArrayList("21","22","23","24","25","26","16");
            croomEx.setItems(roomext);
             }
            });
            
            data = FXCollections.observableArrayList();
            databaseconnect();
            getcollumse();
            
            
            //Autogenerate CUSTEOMER REF
            getAutoCustomerReff();
    }    

    @FXML
    private void caltotal(ActionEvent event) {
        
        insertData();
    }

    @FXML
    private void updateInfo(ActionEvent event) {
    }

    @FXML
    private void DeleteInfo(ActionEvent event) throws SQLException {
        conn = MysqliConnect.Dbconnect();
        String sql = "delete from";
        try {
            pr = conn.prepareStatement(sql);
            pr.executeQuery();
        } catch (SQLException ex) {
            Logger.getLogger(FXMLDocumentController.class.getName()).log(Level.SEVERE, null, ex);
        }
        finally{
     pr.close();
     conn.close();
    }
    }

    @FXML
    private void ResetInfo(ActionEvent event) {
    }

    @FXML
    private void ExitApplication(ActionEvent event) {
        Platform.exit();
        System.exit(0);
    }

    @FXML
    private void UpdateMealPrice(ActionEvent event) throws IOException {
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("Hotel.fxml").openStream());     
        Scene scene = new Scene(root);  
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.setScene(scene);
        stage.setTitle("UPDATE ROOM PRICES");
        stage.show();
    }

    @FXML
    private void UpdateMealS(ActionEvent event) throws IOException {
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("HotelMeal.fxml").openStream());     
        Scene scene = new Scene(root);  
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.setScene(scene);
        stage.setTitle("UPDATE MEAL PRICES");
        stage.show();
    }
    
      private void insertData(){ 
       ld = cdateofB.getValue();
       ld2 = cCheckin.getValue();
       ld3 = cCheckout.getValue();
      conn = MysqliConnect.Dbconnect();
      String sql = "INSERT INTO `customers`(`CUSTOMER_REF`, `FIRSTNAME`, `OTHERNAMES`, `POSTAL CODE`, `TEL_NUMBER`, `EMAIL`, `NATIONALITY`, `DATEOFBIRTH`, `IDTYPE`, `GENDER`, `CHECKINDATE`, `CHECKOUTDATE`, `MEAL`, `ROOMTYPE`, `ROOMNUM`, `ROOMEXTNO`, `TAX`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       String cusRef = cref.getText();
       String firstname = cname.getText();
       String ordername = cothers.getText();
       int postal = Integer.parseInt(cPcode.getText());
       int customerN = Integer.parseInt(cnumba.getText());
       String email = cemail.getText();
       String nation = cnationality.getText();
       String dateodb = ld.toString();
       String idtyp = cidtype.getValue();
       String gend = cgender.getValue();
       String checkin = ld2.toString();
       String checkout = ld3.toString();
       int meall = Integer.parseInt(cmeals.getValue());
       String rumtype = croomType.getValue();
       int romnum = Integer.parseInt(croomno.getValue());
       int romExt = Integer.parseInt(croomEx.getValue());
       double Tax = Double.parseDouble(tax.getText());
      try {
            pr = conn.prepareStatement(sql);
            pr.setString(1, cusRef);
            pr.setString(2, firstname);
            pr.setString(3, ordername);
            pr.setInt(4, postal);
            pr.setInt(5, customerN);
            pr.setString(6, email);
           pr.setString(7, nation);
           pr.setString(8, dateodb);
           pr.setString(9, idtyp);
           pr.setString(10, gend);
           pr.setString(11, checkin);
           pr.setString(12, checkout);
           pr.setInt(13, meall);
           pr.setString(14, rumtype);
           pr.setInt(15, romnum);
            pr.setInt(16, romExt);
            pr.setDouble(17, Tax);
            int i = pr.executeUpdate();
            if(i == 1){
                refreshTable();
            }
            else{
                JOptionPane.showMessageDialog(null, "Failed");
            }
        } catch (SQLException ex) {
            Logger.getLogger(FXMLDocumentController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
 
    private void databaseconnect(){  
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT * FROM customers";
     try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Hotel(rs.getString(2),rs.getString(3),rs.getString(4),rs.getInt(5),rs.getInt(6),rs.getString(7),rs.getString(8),rs.getString(9),rs.getString(10),rs.getString(11),rs.getString(12),rs.getString(13),rs.getInt(14),rs.getString(15),rs.getInt(16),rs.getInt(17))); 
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    }
    
     private void getcollumse(){
         tref.setCellValueFactory(new PropertyValueFactory<>("customerRef"));
         tfirstname.setCellValueFactory(new PropertyValueFactory<>("firstname"));
         tordername.setCellValueFactory(new PropertyValueFactory<>("othernames"));
         tpostalcode.setCellValueFactory(new PropertyValueFactory<>("postalCode"));
         tnumber.setCellValueFactory(new PropertyValueFactory<>("telNumber"));
         temail.setCellValueFactory(new PropertyValueFactory<>("email"));
         tnationaliy.setCellValueFactory(new PropertyValueFactory<>("nationality"));
         tdateofb.setCellValueFactory(new PropertyValueFactory<>("dateofbirth"));
         tidtype.setCellValueFactory(new PropertyValueFactory<>("idtype"));
         tgender.setCellValueFactory(new PropertyValueFactory<>("gender"));
         tcheckDate.setCellValueFactory(new PropertyValueFactory<>("checkindate"));
         tcheckoutDate.setCellValueFactory(new PropertyValueFactory<>("checkoutdate"));
         tmael.setCellValueFactory(new PropertyValueFactory<>("meal"));
         troomtype.setCellValueFactory(new PropertyValueFactory<>("roomtype"));
         troomno.setCellValueFactory(new PropertyValueFactory<>("roomnum"));
         textno.setCellValueFactory(new PropertyValueFactory<>("roomextno"));
     }
     
     
     
    //refreshtable
    private void refreshTable(){
    
     data.clear();
     String sql = "SELECT * FROM customers";
    try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Hotel(rs.getString(2),rs.getString(3),rs.getString(4),rs.getInt(5),rs.getInt(6),rs.getString(7),rs.getString(8),rs.getString(9),rs.getString(10),rs.getString(11),rs.getString(12),rs.getString(13),rs.getInt(14),rs.getString(15),rs.getInt(16),rs.getInt(17))); 
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
    //MAX VALUE AUTO GENERATE
    private void getAutoCustomerReff(){
    conn = MysqliConnect.Dbconnect();
    String sql = "SELECT MAX(`CUSTOMER_REF`) FROM customers";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
            
                String maxnumber = rs.getString("MAX(`CUSTOMER_REF`)");
                String maxN = substr(maxnumber,2,3);
                int Maxn = Integer.parseInt(maxN);
                int mAxn = Maxn + 1;
                String maxstring = "CF"+mAxn;
                cref.setText(maxstring);
            }
        } catch (SQLException ex) {
            Logger.getLogger(FXMLDocumentController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
