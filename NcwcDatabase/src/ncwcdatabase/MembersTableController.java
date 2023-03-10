/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.FileOutputStream;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ResourceBundle;
import java.util.function.Predicate;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.KeyEvent;
import javax.swing.JOptionPane;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MembersTableController implements Initializable {
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
     @FXML
    private Button printRrp;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        conn = Mysqlilogin.Dbconnect();
        data = FXCollections.observableArrayList();
        getcollumse();
        databaseconnect();
        
        FilteredList<members> filterdata = new FilteredList<>(data, e-> true);
        saerchFiltersd.setOnKeyReleased(e ->{
          saerchFiltersd.textProperty().addListener((observableValue, oldValue, newValue) ->{
      
              filterdata.setPredicate((Predicate<? super members>) member->{ 
                  if(newValue == null || newValue.isEmpty()){
                  
                      return true;
                  }
                  String LowercaseFilter = newValue.toLowerCase();
                  if(member.getFirstname().toLowerCase().contains(LowercaseFilter)){
                     return true;
                  }
                  else if(member.getOthernames().toLowerCase().contains(LowercaseFilter)){
                     return true;
                  }
                  else if(member.getTitheId().contains(newValue)){
                   return true;
                  }
                  else if(member.getCardid().contains(newValue)){
                   return true;
                  }
                  return false;
              });
          });
          SortedList<members> sortedadata = new SortedList<>(filterdata);
          sortedadata.comparatorProperty().bind(table.comparatorProperty());
          table.setItems(sortedadata);
        });
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
      private void databaseconnect(){
    conn = Mysqlilogin.Dbconnect();
    String sql = "select * from formreg";
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
 @FXML
 private void PrintTable(ActionEvent event){
    
      conn = Mysqlilogin.Dbconnect();
        String sql = "select * from formreg";
          try{
          st = conn.prepareStatement(sql);
          rst = st.executeQuery();
          XSSFWorkbook wb = new XSSFWorkbook();
          XSSFSheet sheet = wb.createSheet();
          XSSFRow header = sheet.createRow(0);
          header.createCell(0).setCellValue("ID");
          header.createCell(1).setCellValue("CARDID");
          header.createCell(2).setCellValue("TITHEID");
          header.createCell(3).setCellValue("FIRSTNAME");
          header.createCell(4).setCellValue("OTHERNAMES");
          header.createCell(5).setCellValue("RESIDENT"); 
          header.createCell(6).setCellValue("AGE");
          header.createCell(7).setCellValue("MARITAL STATUS");
          header.createCell(8).setCellValue("OCUPATIOM");
          header.createCell(9).setCellValue("NAME OF SPOUSE");
          header.createCell(10).setCellValue("NUMBER OF CHILDREN");
          header.createCell(11).setCellValue("NATIONALITY");
          header.createCell(12).setCellValue("HOMETOWN");
          header.createCell(13).setCellValue("DATE OF BAPTISM"); 
          header.createCell(14).setCellValue("ADDRESS");
          header.createCell(15).setCellValue("TELEPHONE NUMBER"); 
          header.createCell(16).setCellValue("HOUSE NUMBER");
          header.createCell(17).setCellValue("NAME OF FORMER CHURCH");
          header.createCell(18).setCellValue("POSITION IN CHURCH"); 
          header.createCell(19).setCellValue("DATE & TIME");
          int index = 1;
          while(rst.next()){
          XSSFRow Row = sheet.createRow(index);
          Row.createCell(0).setCellValue(rst.getString("ID"));
          Row.createCell(1).setCellValue(rst.getString("Cardid"));  
          Row.createCell(2).setCellValue(rst.getString("TitheId"));
          Row.createCell(3).setCellValue(rst.getString("Firstname"));   
          Row.createCell(4).setCellValue(rst.getString("Othernames")); 
          Row.createCell(5).setCellValue(rst.getString("Resident"));
          Row.createCell(6).setCellValue(rst.getString("Age"));
          Row.createCell(7).setCellValue(rst.getString("M_Status"));
          Row.createCell(8).setCellValue(rst.getString("Occupation"));
          Row.createCell(9).setCellValue(rst.getString("nameofspouse"));
          Row.createCell(10).setCellValue(rst.getString("noofchildren"));   
          Row.createCell(11).setCellValue(rst.getString("nationality"));   
          Row.createCell(12).setCellValue(rst.getString("hometown"));   
          Row.createCell(13).setCellValue(rst.getString("dateofbaptism"));   
          Row.createCell(14).setCellValue(rst.getString("address"));   
          Row.createCell(15).setCellValue(rst.getString("Telno"));   
          Row.createCell(16).setCellValue(rst.getString("Houseno"));   
          Row.createCell(17).setCellValue(rst.getString("nameoffchrch")); 
          Row.createCell(18).setCellValue(rst.getString("posinchrch"));   
          Row.createCell(19).setCellValue(rst.getString("Date"));    
          index++;     
          sheet.autoSizeColumn(3);
          sheet.autoSizeColumn(4);
          sheet.autoSizeColumn(5);
          sheet.autoSizeColumn(6);
          sheet.autoSizeColumn(7);
          sheet.autoSizeColumn(8);
          sheet.autoSizeColumn(9);
          sheet.autoSizeColumn(10);
          sheet.autoSizeColumn(11);
          sheet.autoSizeColumn(12);
          sheet.autoSizeColumn(13);
          sheet.autoSizeColumn(14);
          sheet.autoSizeColumn(15);
          sheet.autoSizeColumn(16);
          sheet.autoSizeColumn(17);
          sheet.autoSizeColumn(18);
          sheet.autoSizeColumn(19);
    }
          FileOutputStream fileout = new FileOutputStream("Members.xlsx");
          wb.write(fileout);
          JOptionPane.showMessageDialog(null, "Details Exported Successfully");
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
 }

   
}
