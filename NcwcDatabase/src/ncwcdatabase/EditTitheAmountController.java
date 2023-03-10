/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class EditTitheAmountController implements Initializable {
    @FXML
    private TextField cardid;
    @FXML
    private TextField amount;
    @FXML
    private Button change,cls;
    @FXML
    private TextField Qid;
    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void EditTithe(ActionEvent event) throws SQLException {
        if(amount.getText().isEmpty()){
             JOptionPane.showMessageDialog(null, "Amount Cant be Empty");    
        }
        else if(Qid.getText().isEmpty()){
             JOptionPane.showMessageDialog(null, "Quert ID Cant be Empty");
        }
        else if(cardid.getText().isEmpty()){
             JOptionPane.showMessageDialog(null, "Quert ID Cant be Empty");
        }
        else{
         conn = Mysqlilogin.Dbconnect();
         String sql = "UPDATE tithe set AMOUNT = '"+amount.getText()+"' where ID = '"+Qid.getText()+"' and CARDID = '"+cardid.getText()+"'" ;
         stmt = conn.createStatement();
         stmt.executeLargeUpdate(sql);
         JOptionPane.showMessageDialog(null, "Details inserted into database successfully");
         ClearData(); 
        }       
         }
     
    private void ClearData(){
    amount.clear();
    Qid.clear();
    cardid.clear();
    }
    @FXML
    private void ClearDataS(ActionEvent event){
    amount.clear();
    Qid.clear();
    cardid.clear();
    }
}
