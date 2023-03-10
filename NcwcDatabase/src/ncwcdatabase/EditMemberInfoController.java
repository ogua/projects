/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.MalformedURLException;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.stage.Window;
import javax.swing.ImageIcon;
import javax.swing.JOptionPane;

/**
 * FXML Controller class
 *
 * @author ogua
 */
public class EditMemberInfoController implements Initializable {
    @FXML
    private VBox vbox;
    @FXML
    private Button browse,searchid;
    @FXML
    private TextField textfield;
    @FXML
    private ImageView imageview;
    @FXML
    private GridPane ADD;
    @FXML
    private TextField a1;
    @FXML
    private TextField a3;
    @FXML
    private TextField a4;
    @FXML
    private TextField a5;
    @FXML
    private Button save;
    @FXML
    private TextField a2;
    @FXML
    private TextField a7;
    @FXML
    private TextField a9;
    @FXML
    private TextField a11;
    @FXML
    private TextField a12;
    @FXML
    private TextField a10;
    @FXML
    private TextField a13;
    @FXML
    private TextField a15;
    @FXML
    private TextField a16;
    @FXML
    private TextField a14;
    @FXML
    private TextField a6,a18,a19;
    @FXML
    private TextField a8;
    @FXML
    private TextField identer;
    Connection conn = null;
    Statement stmt = null;
    ResultSet rst = null;
    PreparedStatement pre = null;
    PreparedStatement prep = null ;
    private File file;
    private FileChooser filechooser;
    private Image image;
    private Window Stage;
    private FileInputStream fils;
    @FXML
    private DatePicker dates;
    private LocalDate  ldate;
    @FXML
    private Button AddTnW;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
       
    }    
    @FXML
    private void handleButtonAction(ActionEvent event) throws MalformedURLException {
         filechooser = new FileChooser();
        filechooser.setTitle("choose image");
        file = filechooser.showOpenDialog(Stage);
        FileChooser.ExtensionFilter extFilter = new FileChooser.ExtensionFilter("jpg files (*.jpg)","*.JPG");
        FileChooser.ExtensionFilter extFilte = new FileChooser.ExtensionFilter("Png files (*.png)","*.PNG");
        if(file != null){
        textfield.setText(file.getAbsolutePath());
        image = new Image(file.toURI().toURL().toString());
        imageview.setImage(image);
        }else{
            textfield.setText("no file is selected");
        }
    }

    @FXML
    private void HANDLENPUT(ActionEvent event) throws SQLException, FileNotFoundException {
         conn = Mysqlilogin.Dbconnect();
       if(a1.getText().isEmpty()){
       JOptionPane.showMessageDialog(null, "FirstName Cant be Empty");
       }
       else if(a2.getText().isEmpty())
       {
        JOptionPane.showMessageDialog(null, "OtherName Cant be Empty");

       }
        else if(a4.getText().isEmpty())
       {
        JOptionPane.showMessageDialog(null, "Age Cant be Empty");

       }
         else if(a5.getText().isEmpty())
       {
        JOptionPane.showMessageDialog(null, "Resident Cant be Empty");

       }
          else if(a3.getText().isEmpty())
       {
        JOptionPane.showMessageDialog(null, "OtherName Cant be Empty");

       }
           else if(a9.getText().isEmpty())
       {
        JOptionPane.showMessageDialog(null, "Nationality Cant be Empty");

       }
            else if(a13.getText().isEmpty())
       {
        JOptionPane.showMessageDialog(null, "Telephone number cant be empty Cant be Empty");

       }
       else{
      pre = conn.prepareStatement ("UPDATE formreg SET Firstname = ?, Othernames = ?, Age = ?, Resident = ?, M_Status = ?, Occupation = ?, nameofspouse = ?, noofchildren = ?, nationality = ?,hometown = ?,dateofbaptism = ?,address = ?,Telno = ?,Houseno = ?,nameoffchrch = ?,posinchrch = ?,Image = ? WHERE Cardid OR TitheId = ?");
      pre.setString(1, a1.getText());
      pre.setString(2, a2.getText());
      pre.setString(3, a4.getText());
      pre.setString(4, a5.getText());
      pre.setString(5, a6.getText());
      pre.setString(6, a3.getText());
      pre.setString(7, a7.getText());
      pre.setString(8, a8.getText());
      pre.setString(9, a9.getText());
      pre.setString(10, a10.getText());
      pre.setString(11, a11.getText());
      pre.setString(12, a12.getText());
      pre.setString(13, a13.getText());
      pre.setString(14, a14.getText());
      pre.setString(15, a15.getText());
      pre.setString(16, a16.getText());
      
      fils = new FileInputStream(file);
      pre.setBinaryStream(17, (InputStream)fils, (int)file.length());
      pre.setString(18, identer.getText());
      pre.executeUpdate();
       JOptionPane.showMessageDialog(null, "Successfully");
       } 
    }
     @FXML
    private void HANDLESELECT(ActionEvent event) throws FileNotFoundException, IOException {
      if(identer.getText().isEmpty()){
      JOptionPane.showMessageDialog(null, "Please enter the cardid or titheid to validate Query");
      }else{
      conn = Mysqlilogin.Dbconnect();
    try{
    pre = conn.prepareStatement ("SELECT * FROM `formreg` WHERE Cardid = ? UNION SELECT * FROM formreg WHERE TitheId = ?");
    pre.setString(1, identer.getText());
    pre.setString(2, identer.getText());
    rst = pre.executeQuery();
    while(rst.next()){
    JOptionPane.showMessageDialog(null, "Connection successfully");
    a1.setText(rst.getString("Firstname"));
    a2.setText(rst.getString("Othernames"));
    a4.setText(rst.getString("Age"));
    a5.setText(rst.getString("Resident"));
    a6.setText(rst.getString("M_Status"));
    a3.setText(rst.getString("Occupation"));
    a7.setText(rst.getString("nameofspouse"));
    a8.setText(rst.getString("noofchildren"));
    a9.setText(rst.getString("nationality"));
    a10.setText(rst.getString("hometown"));
    a11.setText(rst.getString("dateofbaptism"));
    a12.setText(rst.getString("address"));
    a13.setText(rst.getString("Telno"));
    a14.setText(rst.getString("Houseno"));
    a15.setText(rst.getString("nameoffchrch"));
    a16.setText(rst.getString("posinchrch"));
    a18.setText(rst.getString("Cardid"));
    a19.setText(rst.getString("TitheId")); 
        try (InputStream is = rst.getBinaryStream("Image"); OutputStream os = new FileOutputStream(new File("photo.jpg"))) {
            byte[] content = new byte[1024];
            int size = 0;
            while((size = is.read(content)) != -1){
                os.write(content, 0, size);
            }
        }
     image = new Image("file:photo.jpg");
     imageview.setImage(image);
    }
     rst.close();
     pre.close();
    }catch(SQLException e){
      JOptionPane.showMessageDialog(null, "Failed to load data");
    }
      }
    
    }

    @FXML
    private void HardTItheandWelfare(ActionEvent event) {
         try{
        Stage stage = new Stage();
        FXMLLoader loads = new FXMLLoader();
        Pane root = loads.load(getClass().getResource("AddtitheandWelfare.fxml").openStream());
        Scene scene = new Scene(root);
        stage.setScene(scene);
         stage.initStyle(StageStyle.UTILITY);
        stage.getIcons().add(new Image("/image/logo.png"));
        stage.setTitle("Update Tithe and Welfare Details");
        stage.initModality(Modality.APPLICATION_MODAL);
        stage.show();
        }catch(Exception e){
        JOptionPane.showMessageDialog(null, e);
        } 
    }
    
}
