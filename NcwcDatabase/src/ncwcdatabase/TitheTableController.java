/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.FileOutputStream;
import java.net.URL;
import java.sql.Connection;
import java.sql.Date;
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
import javafx.scene.input.MouseEvent;
import javax.swing.JOptionPane;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class TitheTableController implements Initializable {
    @FXML
 private TableView<Tithe> table;

@FXML
   private TableColumn<Tithe,String> c1;
@FXML
   private TableColumn<Tithe,String> c2;
@FXML
   private TableColumn<Tithe,String> c3;
@FXML
   private TableColumn<Tithe,String> c4;
@FXML
   private TableColumn<Tithe,String> c5;
@FXML
   private TableColumn<Tithe,String> c6;
@FXML
   private TableColumn<Tithe,String> c7;
@FXML
   private TableColumn<Tithe,String> c8;
   private ObservableList<Tithe> data;
  @FXML
    private Button printRrp;

    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    ResultSet rst = null;
    @FXML
    private TextField C11;
    @FXML
    private TextField CS1;
    @FXML
    private TextField C21;
    @FXML
    private TextField C61;
    @FXML
    private TextField C31;
    @FXML
    private TextField C71;
    @FXML
    private TextField C41;
    @FXML
    private TextField C81;
    @FXML
    private TextField serachTithe;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       conn = Mysqlilogin.Dbconnect();
        data = FXCollections.observableArrayList();
        getcollumse();
        databaseconnect();
        
         FilteredList<Tithe> filterdata = new FilteredList<>(data, e-> true);
         serachTithe.setOnKeyReleased(e ->{
          serachTithe.textProperty().addListener((observableValue, oldValue, newValue) ->{
      
              filterdata.setPredicate((Predicate<? super Tithe>) tithes->{ 
                  if(newValue == null || newValue.isEmpty()){
                  
                      return true;
                  }
                  String LowercaseFilter = newValue.toLowerCase();
                  if(tithes.getFirstname().toLowerCase().contains(LowercaseFilter)){
                     return true;
                  }
                  else if(tithes.getOtherNames().toLowerCase().contains(LowercaseFilter)){
                     return true;
                  }
                  else if(tithes.getCardid().contains(newValue)){
                   return true;
                  }
                  return false;
              });
          });
          SortedList<Tithe> sortedadata = new SortedList<>(filterdata);
          sortedadata.comparatorProperty().bind(table.comparatorProperty());
          table.setItems(sortedadata);
        });
    }    
     private void getcollumse(){
     c1.setCellValueFactory(new PropertyValueFactory<>("id"));
     c2.setCellValueFactory(new PropertyValueFactory<>("cardid"));
     c3.setCellValueFactory(new PropertyValueFactory<>("firstname")); 
     c4.setCellValueFactory(new PropertyValueFactory<>("otherNames"));
     c5.setCellValueFactory(new PropertyValueFactory<>("mon"));
     c6.setCellValueFactory(new PropertyValueFactory<>("amount"));
     c7.setCellValueFactory(new PropertyValueFactory<>("year"));
     c8.setCellValueFactory(new PropertyValueFactory<>("date"));

    }
    private void databaseconnect(){
    conn = Mysqlilogin.Dbconnect();
    String sql = "select * from tithe";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    while(rst.next()){
      data.add(new Tithe(rst.getInt(1),rst.getString(2),rst.getString(3),rst.getString(4),rst.getString(5),rst.getString(6),rst.getString(7),rst.getString(8)));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
    
    @FXML
    private void getdatafromtabele(MouseEvent event){
        Tithe getit = table.getItems().get(table.getSelectionModel().getSelectedIndex());
        C11.setText(String.valueOf(getit.getId()));
        C21.setText(getit.getCardid());
        C31.setText(getit.getFirstname());
        C41.setText(getit.getOtherNames());
        CS1.setText(getit.getMon());
        C61.setText(getit.getAmount());
        C71.setText(getit.getYear());
        C81.setText(getit.getDate());
    }
     @FXML
 private void PrintTable(ActionEvent event){
    conn = Mysqlilogin.Dbconnect();
        String sql = "select * from tithe order by id desc";
          try{
          st = conn.prepareStatement(sql);
          rst = st.executeQuery();
          XSSFWorkbook wb = new XSSFWorkbook();
          XSSFSheet sheet = wb.createSheet();
          XSSFRow header = sheet.createRow(0);
          header.createCell(0).setCellValue("ID");
          header.createCell(1).setCellValue("CARDID");
          header.createCell(2).setCellValue("FIRSTNAME");
          header.createCell(3).setCellValue("OTHERNAMES");
          header.createCell(4).setCellValue("MONTH");
          header.createCell(5).setCellValue("AMOUNT"); 
          header.createCell(6).setCellValue("YEAR");
          header.createCell(7).setCellValue("DATE & TIME"); 
          int index = 1;
          while(rst.next()){
          XSSFRow Row = sheet.createRow(index);
          Row.createCell(0).setCellValue(rst.getString("ID"));
          Row.createCell(1).setCellValue(rst.getString("CARDID"));  
          Row.createCell(2).setCellValue(rst.getString("FIRSTNAME"));
          Row.createCell(3).setCellValue(rst.getString("OTHER_NAMES"));
          Row.createCell(4).setCellValue(rst.getString("MON"));
          Row.createCell(5).setCellValue(rst.getString("AMOUNT"));
          Row.createCell(6).setCellValue(rst.getString("YEAR"));
          Row.createCell(7).setCellValue(rst.getString("DATE"));
          index++;  
          sheet.autoSizeColumn(2);
           sheet.autoSizeColumn(3);
            sheet.autoSizeColumn(4);
             sheet.autoSizeColumn(5);
              sheet.autoSizeColumn(6);
               sheet.autoSizeColumn(7);
    }
          FileOutputStream fileout = new FileOutputStream("tithereport.xlsx");
          wb.write(fileout);
          JOptionPane.showMessageDialog(null, "Details Exported Successfully");
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
 }
}
