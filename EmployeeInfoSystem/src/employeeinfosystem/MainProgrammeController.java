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
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MainProgrammeController implements Initializable {
    @FXML
    private Button bt1;
    @FXML
    private Button bt2;
    @FXML
    private Button btn3;
    @FXML
    private Button bt4;
    @FXML
    private Button btn5;
    @FXML
    private Button btn6;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void addEmployee(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("AddEmployee.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("ADD EMPLOYEE");
        stage.show();
    }

    @FXML
    private void DepartmentLog(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("DepartmntLog.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("Employee Log");
        stage.show();
    }

    @FXML
    private void Logout(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("Employee management System");
        stage.show();
    }

    @FXML
    private void serachEmployee(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("SearchEmployee.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("Employee Search");     
        stage.show();
    }

    @FXML
    private void eDITEMployee(ActionEvent event) throws IOException {
        ((Node)event.getSource()).getScene().getWindow().hide();
        Stage stage = new Stage();
        FXMLLoader loader = new FXMLLoader();
        Pane root = loader.load(getClass().getResource("EditEmployee.fxml").openStream());       
        Scene scene = new Scene(root);       
        stage.setScene(scene);
        stage.setTitle("EDIT EMPLOYEE");
        stage.show();
    }

    @FXML
    private void AboutCompany(ActionEvent event) {
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setContentText("EMSv1.1 Powered by Ogua Solutions Center");
        alert.setTitle("Software Version Info");
        alert.showAndWait();
    }
    
}
