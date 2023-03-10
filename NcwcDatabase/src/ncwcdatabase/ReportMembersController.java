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
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javax.swing.JOptionPane;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class ReportMembersController implements Initializable {
    @FXML
    private Button report;
    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    ResultSet rst = null;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void printReport(ActionEvent event) {
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
