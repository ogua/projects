/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.animation.TranslateTransition;
import javafx.application.Platform;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.PieChart.Data;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ListView;
import javafx.scene.control.MenuItem;
import javafx.scene.control.PasswordField;
import javafx.scene.control.Tab;
import javafx.scene.control.TabPane;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.KeyCombination;
import javafx.scene.layout.Pane;
import javafx.scene.text.Text;
import javafx.scene.web.WebEngine;
import javafx.scene.web.WebView;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.util.Duration;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class MainprogController implements Initializable {
    @FXML
    private Button exit;
    
    @FXML
    private Button logout;
    @FXML
    private TabPane mainpane;
    @FXML
    private MenuItem menuexit;
    @FXML
    private MenuItem addnewmem;
     @FXML
    private MenuItem addtithe;
     @FXML
    private MenuItem addwelfare; 
     @FXML
    private MenuItem viewWelfaretable;
     @FXML
    private MenuItem viewTithetable; 
     @FXML
    private MenuItem editwelfareamount; 
    @FXML
    private MenuItem editmem;
    @FXML
    private MenuItem SM;
    @FXML
    private MenuItem viewmembers;
    @FXML
    private MenuItem editTithe;
    @FXML
    private MenuItem searchtithe;
    @FXML
    private MenuItem searchwelfare;
    @FXML
    private MenuItem viewpm;
     @FXML
    private MenuItem viewpt;
      @FXML
    private MenuItem viewpw;
    private ObservableList<String> list2;
    private ObservableList<String> list3;
    private ObservableList<String> list4;
    private ListView<String> listv1;
    @FXML
    private ListView<String> listv2;
    @FXML
    private ListView<String> listv3;
    @FXML
    private ListView<String> listv4;
    Connection conn = null;
    Statement stmt = null;
    PreparedStatement st = null;
    ResultSet rst = null;
    Text text1;
    Text text2;
    Text text3;
    int num1;
    int num2;
    int num3;
    @FXML
    WebView webview;
     @FXML
    Button welc;
    @FXML
    Label lable1;
    @FXML
    Label lable2;
    @FXML
    Label lable3;
    WebEngine engine;
    @FXML
    PieChart piechat;
    private ObservableList<Data> datas;
    @FXML
    private MenuItem SM1;
    @FXML
     private void Exitsystem(ActionEvent event){
         Platform.exit();
         System.exit(0);
     }
     
      @FXML
     private void Logout(ActionEvent event){
      try{
       ((Node)event.getSource()).getScene().getWindow().hide();
              Stage stage = new Stage();
              FXMLLoader loader = new  FXMLLoader();
              Pane root = loader.load(getClass().getResource("FXMLDocument.fxml").openStream());
              Scene scene = new Scene(root);
              stage.setScene(scene);
              stage.initStyle(StageStyle.UTILITY);
              stage.getIcons().add(new Image("/image/logo.png"));
              stage.show();
      }catch(IOException e){
      JOptionPane.showMessageDialog(null, e);
      }
     
     }  
     
     @FXML
    private void OpenNMember(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("MembershipRegister.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.setTitle("Membership Registration Form");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    
     @FXML
    private void OpenNTithe(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("AddTithe.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.setTitle("Add New Tithe Information");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    
     @FXML
    private void OpenNwefare(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("AddWelfare.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
        stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.setTitle("Add New Welfare Information");
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
     @FXML
    private void ViewAllMembers(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("MembersTable.fxml").openStream());
        Scene scene = new Scene(root);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
         stage.setTitle("DETAILS OF ALL MEMBERS IN THE CHURCH");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
  
     @FXML
    private void ViewTitheTable(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("TitheTable.fxml").openStream());
        Scene scene = new Scene(root);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
         stage.setTitle("ALL TITHE PAID");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
     @FXML
    private void ViewWelfareTable(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("WelfareTable.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("ALL WELFARE PAID");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
     @FXML
    private void ViewParticularMember(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("ViewParticularMember.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("VIEW PARTICULAR MEMBER");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    @FXML
    private void ViewParticularMember2(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("searchMember.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("VIEW PARTICULAR MEMBER");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
     @FXML
    private void Viewparticluartithe(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("ViewParticularTithe.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("VIEW PARTICULAR TITHE");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
     @FXML
    private void ViewparticulatWelfare(ActionEvent event){
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("viewpwel.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("ALL WELFARE PAID");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       
       getdataTithe();
       getdataMembes();
       getdataWejafer();
       num1 = Integer.parseInt(text2.getText());
       num2 = Integer.parseInt(text1.getText());
       num3 = Integer.parseInt(text3.getText());
       list2 = FXCollections.observableArrayList("RECORD TITHE","EDIT TITHE","VIEW PARTICULAR TIHTE","ALL TITHE TABLE","PRINT REPORT");
       listv2.setItems(list2);
       
       list3 = FXCollections.observableArrayList("RECORD WELFARE","EDIT WELFARE","VIEW PARTICULAR WELFARE","ALL WELFARE TABLE","PRINT REPORT");
       listv3.setItems(list3);
       
       list4 = FXCollections.observableArrayList("SEARCH WELFARE","SEARCH TITHE","SEARCH PARTICULAR MEMBER");
       listv4.setItems(list4);
       getTab2();
       getTab3();
       getTab4();
       
       datas = FXCollections.observableArrayList(
        new PieChart.Data("TOTAL MEMBERS REGISTERED", num1),
        new PieChart.Data("TOTAL TITHE RECEIVED", num2),
        new PieChart.Data("TOTAL WELFARE RECEIVED", num3)
       );
       piechat.setData(datas);
       //piechat.setStyle("-fx-background-color:rgb(100,250,500);");
       
       lable1.setText(String.valueOf(text2.getText()));
       lable2.setText(String.valueOf(text1.getText()));
       lable3.setText(String.valueOf(text3.getText()));
       
       engine = webview.getEngine();
       engine.load(getClass().getResource("index.html").toExternalForm());
             
    } 
    private void getdataTithe(){
    conn = Mysqlilogin.Dbconnect();
    String sql = "select count(id) from tithe";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    if(rst.next()){
    String num = rst.getString("count(id)");
    text1 = new Text();
    text1.setText(num);
    }
    }catch(SQLException e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    }
    private void getdataMembes(){
    conn = Mysqlilogin.Dbconnect();
    String sql = "select count(id) from formreg";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    if(rst.next()){
    String num2 = rst.getString("count(id)");
    text2 = new Text();
    text2.setText(num2);
    }
    }catch(SQLException e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    }
    
     private void getdataWejafer(){
    conn = Mysqlilogin.Dbconnect();
    String sql = "select count(id) from welfare";
    try{
    st = conn.prepareStatement(sql);
    rst = st.executeQuery();
    if(rst.next()){
    String num3 = rst.getString("count(id)");
    text3 = new Text();
    text3.setText(num3);
    }
    }catch(SQLException e){
    
    JOptionPane.showMessageDialog(null, e);
    }
    }
    private void PartMemberSearhch(ActionEvent event) {
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("ViewParticularMember.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("View A particular Member Record");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    private void ParticulardataTable(ActionEvent event) {
        try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("ViewParticularTithe.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("View A particular Tithe Record");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }

    private void Particulardatawelfarewelfare(ActionEvent event) {
         try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("viewpwel.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("View A particular Welfare Record");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
  @FXML
    private void editMemberInfo(ActionEvent event) {
         try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("EditMember.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("Edit MemberShip Information");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    @FXML
    private void editTitheAmount(ActionEvent event) {
         try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("EditTitheAmount.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("Edit Tithe Amount Paid");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
     @FXML
    private void editWelfareAmount(ActionEvent event) {
         try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("EditWelfareAmount.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
         stage.setTitle("Edit Welfare Amount Paid");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.setMaximized(false);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    private void sEARCHfILTER(ActionEvent event) {
         try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("SearchFilter.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.setTitle("Search Filter");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(IOException e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    private void getTab1(){
   listv1.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<String>(){
       @Override
       public void changed(ObservableValue<? extends String> observable, String oldValue, String newValue) {
           int i = listv1.getSelectionModel().getSelectedIndex();
           if(i==0){
           Node ADDmember = null;
               try {
                   ADDmember = FXMLLoader.load(getClass().getResource("MembershipRegister.fxml"));
                   Tab tab = new Tab("ADD NEW MEMBER", ADDmember);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==1){
               try {
                  Node editDmember = FXMLLoader.load(getClass().getResource("EditMember.fxml"));
                   Tab tab = new Tab("EDIT MEMBER", editDmember);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==2){
               try {
                  Node viwpDmember = FXMLLoader.load(getClass().getResource("ViewParticularMember.fxml"));
                   Tab tab = new Tab("VIEW PARTICULAR MEMBER", viwpDmember);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
            else if(i==3){
               try {
                  Node viwALLDmember = FXMLLoader.load(getClass().getResource("MembersTable.fxml"));
                   Tab tab = new Tab("VIEW ALL MEMBERS", viwALLDmember);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==4){
               try {
                  Node PrintMme = FXMLLoader.load(getClass().getResource("ReportMembers.fxml"));
                   Tab tab = new Tab("PRINT REPORT FOR MEMBERS", PrintMme);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
       }
   }); 
    }
    
     private void getTab2(){
   listv2.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<String>(){
       @Override
       public void changed(ObservableValue<? extends String> observable, String oldValue, String newValue) {
           int i = listv2.getSelectionModel().getSelectedIndex();
           if(i==0){
               try {
                  Node ADDTITHE = FXMLLoader.load(getClass().getResource("AddTithe.fxml"));
                   Tab tab = new Tab("RECORD TITHE", ADDTITHE);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==1){
               try {
                  Node edittithe = FXMLLoader.load(getClass().getResource("EditTitheAmount.fxml"));
                   Tab tab = new Tab("EDIT TITHE", edittithe);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==2){
               try {
                  Node viwpDtithe = FXMLLoader.load(getClass().getResource("ViewParticularTithe.fxml"));
                   Tab tab = new Tab("VIEW PARTICULAR TITHE", viwpDtithe);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
            else if(i==3){
               try {
                  Node viwALLtHIE = FXMLLoader.load(getClass().getResource("TitheTable.fxml"));
                   Tab tab = new Tab("VIEW ALL TITHE", viwALLtHIE);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==4){
               try {
                  Node PrintReport = FXMLLoader.load(getClass().getResource("PrintReportTithe.fxml"));
                   Tab tab = new Tab("PRINT TITHE REPORT", PrintReport);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
       }
   }); 
    }
    
      private void getTab3(){
   listv3.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<String>(){
       @Override
       public void changed(ObservableValue<? extends String> observable, String oldValue, String newValue) {
           int i = listv3.getSelectionModel().getSelectedIndex();
           if(i==0){
               try {
                 Node ADDWelfare = FXMLLoader.load(getClass().getResource("AddWelfare.fxml"));
                   Tab tab = new Tab("RECORD WELFARE", ADDWelfare);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==1){
               try {
                  Node editwelafe = FXMLLoader.load(getClass().getResource("EditWelfareAmount.fxml"));
                   Tab tab = new Tab("EDIT WELFARE", editwelafe);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==2){
               try {
                  Node viwpwelfare = FXMLLoader.load(getClass().getResource("viewpwel.fxml"));
                   Tab tab = new Tab("VIEW PARTICULAR WELFARE", viwpwelfare);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
            else if(i==3){
               try {
                  Node viwALLwelafe = FXMLLoader.load(getClass().getResource("WelfareTable.fxml"));
                   Tab tab = new Tab("VIEW ALL WELFARE", viwALLwelafe);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
            else if(i==4){
               try {
                  Node ReportWefare = FXMLLoader.load(getClass().getResource("ReportWelfare.fxml"));
                   Tab tab = new Tab("PRINT REPORT WELFARE", ReportWefare);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
       }
   }); 
    }
     private void getTab4(){
   listv4.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<String>(){
       @Override
       public void changed(ObservableValue<? extends String> observable, String oldValue, String newValue) {
           int i = listv4.getSelectionModel().getSelectedIndex();
           if(i==0){
               try {
                 Node SEARCHTithe = FXMLLoader.load(getClass().getResource("ViewParticularTithe.fxml"));
                   Tab tab = new Tab("SEARCH TITHE", SEARCHTithe);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==1){
               try {
                  Node searchwelafe = FXMLLoader.load(getClass().getResource("viewpwel.fxml"));
                   Tab tab = new Tab("SEARCH WELFARE", searchwelafe);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           else if(i==2){
               try {
                  Node searchmember = FXMLLoader.load(getClass().getResource("ViewParticularMember.fxml"));
                   Tab tab = new Tab("SEARCH MEMBERE", searchmember);
                   mainpane.getTabs().add(tab);
               } catch (IOException ex) {
                   Logger.getLogger(MainprogController.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
       }
   }); 
    }
    
    }
    
