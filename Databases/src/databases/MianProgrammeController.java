/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package databases;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.ListView;
import javafx.scene.control.TableColumn;

/**
 * FXML Controller class
 *
 * @author OGUA
 */
public class MianProgrammeController implements Initializable {
    @FXML
    private ListView<String> MenuItems;
    private ObservableList<String>items;
    @FXML
    private TableColumn<?, ?> id;
    @FXML
    private TableColumn<?, ?> email;
    @FXML
    private TableColumn<?, ?> pasword;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
   items = FXCollections.observableArrayList("New Registration", "Edit Registration");
   MenuItems.setItems(items);
   
        
    }    
    
}
