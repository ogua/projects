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
import javafx.scene.control.Button;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class DepartmntLogController implements Initializable {
    @FXML
    private ListView<String> List;
    ObservableList<String>data;
    @FXML
    private Button BACK;
    @FXML
    private TextField d1;
    @FXML
    private TextField d2;
    @FXML
    private TextField d3;
    @FXML
    private TextField d4;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    @FXML
    private TextField d14;
    @FXML
    private TextField d5;
    @FXML
    private TextField d6;
    @FXML
    private TextField d7;
    @FXML
    private TextField d8;
    @FXML
    private TextField d9;
    @FXML
    private TextField d10;
    @FXML
    private TextField d11;
    @FXML
    private TextField d12;
    @FXML
    private TextField d13;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
      getd1();getd2();getd3();getd4();getd5();getd6();getd7();getd8();getd9();getd10();getd11();getd12();getd13();getd14();
    }    

    @FXML
    private void GOBACK(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("MainProgramme.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("ADD EMPLOYEE");
        stage.show();
    }
    private void getd1(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'ACCOUNTING DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d1.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd2(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'HUMAN RESOURCE DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d2.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
      private void getd3(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'INFORMATION TECHNOLOGY DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d3.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
      
       private void getd4(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'PROCUREMENT MANAGEMENT DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d4.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd5(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'PUBLIC HEALTH DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d5.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd6(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'TOURISM DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d6.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd7(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'ENGINEERING DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d7.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd8(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'TRANSPORTATION DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d8.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd9(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'TREASURY DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d9.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd10(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'BUDJET DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d10.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd11(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'LEGAL DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d11.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd12(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'LAW ENFORCEMENT DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d12.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd13(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees WHERE `JDEPARTMENT` = 'PUBLIC RELATIONS DEPARTMENT'";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d13.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     private void getd14(){
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT COUNT(`JDEPARTMENT`) FROM employees";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
             String num1 = rs.getString("COUNT(`JDEPARTMENT`)");
             d14.setText(num1);
            }
        } catch (SQLException ex) {
            Logger.getLogger(DepartmntLogController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
