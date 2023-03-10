/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.File;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javax.swing.JOptionPane;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperCompileManager;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.design.JRDesignQuery;
import net.sf.jasperreports.engine.design.JasperDesign;
import net.sf.jasperreports.engine.xml.JRXmlLoader;
import net.sf.jasperreports.view.JasperViewer;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class ViewParticularTitheController implements Initializable {
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
    @FXML
    private TextField IDsearch;
    @FXML
    private Button search;
    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    ResultSet rst = null;
    private ObservableList<Tithe> data;
    @FXML
    private TextField c21;
    @FXML
    private TextField c31;
    @FXML
    private TextField c11;
    @FXML
    private TextField c51;
    @FXML
    private TextField c61;
    @FXML
    private TextField c71;
    @FXML
    private TextField c41;
    @FXML
    private TextField c81;
    @FXML
    private ImageView imageviews;
    private Image image;
    @FXML
    private Button PrintPReports;
    @FXML
    private Button DELECT;
    @FXML
    private Button reportJasper;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        conn = Mysqlilogin.Dbconnect();
        data = FXCollections.observableArrayList();
        getcollumse();
    }    

    @FXML
    private void searchdata(ActionEvent event) {
     if(IDsearch.getText().isEmpty()){
     
         JOptionPane.showMessageDialog(null, "Field cant be empty. please input a value to search");
     }
     else{
     
      conn = Mysqlilogin.Dbconnect();
    String sql = "SELECT tithe.ID, tithe.CARDID, tithe.FIRSTNAME, tithe.OTHER_NAMES, tithe.MON, tithe.AMOUNT, tithe.YEAR, tithe.DATE, formreg.Image FROM formreg RIGHT JOIN tithe ON tithe.CARDID = formreg.TitheId WHERE tithe.CARDID = ? ORDER BY tithe.ID DESC";
    try{
    st = conn.prepareStatement(sql);
    st.setString(1, IDsearch.getText());
    rst = st.executeQuery();
    while(rst.next()){
      data.add(new Tithe(rst.getInt(1),rst.getString(2),rst.getString(3),rst.getString(4),rst.getString(5),rst.getString(6),rst.getString(7),rst.getString(8)));
      try (InputStream is = rst.getBinaryStream("Image"); OutputStream os = new FileOutputStream(new File("TithePic.jpg"))) {
            byte[] content = new byte[1024];
            int size = 0;
            while((size = is.read(content)) != -1){
                os.write(content, 0, size);
            }
        }
     image = new Image("file:TithePic.jpg");
     imageviews.setImage(image);
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    refreshtable();
     }
    }
    
    //refresh table
     private void refreshtable(){
    data.clear();
    conn = Mysqlilogin.Dbconnect();
    String sql = "SELECT tithe.ID, tithe.CARDID, tithe.FIRSTNAME, tithe.OTHER_NAMES, tithe.MON, tithe.AMOUNT, tithe.YEAR, tithe.DATE, formreg.Image FROM tithe RIGHT JOIN formreg ON tithe.CARDID = formreg.TitheId WHERE tithe.CARDID = ? ORDER BY tithe.ID DESC";
    try{
    st = conn.prepareStatement(sql);
    st.setString(1, IDsearch.getText());
    rst = st.executeQuery();
    while(rst.next()){
      data.add(new Tithe(rst.getInt(1),rst.getString(2),rst.getString(3),rst.getString(4),rst.getString(5),rst.getString(6),rst.getString(7),rst.getString(8)));
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
        
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
       @FXML
    private void getdatafromtabele(MouseEvent event){
        Tithe getit = table.getItems().get(table.getSelectionModel().getSelectedIndex());
        c11.setText(String.valueOf(getit.getId()));
        c21.setText(getit.getCardid());
        c31.setText(getit.getFirstname());
        c41.setText(getit.getOtherNames());
        c51.setText(getit.getMon());
        c61.setText(getit.getAmount());
        c71.setText(getit.getYear());
        c81.setText(getit.getDate());
    }

    @FXML
    private void pRiintReport(ActionEvent event) {
        conn = Mysqlilogin.Dbconnect();
        String sql = "SELECT * FROM tithe WHERE CARDID = '"+IDsearch.getText()+"' ORDER BY ID DESC";
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
          FileOutputStream fileout = new FileOutputStream("ReadParticularTithe.xlsx");
          wb.write(fileout);
          JOptionPane.showMessageDialog(null, "Excel Report Created Successfully. Navigate to root dir. to view Report");
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    }

  
    @FXML
    private void DELECTQUERY(ActionEvent event) {
         Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Delect Confirmation");
        alert.setHeaderText(null);
        alert.setContentText("Are you sure you want to delect this item");
        
        Optional <ButtonType> action = alert.showAndWait();
        if(action.get() == ButtonType.OK){
         conn = Mysqlilogin.Dbconnect();
            String sql = "delete from tithe where id = ?";
            try {
                st = conn.prepareStatement(sql);
                st.setString(1, c11.getText());
                st.executeUpdate();
                refreshtable();
            } catch (SQLException ex) {
                Logger.getLogger(ViewpwelController.class.getName()).log(Level.SEVERE, null, ex);
            }
            
        }
    }

    @FXML
    private void JasperPrint(ActionEvent event) throws JRException{
         //String report = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\fetchTable\\src\\fetchtable\\report1.jrxml";
       JasperDesign jd = JRXmlLoader.load("C:\\Users\\ogua\\Documents\\NetBeansProjects\\NcwcDatabase\\src\\ncwcdatabase\\\\tithe.jrxml");
        String sql = "SELECT tithe.ID, tithe.CARDID, tithe.FIRSTNAME, tithe.OTHER_NAMES, tithe.MON, tithe.AMOUNT, tithe.YEAR, tithe.DATE, formreg.Image FROM formreg RIGHT JOIN tithe ON tithe.CARDID = formreg.TitheId WHERE tithe.CARDID = '"+IDsearch.getText()+"' ORDER BY tithe.ID DESC";
        JRDesignQuery newQuery = new JRDesignQuery();
        newQuery.setText(sql);
        jd.setQuery(newQuery);
        JasperReport jr = JasperCompileManager.compileReport(jd);
        JasperPrint jp = JasperFillManager.fillReport(jr, null, conn);
        JasperViewer.viewReport(jp,false);     
    }
}
