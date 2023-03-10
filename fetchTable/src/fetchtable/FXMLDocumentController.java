/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package fetchtable;

import java.awt.PrintJob;
import java.awt.print.PrinterException;
import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.text.MessageFormat;
import java.util.Locale;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.print.Printer;
import javafx.print.PrinterJob;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.PieChart.Data;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
import javax.swing.JOptionPane;
import net.sf.jasperreports.engine.*;
import net.sf.jasperreports.engine.design.JRDesignQuery;
import net.sf.jasperreports.engine.design.JasperDesign;
import net.sf.jasperreports.engine.xml.JRXmlLoader;
import net.sf.jasperreports.view.*;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
 @FXML
 private TableView<Tithe> table;

@FXML
   private TableColumn<Tithe,String> c1;
@FXML
   private TableColumn<Tithe,String> c2;
@FXML
   private TableColumn<Tithe,String> c3;

   private ObservableList<Tithe> data;

    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    ResultSet rst = null;
    private TextField fname;
    private TextField oname;
    private TextField resident;
    private TextField age;
    @FXML
    private TextField DId;
    @FXML
    private TextField Dcardid;
    @FXML
    private TextField Dfname;
    private PrintJob prnt;
    private Printer ptnter;
    private Button print;
    @FXML
    private PieChart piechat;
    ObservableList<Data> datas;
    Label nums;
    @FXML
    private StackPane satck;
    @FXML
    private Label num;
    @FXML
    private Button prints;
    @FXML
    private Button OPEN;
    @FXML
    private Button Report;

    private void addform(ActionEvent event){
     try{
         conn =  dalog.Dbconnect();
         String sql = "INSERT INTO cmembers (firstname,othernames,age,occupation) VALUES ('"+fname.getText()+"','"+oname.getText()+"','"+age.getText()+"','"+resident.getText()+"')";
         stmt = conn.createStatement();
         stmt.executeLargeUpdate(sql);
         JOptionPane.showMessageDialog(null, "Details inserted into database successfully");
         
         }
         catch(Exception e){
         JOptionPane.showMessageDialog(null, "Failed");
         }
    
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        conn = dalog.Dbconnect();
        data = FXCollections.observableArrayList();
        getcollumse();
        databaseconnect();
        ObservableList<Tithe> seleted , allp;
        allp = table.getItems();
        seleted = (ObservableList<Tithe>) table.getSelectionModel().getSelectedItem();
        if(seleted != null){
         DId.setText("good");
        }
        datas = FXCollections.observableArrayList(
        new PieChart.Data("Members", 300),
        new PieChart.Data("Tithe", 30),
        new PieChart.Data("Welfare", 70),
        new PieChart.Data("Pledge", 300)
        );
        piechat.setData(datas);
        connectfind();   
    }    
    
     private void getcollumse(){
     c1.setCellValueFactory(new PropertyValueFactory<>("id"));
     c2.setCellValueFactory(new PropertyValueFactory<>("cardid"));
     c3.setCellValueFactory(new PropertyValueFactory<>("firstname"));  
    }
    private void connectfind(){
    conn = dalog.Dbconnect();
    String sql = "select count(*) as num_rows from formreg";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    while(rst.next()){
     nums.setText(Integer.toString(rst.getRow()));
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    } 
    }
    private void databaseconnect(){
    conn = dalog.Dbconnect();
    String sql = "select * from tithe";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    while(rst.next()){
      data.add(new Tithe(rst.getInt(1),rst.getString(2),rst.getString(3)));
    
    }
    }catch(Exception e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    table.setItems(data);
    
    }
 @FXML
   public void NEXTSTAGE(ActionEvent event) throws IOException{
      AnchorPane pane = FXMLLoader.load(getClass().getResource("kofiadjoa.fxml"));
      satck.getChildren().setAll(pane);
   }

    @FXML
    private void getdata(MouseEvent event){
        Tithe getit = table.getItems().get(table.getSelectionModel().getSelectedIndex());
        DId.setText(String.valueOf(getit.getId()));
        Dcardid.setText(getit.getCardid());
        Dfname.setText(getit.getFirstname());
    }
    @FXML
     private void VIWE(ActionEvent event) throws IOException{
         Stage stage = new Stage();
         printSetup(table, stage);
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
    private void showDetails(MouseEvent event) {
    }

    @FXML
    private void openreport(ActionEvent event) throws JRException {
         //String report = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\fetchTable\\src\\fetchtable\\report1.jrxml";
        JasperDesign jd = JRXmlLoader.load("C:\\Users\\ogua\\Documents\\NetBeansProjects\\fetchTable\\src\\fetchtable\\report1.jrxml");
        String sql = "SELECT * FROM tithe WHERE CARDID = 273 ";
        JRDesignQuery newQuery = new JRDesignQuery();
        newQuery.setText(sql);
        jd.setQuery(newQuery);
        JasperReport jr = JasperCompileManager.compileReport(jd);
        JasperPrint jp = JasperFillManager.fillReport(jr, null, conn);
        JasperViewer.viewReport(jp);
    }
}
