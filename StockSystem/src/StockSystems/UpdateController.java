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
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextField;
import javafx.scene.input.KeyEvent;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class UpdateController implements Initializable {
    @FXML
    private VBox mainPane;
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
    @FXML
    private TextField pQty;
    @FXML
    private TextField pPrice;
    @FXML
    private TextField oName;
    @FXML
    private TextField prdtid;
    @FXML
    private TextField paty2;
    @FXML
    private Button Update;
    ResultSet rs;
    Connection conn;
    PreparedStatement pr;
    int ans;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }   
    @FXML
    private void Updates(ActionEvent event) throws SQLException {
         conn = MysqliConnect.dbConnect();
         String sql = "UPDATE product SET ProductId = ?, name = ?, Amount = ?, Quantity = ? WHERE ProductId = ?";
         int prod = Integer.parseInt(prdtid.getText());
         String names = oName.getText();
         double px = Double.parseDouble(pPrice.getText());     
         int quan = Integer.parseInt(pQty.getText());
         int quant = Integer.parseInt(paty2.getText());
         ans = quan + quant;
         try {
            pr = conn.prepareStatement(sql);     
            pr.setInt(1, prod);
            pr.setString(2, names);
            pr.setDouble(3, px);
            pr.setInt(4, ans);
            pr.setInt(5, prod);
            pr.executeUpdate();
            JOptionPane.showMessageDialog(null, "Update Successfully on Product with ID NUMBER "+prdtid.getText());
            cdetail();
        } catch (SQLException ex) {
            Logger.getLogger(UpdateController.class.getName()).log(Level.SEVERE, null, ex);
        }
        pr.close();
    }
    @FXML
    private void GetInfo(KeyEvent event) {
         conn = MysqliConnect.dbConnect();
         String sql = "SELECT * FROM `product` WHERE ProductId = ?";
        try {
            pr = conn.prepareStatement(sql);
             pr.setString(1, prdtid.getText());
                rs = pr.executeQuery();
                while(rs.next()){          
                    oName.setText(rs.getString("name"));
                    pPrice.setText(rs.getString("Amount"));
                    pQty.setText(rs.getString("Quantity"));
                    
                }
        } catch (SQLException ex) {
            Logger.getLogger(UpdateController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    private void cdetail(){
        prdtid.clear();
        oName.clear();
        pPrice.clear();
        pQty.clear();
    }
     @FXML
    private void Acash(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Main.fxml"));
        mainPane.getChildren().setAll(pane);
    }

    @FXML
    private void aPro(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("AddProduct.fxml"));
        mainPane.getChildren().setAll(pane);
    }

    @FXML
    private void cdetail(ActionEvent event) {
        
    }


    @FXML
    private void Trans(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Transaction.fxml"));
        mainPane.getChildren().setAll(pane);
    }

    @FXML
    private void Inven(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("Inventory.fxml"));
        mainPane.getChildren().setAll(pane);
    }

    @FXML
    private void SperP(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("SalepProduct.fxml"));
        mainPane.getChildren().setAll(pane);
    }

    @FXML
    private void Sperd(ActionEvent event) throws IOException {
        VBox pane = FXMLLoader.load(getClass().getResource("SalespDay.fxml"));
        mainPane.getChildren().setAll(pane);
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
    private void SearchData(KeyEvent event) {
    }
    
}
