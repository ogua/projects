/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package employeeinfosystem;

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
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.ListView;
import javafx.scene.control.Tab;
import javafx.scene.control.TabPane;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;
import static jdk.nashorn.internal.objects.NativeString.substr;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class AddEmployeeController implements Initializable {
    @FXML
    private Button back;
    @FXML
    private Button back1;
    @FXML
    private Button back3;
    @FXML
    private Button back31;
    @FXML
    private Button back311;
    @FXML
    private Button RSET;
    @FXML
    private Button Add;
    @FXML
    private AnchorPane goback2;
    @FXML
    private ComboBox<String> A1;
    @FXML
    private TextField A2;
    @FXML
    private TextField A3;
    @FXML
    private TextField A4;
    @FXML
    private TextField A6;
    @FXML
    private DatePicker A5;
    @FXML
    private ComboBox<String> A7;
    @FXML
    private ComboBox<String> A8;
    @FXML
    private TextField A9;
    @FXML
    private TextField A10;
    @FXML
    private TextField A11;
    @FXML
    private TextField A12;
    @FXML
    private TextField A13;
    @FXML
    private TextField A14;
    @FXML
    private TextField A15;
    @FXML
    private TextField A16;
    @FXML
    private TextField A17;
    @FXML
    private TextField A18;
    @FXML
    private TextField A19;
    @FXML
    private TextField A20;
    @FXML
    private TextField A30;
    @FXML
    private TextField A32;
    @FXML
    private TextField A34;
    @FXML
    private TextField A36;
    @FXML
    private TextField A38;
    @FXML
    private DatePicker A31;
    @FXML
    private DatePicker A33;
    @FXML
    private DatePicker A35;
    @FXML
    private DatePicker A37;
    @FXML
    private DatePicker A39;
    @FXML
    private TextField A22;
    @FXML
    private TextField A23;
    @FXML
    private TextField A24;
    @FXML
    private TextField A25;
    @FXML
    private TextField A26;
    @FXML
    private TextField A27;
    @FXML
    private TextField A28;
    @FXML
    private TextField A29;
    @FXML
    private DatePicker A21;
    @FXML
    private TextField A40;
    @FXML
    private TextField A41;
    @FXML
    private DatePicker A42;
    @FXML
    private DatePicker A43;
    @FXML
    private DatePicker A44;
    @FXML
    private TextField A45;
    @FXML
    private DatePicker A47;
    @FXML
    private DatePicker A48;
    @FXML
    private DatePicker A49;
    @FXML
    private TextField A50;
    @FXML
    private DatePicker A53;
    @FXML
    private DatePicker A52;
    @FXML
    private ComboBox<String> A46;
    @FXML
    private TextField A51;
    @FXML
    private DatePicker A54;
    @FXML
    private TextField A55;
    @FXML
    private TextField A56;
    @FXML
    private TextField A57;
    @FXML
    private DatePicker A58;
    @FXML
    private DatePicker A59;
    @FXML
    private TextField A60;
    @FXML
    private TextField A61;
    @FXML
    private TextField A62;
    @FXML
    private TextField A63;
    @FXML
    private TextField A64;
    @FXML
    private DatePicker A65;
    @FXML
    private DatePicker A66;
    @FXML
    private TextField A67;
    @FXML
    private TextField A68;
    @FXML
    private TextField A69;
    @FXML
    private TextField A70;
    @FXML
    private TextField A71;
    @FXML
    private DatePicker A72;
    @FXML
    private DatePicker A73;
    @FXML
    private TextField A74;
    @FXML
    private Tab A75;
    @FXML
    private TextField A76;
    @FXML
    private TextField A77;
    @FXML
    private TextField A78;
    @FXML
    private DatePicker A79;
    @FXML
    private DatePicker A80;
    @FXML
    private TextField A81;
    @FXML
    private TextField A82;
    @FXML
    private TextField A83;
    @FXML
    private ComboBox<String> A84;
    @FXML
    private TextField A85;
    @FXML
    private TextField A86;
    @FXML
    private ComboBox<String> A87;
    @FXML
    private TextField A88;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    ObservableList<String>d1;
    ObservableList<String>d2;
    ObservableList<String>d3;
    ObservableList<String>d4;
    ObservableList<String>d5;
    ObservableList<String>d6;
    LocalDate l1;
    LocalDate l2;
    LocalDate l3;
    LocalDate l4;
    LocalDate l5;
    LocalDate l6;
    LocalDate l7;
    LocalDate l8;
    LocalDate l9;
    LocalDate l10;
    LocalDate l11;
    LocalDate l12;
    LocalDate l13;
    LocalDate l14;
    LocalDate l15;
    LocalDate l16;
    LocalDate l17;
    LocalDate l18;
    LocalDate l19;
    LocalDate l20;
    LocalDate l21;
    LocalDate l22;
    LocalDate l23;
    LocalDate l24;
    String employeID;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
              
       d1 = FXCollections.observableArrayList("MR","MRS");
       A1.setItems(d1);
       
       d2 = FXCollections.observableArrayList("MALE","FEMALE");
       A7.setItems(d2);
       
       d3 = FXCollections.observableArrayList("MARRIED","SINGLE");
       A8.setItems(d3);
       
       d6 = FXCollections.observableArrayList("BUSINESS","SCIENCE","AGRIC","HOME ECONS","VISUAL ARTS","ELECTRICALS","BUILDING AND CONSTRUCTION","ENGINEERING");
       A46.setItems(d6);
       
       d4 = FXCollections.observableArrayList("ACCOUNTING DEPARTMENT","HUMAN RESOURCE DEPARTMENT","INFORMATION TECHNOLOGY DEPARTMENT","PROCUREMENT MANAGEMENT DEPARTMENT","PUBLIC HEALTH DEPARTMENT","TOURISM DEPARTMENT","ENGINEERING DEPARTMENT","TRANSPORTATION DEPARTMENT","TREASURY DEPARTMENT","BUDJET DEPARTMENT","LEGAL DEPARTMENT","LAW ENFORCEMENT DEPARTMENT","PUBLIC RELATIONS DEPARTMENT");
       A84.setItems(d4);
       
       d5 = FXCollections.observableArrayList("GD1","GD2");
       A87.setItems(d5);
       
       A84.setOnAction(e->{
           if(A84.getValue().equalsIgnoreCase("ACCOUNTING DEPARTMENT")){
           try {
               A85.setText("ACD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }
                 
       }
       if(A84.getValue().equalsIgnoreCase("HUMAN RESOURCE DEPARTMENT")){
           try {
               A85.setText("HRD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }
                 
       }
       
       if(A84.getValue().equalsIgnoreCase("INFORMATION TECHNOLOGY DEPARTMENT")){
           try {
               A85.setText("ITD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
        if(A84.getValue().equalsIgnoreCase("PROCUREMENT MANAGEMENT DEPARTMENT")){
           try {
               A85.setText("PMD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
        if(A84.getValue().equalsIgnoreCase("PUBLIC HEALTH DEPARTMENT")){
           try {
               A85.setText("PHD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
       if(A84.getValue().equalsIgnoreCase("TOURISM DEPARTMENT")){
           try {
               A85.setText("TD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
       if(A84.getValue().equalsIgnoreCase("ENGINEERING DEPARTMENT")){
           try {
               A85.setText("ED");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
        if(A84.getValue().equalsIgnoreCase("TRANSPORTATION DEPARTMENT")){
           try {
               A85.setText("TSD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
        if(A84.getValue().equalsIgnoreCase("TRANSPORTATION DEPARTMENT")){
           try {
               A85.setText("TD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
        
        if(A84.getValue().equalsIgnoreCase("TREASURY DEPARTMENT")){
           try {
               A85.setText("TRD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       if(A84.getValue().equalsIgnoreCase("BUDJET DEPARTMENT")){
           try {
               A85.setText("BJD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
       if(A84.getValue().equalsIgnoreCase("LEGAL DEPARTMENT")){
           try {
               A85.setText("LGD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
       if(A84.getValue().equalsIgnoreCase("LAW ENFORCEMENT DEPARTMENT")){
           try {
               A85.setText("LED");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       
       if(A84.getValue().equalsIgnoreCase("PUBLIC RELATIONS DEPARTMENT")){
           try {
               A85.setText("PRD");
               conn = MysqliConnect.Dbconnect();
               String sql = "SELECT MAX(EmployeeId) FROM employees WHERE `JDEPARTMENT` = ?";
               pr = conn.prepareStatement(sql);
               pr.setString(1, A84.getValue());
               rs = pr.executeQuery();
               if(rs.next()){                 
                   String num1 = rs.getString("MAX(EmployeeId)");
                   String num2 = substr(num1,3,3);
                   int num3 = Integer.parseInt(num2);
                   int num4 = num3 + 1 ;
                   A86.setText(String.valueOf(num4));
                   employeID = A85.getText()+A86.getText();
               } } catch (SQLException ex) {
               Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
           }                
       }
       });
       
       A87.setOnAction(e->{
           if(A87.getValue().equalsIgnoreCase("GD1")){
          A88.setText("1000");
       }
       if(A87.getValue().equalsIgnoreCase("GD2")){
          A88.setText("2000");
       }    
       });
                   
    }    

    @FXML
    private void Goback1(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("MainProgramme.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("ADD EMPLOYEE");
        stage.show();
    }


    @FXML
    private void RESETDATA(ActionEvent event) {
    }

    @FXML
    private void gabak(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("MainProgramme.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("ADD EMPLOYEE");
        stage.show();
    }

   
    private void Goback1(MouseEvent event) {
        
    }
    @FXML
    private void INSETDATA(ActionEvent event) {      
        conn = MysqliConnect.Dbconnect();
        String sql = "INSERT INTO `employees`(`id`, `Title`, `Firstname`, `MiddleName`, `othernames`, `dateofbirth`, `placeofbirth`, `gender`, `status`, `address`, `zipcode`, `citizenship`, `telephone`, `mobile`, `height`, `weight`, `email`, `SSSNO`, `Sfirstname`, `Slastname`, `Sothernames`, `Soccupation`, `sdateofbirth`, `stelephonenumber`, `Ffirstname`, `Flastname`, `Fothernames`, `Mfirstname`, `Mlastname`, `Mothernames`, `C1fulname`, `c1dateofbirth`, `C2fulname`, `c2dateofbirth`, `C3fulname`, `c3dateofbirth`, `C4fulname`, `C4dateofbirth`, `C5fulname`, `C5dateofbirth`, `ENAMEOFSCHOOL`, `EDEGREECOURSE`, `EDATEOFATTFRM`, `EDATEOFATTO`, `EGRADUTDATE`, `SNAMEOFSCHOOL`, `SDEGREECOURSE`, `SDATEOFATTFRM`, `SDATEOFATTO`, `SGRADUTDATE`, `TNAMEOFSCHOOL`, `TDEGREECOURSE`, `TDATEOFATTFRM`, `TDATEOFATTO`, `TGRADUTDATE`, `WCOMPANY`, `WPOSITION`, `WDEPARTMNT`, `WINCLUSEFRM`, `WINCLUSETO`, `WSTATUS`, `WSALARYPERMNTH`, `WTUCOMPANY`, `WTUPOSITION`, `WTUDEPARTMNT`, `WTUINCLUSEFRM`, `WTUINCLUSETO`, `WTUSTATUS`, `WTUSALARYPERMNTH`, `WTRCOMPANY`, `WTRPOSITION`, `WTRDEPARTMNT`, `WTRINCLUSEFRM`, `WTRINCLUSETO`, `WTRSTATUS`, `WTRSALARYPERMNTH`, `WFRCOMPANY`, `WFRPOSITION`, `WFRDEPARTMNT`, `WFRINCLUSEFRM`, `WFRINCLUSETO`, `WFRSALARYPERMNTH`, `WFRSTATUS`, `JPOSITION`, `JDEPARTMENT`, `EmployeeId`, `JSALARYGRADE`, `JSALARYPERMNTH`, `Datetime`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        l1 = A5.getValue();
        l2 = A21.getValue();
        l3 = A31.getValue();
        l4 = A33.getValue();
        l5 = A35.getValue();
        l6 = A37.getValue();
        l7 = A39.getValue();
        l8 = A42.getValue();
        l9 = A43.getValue();
        l10 = A44.getValue();
        l11 = A47.getValue();
        l12 = A48.getValue();
        l13 = A49.getValue();
        l14 = A52.getValue();
        l15 = A53.getValue();
        l16 = A54.getValue();
        l17 = A58.getValue();
        l18 = A59.getValue();
        l19 = A65.getValue();
        l20 = A66.getValue();
        l21 = A72.getValue();
        l22 = A73.getValue();
        l23 = A79.getValue();
        l24 = A80.getValue();               
        String tit = A1.getValue();
        String fname = A2.getText();
        String lName = A3.getText();
        String Mname = A4.getText();
        String dateofbith = l1.toString();
        String placeofbirth = A6.getText();
        String gender = A7.getValue();
        String Status = A8.getValue();
        String postaladd = A9.getText();
        String zipcode = A10.getText();
        String citizensp = A11.getText();
        int Telephon = Integer.parseInt(A12.getText());
        int Mobil = Integer.parseInt(A13.getText());
        int Heigth = Integer.parseInt(A15.getText());
        int Weigt = Integer.parseInt(A16.getText());
        String email = A14.getText();
        int Socialacrty = Integer.parseInt(A17.getText());
        String sFirstnam = A18.getText();
        String slastn = A19.getText();
        String Sothnmes = A20.getText();
        String Soccupaio = A22.getText();
        String Sbateofbi = l2.toString();
        String Stelephone = A23.getText();
        String Ffirstna = A24.getText();
        String Flastn = A25.getText();
        String Fothnae = A26.getText();
        String Mfirstna = A27.getText();
        String Mlastn = A28.getText();
        String Mothnae = A29.getText();
        String c1fulname = A30.getText();
        String CIbith = l3.toString();
        String c2fulname = A32.getText();
        String C2bith = l4.toString();
        String c3fulname = A34.getText();
        String C3bith = l5.toString();
        String c4fulname = A36.getText();
        String C4bith = l6.toString();
        String c5fulname = A38.getText();
        String C5bith = l7.toString();
        String Enameofksul = A40.getText();
        String Ecourse = A41.getText();
        String Eattendfrm = l8.toString();
        String Eattento = l9.toString();
        String EgraDate = l10.toString();
        String Snameofksul = A45.getText();
        String Scourse = A46.getValue();
        String Sattendfrm = l11.toString();
        String Sattento = l12.toString();
        String SgraDate = l13.toString();
        String Tnameofksul = A50.getText();
        String Tcourse = A51.getText();
        String Tattendfrm = l14.toString();
        String Tattento = l15.toString();
        String TgraDate = l16.toString();
        String W1compy = A55.getText();
        String W1pos = A56.getText();
        String W1dep = A57.getText();
        String W1inFrm = l17.toString();
        String W1inTo = l18.toString();
        String w1status = A60.getText();
        String w1Salary = A61.getText();
        String w2compy = A62.getText();
        String W2pos = A63.getText();
        String W2dep = A64.getText();
        String W2inFrm = l19.toString();
        String W2inTo = l20.toString();
        String w2status = A67.getText();
        String w2Salary = A68.getText();
        String w3compy = A69.getText();
        String W3pos = A70.getText();
        String W3dep = A71.getText();
        String W3inFrm = l21.toString();
        String W3inTo = l22.toString();
        String w3status = A74.getText();
        String w3Salary = A75.getText();
        String w4compy = A76.getText();
        String W4pos = A77.getText();
        String W4dep = A78.getText();
        String W4inFrm = l23.toString();
        String W4inTo = l24.toString();
        String w4status = A81.getText();
        String w4Salary = A82.getText();
        String Jposition = A83.getText();
        String Jdepartmnt = A84.getValue();
        String JemployID = employeID;
        String Jgrda = A87.getValue();
        String Jsalary = A88.getText();
        try {
            pr = conn.prepareStatement(sql);
            pr.setString(1, tit);
            pr.setString(2, fname);
            pr.setString(3, lName);
            pr.setString(4, Mname);
            pr.setString(5, dateofbith);
            pr.setString(6, placeofbirth);
            pr.setString(7, gender);
            pr.setString(8, Status);
            pr.setString(9, postaladd);
            pr.setString(10, zipcode);
            pr.setString(11, citizensp);
            pr.setInt(12, Telephon);
            pr.setInt(13, Mobil);
            pr.setInt(14, Heigth);
            pr.setInt(15, Weigt);
            pr.setString(16, email);
            pr.setInt(17, Socialacrty);
             pr.setString(18, sFirstnam);
             pr.setString(19, slastn);
             pr.setString(20, Sothnmes);
             pr.setString(21, Soccupaio);
             pr.setString(22, Sbateofbi);
             pr.setString(23, Stelephone);
           pr.setString(24, Ffirstna);
           pr.setString(25, Flastn);
           pr.setString(26, Fothnae);
           pr.setString(27, Mfirstna);
           pr.setString(28, Mlastn);
           pr.setString(29, Mothnae);
           pr.setString(30, c1fulname);
           pr.setString(31, CIbith);
           pr.setString(32, c2fulname);
           pr.setString(33, C2bith);
           pr.setString(34, c3fulname);
           pr.setString(35, C3bith);
           pr.setString(36, c4fulname);
           pr.setString(37, C4bith);
           pr.setString(38, c5fulname);
           pr.setString(39, C5bith);
           pr.setString(40, Enameofksul);
           pr.setString(41, Ecourse);
           pr.setString(42, Eattendfrm);
           pr.setString(43, Eattento);
           pr.setString(44, EgraDate);
           pr.setString(45, Snameofksul);
           pr.setString(46, Scourse);
           pr.setString(47, Sattendfrm);
           pr.setString(48, Sattento);
           pr.setString(49, SgraDate);
           pr.setString(50, Tnameofksul);
           pr.setString(51, Tcourse);
           pr.setString(52, Tattendfrm);
           pr.setString(53, Tattento);
           pr.setString(54, TgraDate);
           pr.setString(55, W1compy);
           pr.setString(56, W1pos);
           pr.setString(57, W1dep);
           pr.setString(58, W1inFrm);
           pr.setString(59, W1inTo);
           pr.setString(60, w1status);
           pr.setString(61, w1Salary);
           pr.setString(62, w2compy);
           pr.setString(63, W2pos);
           pr.setString(64, W2dep);
           pr.setString(65, W2inFrm);
           pr.setString(66, W2inTo);
           pr.setString(67, w2status);
           pr.setString(68, w2Salary);
           pr.setString(69, w3compy);
           pr.setString(70, W3pos);
           pr.setString(71, W3dep);
           pr.setString(72, W3inFrm);
           pr.setString(73, W3inTo);
           pr.setString(74, w3status);
           pr.setString(75, w3Salary);
           pr.setString(76, w4compy);
           pr.setString(77, W4pos);
           pr.setString(78, W4dep);
           pr.setString(79, W4inFrm);
           pr.setString(80, W4inTo);
           pr.setString(81, w4status);
           pr.setString(82, w4Salary);
            pr.setString(83, Jposition);
            pr.setString(84, Jdepartmnt);
           pr.setString(85, JemployID);
            pr.setString(86, Jgrda);
            pr.setString(87, Jsalary);
            int i = pr.executeUpdate();
            if(i==1){
            
                Alert alert = new Alert(AlertType.INFORMATION);
                alert.setContentText("Successfully");
                alert.setTitle("Comfirmation");
                alert.showAndWait();
            }
            else{           
                Alert alert = new Alert(AlertType.WARNING);
                alert.setContentText("Failed");
                alert.setTitle("Comfirmation");
                alert.showAndWait();
            }
        } catch (SQLException ex) {
            Logger.getLogger(AddEmployeeController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    
    private void UPDATEINFO(ActionEvent event) {
    }

    
}
