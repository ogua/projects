/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.HashMap;
import java.util.Map;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.print.PrinterJob;
import javafx.scene.Node;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.stage.Window;
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

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class ViewParticularMemberController implements Initializable {
      @FXML
    private VBox vbox;
      @FXML
    private Button searchid;
    @FXML
    private ImageView imageview;
    @FXML
    private GridPane ADD;
    @FXML
    private TextField a1;
    @FXML
    private TextField a3;
    @FXML
    private TextField a4;
    @FXML
    private TextField a5;
    @FXML
    private TextField a2;
    @FXML
    private TextField a7;
    @FXML
    private TextField a9;
    @FXML
    private TextField a11;
    @FXML
    private TextField a12;
    @FXML
    private TextField a10;
    @FXML
    private TextField a13;
    @FXML
    private TextField a15;
    @FXML
    private TextField a16;
    @FXML
    private TextField a14;
    @FXML
    private TextField a6,a18,a19;
    @FXML
    private TextField a8,a21;
    @FXML
    private TextField identer;
    private Image image;
    Connection conn = null;
    Statement stmt = null;
    ResultSet rst = null;
    PreparedStatement pre = null;
    PreparedStatement prep = null ;
    private FileInputStream fils;
    @FXML
    private VBox mainpane;
    @FXML
    private Button ReporTPrint;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
     @FXML
    private void HANDLESELECT(ActionEvent event) throws FileNotFoundException, IOException {
      if(identer.getText().isEmpty()){
      JOptionPane.showMessageDialog(null, "Please enter the cardid or titheid to validate Query");
      }else{
      conn = Mysqlilogin.Dbconnect();
    try{
    pre = conn.prepareStatement ("SELECT * FROM `formreg` WHERE Cardid = ? UNION SELECT * FROM formreg WHERE TitheId = ?");
    pre.setString(1, identer.getText());
    pre.setString(2, identer.getText());
    rst = pre.executeQuery();
    while(rst.next()){
    JOptionPane.showMessageDialog(null, "Connection successfully");
    a1.setText(rst.getString("Firstname"));
    a2.setText(rst.getString("Othernames"));
    a4.setText(rst.getString("Age"));
    a5.setText(rst.getString("Resident"));
    a6.setText(rst.getString("M_Status"));
    a3.setText(rst.getString("Occupation"));
    a7.setText(rst.getString("nameofspouse"));
    a8.setText(rst.getString("noofchildren"));
    a9.setText(rst.getString("nationality"));
    a10.setText(rst.getString("hometown"));
    a11.setText(rst.getString("dateofbaptism"));
    a12.setText(rst.getString("address"));
    a13.setText(rst.getString("Telno"));
    a14.setText(rst.getString("Houseno"));
    a15.setText(rst.getString("nameoffchrch"));
    a16.setText(rst.getString("posinchrch"));
    a18.setText(rst.getString("Cardid"));
    a19.setText(rst.getString("TitheId")); 
    a21.setText(rst.getString("Date"));
     try (InputStream is = rst.getBinaryStream("Image"); OutputStream os = new FileOutputStream(new File("memberpic.jpg"))) {
         byte[] content = new byte[1024];
         int size = 0;
         while((size = is.read(content)) != -1){
         os.write(content, 0, size);
            }
        }
     image = new Image("file:memberpic.jpg");
     imageview.setImage(image);
    }  
     rst.close();
     pre.close();
    }catch(SQLException e){
      JOptionPane.showMessageDialog(null, "Failed to load data");
    }
      }
    
    }
    private void printReport(ActionEvent event){
       //String report = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\fetchTable\\src\\fetchtable\\report1.jrxml";
        //JasperDesign jd = JRXmlLoader.load("C:\\Users\\ogua\\Documents\\NetBeansProjects\\NcwcDatabase\\src\\ncwcdatabase\\\\Member.jrxml");
        //String sql = "SELECT * FROM `formreg` WHERE Cardid = '"+identer.getText()+"' UNION SELECT * FROM formreg WHERE TitheId = '"+identer.getText()+"'";
       //JRDesignQuery newQuery = new JRDesignQuery();
        //newQuery.setText(sql);
        //jd.setQuery(newQuery);
        //JasperReport jr = JasperCompileManager.compileReport(jd);
        //JasperPrint jp = JasperFillManager.fillReport(jr, null, conn);
        //JasperViewer.viewReport(jp);
    
    }
    private void printJobs(ActionEvent event) {
        Stage stage = new Stage();
         printSetup(mainpane, stage);
    }
    private void printSetup(Node node, Stage owner) 
	{
		// Create the PrinterJob		
		PrinterJob job = PrinterJob.createPrinterJob();
	
		if (job == null) 
		{
			return;
		}

		// Show the print setup dialog
		boolean proceed = job.showPrintDialog(owner);
		
		if (proceed) 
		{
			print(job, node);
		}
	}
	
	private void print(PrinterJob job, Node node) 
	{
		// Print the node
		boolean printed = job.printPage(node);
	
		if (printed) 
		{
			job.endJob();
		}
	}	

    @FXML
    private void PrintReports(ActionEvent event) throws JRException{
         
              //String report = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\fetchTable\\src\\fetchtable\\report1.jrxml";
              JasperDesign jd = JRXmlLoader.load("C:\\Users\\ogua\\Documents\\NetBeansProjects\\NcwcDatabase\\src\\ncwcdatabase\\member1.jrxml");
              String sql = "SELECT * FROM `formreg` WHERE Cardid = '"+identer.getText()+"' UNION SELECT * FROM formreg WHERE TitheId = '"+identer.getText()+"'";
              JRDesignQuery newQuery = new JRDesignQuery();
              newQuery.setText(sql);
              jd.setQuery(newQuery);
              JasperReport jr = JasperCompileManager.compileReport(jd);
              JasperPrint jp = JasperFillManager.fillReport(jr, null, conn);
              JasperViewer.viewReport(jp,false);     
        
    }
}
