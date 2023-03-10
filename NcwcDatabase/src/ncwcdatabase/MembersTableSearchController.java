/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MembersTableSearchController implements Initializable {
 @FXML
    private TableColumn<members,String> A1;
    @FXML
    private TableColumn<members,String> A2;
    @FXML
    private TableColumn<members,String> A3;
    @FXML
    private TableColumn<members,String> A4;
    @FXML
    private TableColumn<members,String> A5;
    @FXML
    private TableColumn<members,String> A6;
    @FXML
    private TableColumn<members,String> A7;
    @FXML
    private TableColumn<members,String> A8;
    @FXML
    private TableColumn<members,String> A9;
    @FXML
    private TableColumn<members,String> A10;
    @FXML
    private TableColumn<members,String> A11;
    @FXML
    private TableColumn<members,String> A12;
    @FXML
    private TableColumn<members,String> A13;
    @FXML
    private TableColumn<members,String> A14;
    @FXML
    private TableColumn<members,String> A15;
    @FXML
    private TableColumn<members,String> A16;
    @FXML
    private TableColumn<members,String> A17;
    @FXML
    private TableColumn<members,String> A18;
    @FXML
    private TableColumn<members,String> A19;
    @FXML
    private TableColumn<members,String> A20;
    @FXML
    private TableColumn<members,String> A21;
    @FXML
    private TableView<members> table;
   private ObservableList<members> data;
    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    ResultSet rst = null;
    @FXML
    private TextField saerchFiltersd;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
         data = FXCollections.observableArrayList();
        getcollumse();
    }    
     private void getcollumse(){
     A1.setCellValueFactory(new PropertyValueFactory<>("id"));
     A2.setCellValueFactory(new PropertyValueFactory<>("firstname"));
     A3.setCellValueFactory(new PropertyValueFactory<>("othernames")); 
     A4.setCellValueFactory(new PropertyValueFactory<>("resident"));
     A5.setCellValueFactory(new PropertyValueFactory<>("age"));
     A6.setCellValueFactory(new PropertyValueFactory<>("mStatus"));
     A7.setCellValueFactory(new PropertyValueFactory<>("occupation"));
     A8.setCellValueFactory(new PropertyValueFactory<>("nameofspouse"));
     A9.setCellValueFactory(new PropertyValueFactory<>("noofchildren"));
     A10.setCellValueFactory(new PropertyValueFactory<>("nationality"));
     A11.setCellValueFactory(new PropertyValueFactory<>("hometown"));
     A12.setCellValueFactory(new PropertyValueFactory<>("dateofbaptism"));
     A13.setCellValueFactory(new PropertyValueFactory<>("address"));
     A14.setCellValueFactory(new PropertyValueFactory<>("telno"));
     A15.setCellValueFactory(new PropertyValueFactory<>("houseno"));
     A16.setCellValueFactory(new PropertyValueFactory<>("nameoffchrch"));
     A17.setCellValueFactory(new PropertyValueFactory<>("posinchrch"));
     A18.setCellValueFactory(new PropertyValueFactory<>("cardid"));
     A19.setCellValueFactory(new PropertyValueFactory<>("titheId"));
     A20.setCellValueFactory(new PropertyValueFactory<>("image"));
     A21.setCellValueFactory(new PropertyValueFactory<>("date"));
    }
      @FXML
 private void searchTable(ActionEvent event){
    conn = Mysqlilogin.Dbconnect();
    String sql = "select * from formreg where Firstname LIKE '%"+saerchFiltersd.getText()+"%' UNION select * from formreg where Othernames LIKE '%"+saerchFiltersd.getText()+"%'";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    while(rst.next()){
      data.add(new members(rst.getInt(1),rst.getString(2),rst.getString(3),rst.getString(4),rst.getString(5),rst.getString(6),rst.getString(7),rst.getString(8),rst.getString(9),rst.getString(10),rst.getString(11),rst.getString(12),rst.getString(13),rst.getString(14),rst.getString(15),rst.getString(16),rst.getString(17),rst.getString(18),rst.getString(19),rst.getBytes(20),rst.getString(21)));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
 }
}
