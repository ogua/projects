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
public class PrintReportController implements Initializable {
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
