/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package fetchtable;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.control.ListView;
import javafx.scene.control.Tab;
import javafx.scene.control.TabPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MaimController implements Initializable {
    @FXML
    private ListView<String> list;
    private ObservableList<String> lits;
    @FXML
    private TabPane mainpane;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       getstring();
       change();
    }
    
    private void getstring(){
       lits = FXCollections.observableArrayList();
       lits.add("table");
       lits.add("chair");
       list.setItems(lits);
    }
    private void change(){
     list.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<String>() {

         @Override
         public void changed(ObservableValue<? extends String> observable, String oldValue, String newValue) {
                int i = list.getSelectionModel().getSelectedIndex();
                if(i==0){              
                    try {
                      Node TableForm = FXMLLoader.load(getClass().getResource("FXMLDocument.fxml"));
                        Tab tab = new Tab("table",TableForm);
                        mainpane.getTabs().add(tab);
                    } catch (IOException ex) {
                        Logger.getLogger(MaimController.class.getName()).log(Level.SEVERE, null, ex);
                    }

                }
                else if(i==1){
                 try {
                      Node TableFo = FXMLLoader.load(getClass().getResource("kofiadjoa.fxml"));
                        Tab tab = new Tab("chair",TableFo);
                        mainpane.getTabs().add(tab);
                    } catch (IOException ex) {
                        Logger.getLogger(MaimController.class.getName()).log(Level.SEVERE, null, ex);
                    }

                }
         }
     });
    }
    
}
