/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package employeeinfosystem;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Tab;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class EditEmployeeController implements Initializable {
    @FXML
    private Button back;
    @FXML
    private AnchorPane goback2;
    @FXML
    private Button back1;
    @FXML
    private Button back3;
    @FXML
    private Button back31;
    @FXML
    private Button back311;
    @FXML
    private Button RSET;
    @FXML
    private Button Add;
    @FXML
    private ComboBox<?> A1;
    @FXML
    private TextField A2;
    @FXML
    private TextField A3;
    @FXML
    private TextField A4;
    @FXML
    private TextField A6;
    @FXML
    private DatePicker A5;
    @FXML
    private ComboBox<?> A7;
    @FXML
    private ComboBox<?> A8;
    @FXML
    private TextField A9;
    @FXML
    private TextField A10;
    @FXML
    private TextField A11;
    @FXML
    private TextField A12;
    @FXML
    private TextField A13;
    @FXML
    private TextField A14;
    @FXML
    private TextField A15;
    @FXML
    private TextField A16;
    @FXML
    private TextField A17;
    @FXML
    private TextField A18;
    @FXML
    private TextField A19;
    @FXML
    private TextField A20;
    @FXML
    private TextField A30;
    @FXML
    private TextField A32;
    @FXML
    private TextField A34;
    @FXML
    private TextField A36;
    @FXML
    private TextField A38;
    @FXML
    private DatePicker A31;
    @FXML
    private DatePicker A33;
    @FXML
    private DatePicker A35;
    @FXML
    private DatePicker A37;
    @FXML
    private DatePicker A39;
    @FXML
    private TextField A22;
    @FXML
    private TextField A23;
    @FXML
    private TextField A24;
    @FXML
    private TextField A25;
    @FXML
    private TextField A26;
    @FXML
    private TextField A27;
    @FXML
    private TextField A28;
    @FXML
    private TextField A29;
    @FXML
    private DatePicker A21;
    @FXML
    private TextField A40;
    @FXML
    private TextField A41;
    @FXML
    private DatePicker A42;
    @FXML
    private DatePicker A43;
    @FXML
    private DatePicker A44;
    @FXML
    private TextField A45;
    @FXML
    private DatePicker A47;
    @FXML
    private DatePicker A48;
    @FXML
    private DatePicker A49;
    @FXML
    private TextField A50;
    @FXML
    private DatePicker A53;
    @FXML
    private DatePicker A52;
    @FXML
    private ComboBox<?> A46;
    @FXML
    private TextField A51;
    @FXML
    private DatePicker A54;
    @FXML
    private TextField A55;
    @FXML
    private TextField A56;
    @FXML
    private TextField A57;
    @FXML
    private DatePicker A58;
    @FXML
    private DatePicker A59;
    @FXML
    private TextField A60;
    @FXML
    private TextField A61;
    @FXML
    private TextField A62;
    @FXML
    private TextField A63;
    @FXML
    private TextField A64;
    @FXML
    private DatePicker A65;
    @FXML
    private DatePicker A66;
    @FXML
    private TextField A67;
    @FXML
    private TextField A68;
    @FXML
    private TextField A69;
    @FXML
    private TextField A70;
    @FXML
    private TextField A71;
    @FXML
    private DatePicker A72;
    @FXML
    private DatePicker A73;
    @FXML
    private TextField A74;
    @FXML
    private Tab A75;
    @FXML
    private TextField A76;
    @FXML
    private TextField A77;
    @FXML
    private TextField A78;
    @FXML
    private DatePicker A79;
    @FXML
    private DatePicker A80;
    @FXML
    private TextField A81;
    @FXML
    private TextField A82;
    @FXML
    private TextField A83;
    @FXML
    private ComboBox<?> A84;
    @FXML
    private TextField A85;
    @FXML
    private TextField A86;
    @FXML
    private ComboBox<?> A87;
    @FXML
    private TextField A88;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void Goback1(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("MainProgramme.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("ADD EMPLOYEE");
        stage.show();
    }

    @FXML
    private void RESETDATA(ActionEvent event) {
    }

   
    
    private void Goback1(MouseEvent event) {
    }

    @FXML
    private void UPDATEINFO(ActionEvent event) {
    }
    
}
