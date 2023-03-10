/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package mmmm;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML
    private Label label;
    
     @FXML
    private Connection conn = null;
    private PreparedStatement stmt = null;
    private ResultSet rs = null;
    
     @FXML
    private TextField user;
     
     
     @FXML
    private TextField firstname;
     
      @FXML
    private TextField othername;
      
       @FXML
    private TextField month;
             
      @FXML
    private Button display;
    
        @FXML
    private TableView<Tithes> table;
       
       @FXML
    private TableColumn<?,?> id,a1,a2,a3,a4,a5,a6,a7;
    
     @FXML
    private ObservableList data;
    
    @FXML
    private void ExitWindow(ActionEvent event){
     System.exit(0);   
    }
     @FXML
    private void GonectTable(ActionEvent event) throws IOException{
       Stage stage = new Stage();
       FXMLLoader loader = new FXMLLoader();
     Pane root = loader.load(getClass().getResource("FXMLtable.fxml").openStream());
        
        Scene scene = new Scene(root);
        
        stage.setScene(scene);
        stage.show();  
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        conn = sqliconnect.dbconnect();
        collumse();
        data = FXCollections.observableArrayList();
        databaseconnect();
    }    
    private void collumse(){
     id.setCellValueFactory(new PropertyValueFactory<>("id"));
     a1.setCellValueFactory(new PropertyValueFactory<>("cardid"));
     a2.setCellValueFactory(new PropertyValueFactory<>("firstname"));
     a3.setCellValueFactory(new PropertyValueFactory<>("otherNames"));
     a4.setCellValueFactory(new PropertyValueFactory<>("mon"));
     a5.setCellValueFactory(new PropertyValueFactory<>("amount"));
     a6.setCellValueFactory(new PropertyValueFactory<>("year"));
     a7.setCellValueFactory(new PropertyValueFactory<>("date"));
    
    }
    
    private void databaseconnect(){
    String sql = "select * from tithe";
    try{
    stmt = conn.prepareStatement(sql);
    rs = stmt.executeQuery();
    while(rs.next()){
      data.add(new Tithes(rs.getInt(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getString(5),rs.getString(6),rs.getString(7),rs.getDate(8)));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
}
