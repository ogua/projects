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
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class SearchEmployeeController implements Initializable {
    @FXML
    private TextField searchId;
    @FXML
    private TableView<Employee> table;
    @FXML
    private TableColumn<Employee, String> E1;
    @FXML
    private TableColumn<Employee, String> E2;
    @FXML
    private TableColumn<Employee, String> E3;
    @FXML
    private TableColumn<Employee, String> E4;
    @FXML
    private TableColumn<Employee, String> E5;
    @FXML
    private TableColumn<Employee, String> E6;
    @FXML
    private TableColumn<Employee, String> E7;
    @FXML
    private TableColumn<Employee, String> E8;
    @FXML
    private TableColumn<Employee, String> E9;
    ObservableList<Employee>data;
    @FXML
    private Button back;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        data = FXCollections.observableArrayList();
        databaseconnect();
        getcollumse();
        
        
        FilteredList<Employee> filterdata = new FilteredList<>(data, e-> true);
             searchId.setOnKeyReleased(e ->{
             searchId.textProperty().addListener((observableValue, oldValue, newValue) ->{
      
              filterdata.setPredicate((Predicate<? super Employee>) prod->{ 
                  if(newValue == null || newValue.isEmpty()){
                  
                      return true;
                  }
                  String LowercaseFilter = newValue.toLowerCase();
                  if(prod.getId().toLowerCase().contains(newValue)){
                     return true;
                  }
                  if(prod.getFname().toLowerCase().contains(newValue)){
                     return true;
                  }
                   if(prod.getLname().toLowerCase().contains(newValue)){
                     return true;
                  }
                  return false;
              });
          });
          SortedList<Employee> sortedadata = new SortedList<>(filterdata);
          sortedadata.comparatorProperty().bind(table.comparatorProperty());
          table.setItems(sortedadata);
        });
             
    }    

    @FXML
    private void SearchID(ActionEvent event) {
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
    
     private void databaseconnect(){  
     conn = MysqliConnect.Dbconnect();
     String sql = "SELECT * FROM employees";
     try{
    pr = conn.prepareStatement(sql);
    rs = pr.executeQuery();
    while(rs.next()){
      data.add(new Employee(rs.getString("EmployeeId"),rs.getString("Firstname"),rs.getString("MiddleName"),rs.getString("othernames"),rs.getInt("SSSNO"),rs.getString("JPOSITION"),rs.getString("JDEPARTMENT"),rs.getString("JSALARYGRADE"),rs.getFloat("JSALARYPERMNTH"))); 
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    }
    
    
    private void getcollumse(){
         E1.setCellValueFactory(new PropertyValueFactory<>("id"));
         E2.setCellValueFactory(new PropertyValueFactory<>("Fname"));
         E3.setCellValueFactory(new PropertyValueFactory<>("Lname"));
         E4.setCellValueFactory(new PropertyValueFactory<>("Oname"));
         E5.setCellValueFactory(new PropertyValueFactory<>("Soss"));
         E6.setCellValueFactory(new PropertyValueFactory<>("pos"));
         E7.setCellValueFactory(new PropertyValueFactory<>("dep"));
         E8.setCellValueFactory(new PropertyValueFactory<>("Grad"));
         E9.setCellValueFactory(new PropertyValueFactory<>("salary"));
          }
}
