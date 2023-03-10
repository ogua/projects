/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package fetchtable;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.web.WebEngine;
import javafx.scene.web.WebView;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class WebController implements Initializable {
    @FXML
    private WebView webview;
    private WebEngine engine;
    @FXML
    private Button loadd;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        engine = webview.getEngine();
    }    
    @FXML
     public void getweb(ActionEvent event){
     
        engine.load(getClass().getResource("index.html").toExternalForm());
     }
}
