/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package StockSystems;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.LocalDate;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class AddProductsController implements Initializable {
    @FXML
    private TextField cid;
    @FXML
    private TextField cname;
    @FXML
    private TextField cno;
    @FXML
    private TextField cadd;
    @FXML
    private TextField cpass;
    @FXML
    private DatePicker cdate;
    @FXML
    private Button Cadd;
    @FXML
    private Button cclear;
    Connection conn;
    PreparedStatement pr;
    ResultSet rs;
    LocalDate ld;
    @FXML
    private VBox main;
    @FXML
    private MenuItem aCash;
    @FXML
    private MenuItem Apro;
    @FXML
    private MenuItem Cdetail;
    @FXML
    private MenuItem transac;
    @FXML
    private MenuItem inven;
    @FXML
    private MenuItem UpdateS;
    @FXML
    private MenuItem sPerP;
    @FXML
    private MenuItem SperD;
    @FXML
    private Button lOut;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        GenerateID();
        // TODO
    }    

    @FXML
    private void Addd(ActionEvent event) throws SQLException {
         conn = MysqliConnect.dbConnect();
      String sql = "INSERT INTO `product`(`ProductId`, `name`, `Quantity`, `Amount`, `Desciption`, `dates`) VALUES (?,?,?,?,?,?)";
      int cashid = Integer.parseInt(cid.getText());
      String name = cname.getText();
      int number = Integer.parseInt(cno.getText());
      double addres = Double.parseDouble(cadd.getText());
      String pass = cpass.getText();
      ld = cdate.getValue();
      String ccdate = ld.toString();
      
      try {
            pr = conn.prepareStatement(sql);
            pr.setInt(1, cashid);
            pr.setString(2, name);
            pr.setInt(3, number);
            pr.setDouble(4, addres);
            pr.setString(5, pass);
            pr.setString(6, ccdate);
            int i = pr.executeUpdate();
            if(i==1){
            
                JOptionPane.showMessageDialog(null, "Successfully !");
                GenerateID();
                ClaerD();
            }
            else{
            
               JOptionPane.showMessageDialog(null, "Failed !");   
            }
        } catch (SQLException ex) {
            Logger.getLogger(MainController.class.getName()).log(Level.SEVERE, null, ex);
        }
      finally{
      pr.close();
      }
    }
    private void GenerateID(){
      conn = MysqliConnect.dbConnect();
      String sql = "SELECT MAX(ProductId) FROM product";
        try {
            pr = conn.prepareStatement(sql);
            rs = pr.executeQuery();
            if(rs.next()){
            
                String Inv = rs.getString("MAX(ProductId)");
                int invoice = Integer.parseInt(Inv);
                int invices = invoice + 1;
                cid.setText(String.valueOf(invices));
            }
        } catch (SQLException ex) {
            Logger.getLogger(BillController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

   
    @FXML
    private void Acash(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Main.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void aPro(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("AddProduct.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void cdetail(ActionEvent event) {
    }


    @FXML
    private void Trans(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Transaction.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Inven(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Inventory.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Updates(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Update.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void SperP(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("SalepProduct.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Sperd(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("SalespDay.fxml"));
        main.getChildren().setAll(pane);
    }

    @FXML
    private void Logout(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new  FXMLLoader();
        Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());        
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.show();
    }

    @FXML
    private void ClaerD(ActionEvent event) {
    cname.clear();
    cno.clear();
    cadd.clear();
    cpass.clear();
    }
    private void ClaerD() {
    cname.clear();
    cno.clear();
    cadd.clear();
    cpass.clear();
    }
    
}
