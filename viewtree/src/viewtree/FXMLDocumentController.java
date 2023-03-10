/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package viewtree;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TreeItem;
import javafx.scene.control.TreeView;

/**
 *
 * @author ogua
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML
    private TreeView<String> Treedata;
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        TreeItem<String> root = new TreeItem<>("Root");
        root.setExpanded(true);
        TreeItem<String> branch1 = new TreeItem<>("ogua");
        TreeItem<String> branch2 = new TreeItem<>("lameet");
        TreeItem<String> branch4 = new TreeItem<>("domingo");
        TreeItem<String> branch3 = new TreeItem<>("otula");
        
        
        TreeItem<String> branch21 = new TreeItem<>("lameet");
        TreeItem<String> branch41 = new TreeItem<>("domingo");
        TreeItem<String> branch31 = new TreeItem<>("otula");
        branch1.getChildren().addAll(branch21,branch41,branch31);
        
        TreeItem<String> branch211 = new TreeItem<>("lameet");
        TreeItem<String> branch411 = new TreeItem<>("domingo");
        TreeItem<String> branch311 = new TreeItem<>("otula");
        branch2.getChildren().addAll(branch211,branch411,branch311);
        
        TreeItem<String> branch2111 = new TreeItem<>("lameet");
        TreeItem<String> branch4111 = new TreeItem<>("domingo");
        TreeItem<String> branch3111 = new TreeItem<>("otula");
        branch3.getChildren().addAll(branch2111,branch4111,branch3111);
        
        root.getChildren().addAll(branch1,branch2,branch3,branch4);
        
        Treedata.setRoot(root);
       
    }    
    
}
