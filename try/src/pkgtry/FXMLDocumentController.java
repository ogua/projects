/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pkgtry;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import net.sf.jasperreports.view.*;
import net.sf.jasperreports.engine.*;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable{
    Connection conn;
    PreparedStatement prd = null;
    ResultSet rst = null;
    
    @FXML
    private Label label;
    
    @FXML
    private void handleButtonAction(ActionEvent event) {
         conn = MysqliLogin.Dbconnect();   
       try{
           String REPORT = "C:\\Users\\ogua\\Documents\\NetBeansProjects\\try\\src\\pkgtry\\thithe.jrxml";
           JasperReport jr = JasperCompileManager.compileReport(REPORT);
           JasperPrint jp  = JasperFillManager.fillReport(jr, null, conn);
           JRViewer viewer = new JRViewer(jp);
           viewer.setVisible(true);
           viewer.setOpaque(true);
       }catch(JRException e){
       
       }
    }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
}
