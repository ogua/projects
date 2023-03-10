/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package combine;

import javafx.application.Application;
import javafx.application.Platform;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.Label;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.scene.control.PasswordField;
import javafx.scene.control.RadioMenuItem;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextField;
import javafx.scene.control.ToggleGroup;
import javafx.scene.control.TreeItem;
import javafx.scene.control.TreeView;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import static javafx.scene.paint.Color.color;
import javafx.scene.text.Text;
import javafx.scene.text.TextAlignment;
import javafx.stage.Stage;

/**
 *
 * @author ogua
 */
public class Combine extends Application {
    Scene scene2;
    @Override
    public void start(Stage primaryStage) {
       
         //menu items
            Menu file = new Menu("File");
        
        //menu list items for file
            MenuItem item1 = new MenuItem("New....");
            MenuItem item2 = new MenuItem("NewFile....");
            MenuItem item3 = new MenuItem("Open Project");
            MenuItem item4 = new MenuItem("SaveAs....");
            MenuItem item5 = new MenuItem("exit");
            item5.setOnAction(e->primaryStage.close());
            
            file.getItems().addAll(item1,item2,item3,item4,item5);
            
       //menu items
            Menu edit = new Menu("Edit");
            
        //menu list items for Edit
            MenuItem item11 = new MenuItem("Undo");
            item11.setOnAction(e->{
            Platform.exit();
            System.exit(0);
            });
            MenuItem item21 = new MenuItem("Redo");
            MenuItem item31 = new MenuItem("Cut");
            MenuItem item41 = new MenuItem("Copy");
            MenuItem item51 = new MenuItem("Past");
            
            
            edit.getItems().addAll(item11,item21,item31,item41,item51);
            
        //menu items
            Menu view = new Menu("View");
        
        //menu list items for Edit
            MenuItem item111 = new MenuItem("Editor");
            MenuItem item211 = new MenuItem("Split");
            MenuItem item311 = new MenuItem("Code");
            MenuItem item411 = new MenuItem("ToolBar");
            MenuItem item511 = new MenuItem("FullScreen");
            RadioMenuItem item611 = new RadioMenuItem("AutoSave");
            RadioMenuItem item711 = new RadioMenuItem("OnPageLoad");
            item611.setSelected(true);
            item611.disableProperty();
            view.getItems().addAll(item111,item211,item311,item411,item511,item611,item711);
            
        
        //menu items
            Menu nav = new Menu("Navigate");
        
        //menu list items for Edit
            MenuItem item1111 = new MenuItem("Go to File");
            MenuItem item2111 = new MenuItem("Go to Type");
            MenuItem item3111 = new MenuItem("Go to Symbol");
            MenuItem item4111 = new MenuItem("Go to Page");
            MenuItem item5111 = new MenuItem("Go to Source");
            
            
            
            nav.getItems().addAll(item1111,item2111,item3111,item4111,item5111);
            
           
            MenuItem item6111 = new MenuItem("Back");
            MenuItem item7111 = new MenuItem("Forward");
            MenuItem item8111 = new MenuItem("Inspect");
            MenuItem item9111 = new MenuItem("Select in Favourites");
            
            nav.getItems().addAll(item6111,item7111,item8111,item9111);

             //menu items
            Menu sou = new Menu("Source");
        
        //menu list items for Edit
            MenuItem ite = new MenuItem("Format");
            MenuItem ite1 = new MenuItem("Imsert");
        
            sou.getItems().addAll(ite,ite1);
            
           //menu items
            Menu ref = new Menu("Refactor");
        
        //menu list items for Edit
            MenuItem ite11 = new MenuItem("Format");
            MenuItem ite23 = new MenuItem("Imsert");
        
          ref.getItems().addAll(ite11,ite23);
          
          
          MenuBar menus = new MenuBar();
          menus.getMenus().addAll(file,edit,view,nav,sou,ref);
        
        
        
        
        
       VBox vet = new VBox();
       vet.setPadding(new Insets(20));
        //crate top menu first
            //TEXT
        Text text = new Text();
        text.setStyle("-fx-background-Color:#abc;");
        text.setText("It brought alot of smiles on my face babe, All i can do "
                + "is just be thinking of you like i always Do babe.\n" +
"I am so frustrated and i know when i meet you online all"
                + " will be okay with me.\n" +
" my love as i will have a great chat with you "
                + "tonight ......\n" +
"I had a long flight and all i can do is think of you"
                + " in the plane and cant wait to accomplish my mission and to be back home and be in your arms...\n" +
"I am so blessed to love you and you to be loved in return."
                + ".....\n" +
"The sad thing is that i had alot of log gage......"
                + "and it made me really busy and babe when \n" +
"i got to the Hotel as i w");
        
            //MENU BUTTONS
        HBox hb = new HBox(20);
            //button for menu
        Button btn1 = new Button("Add");
        btn1.setOnAction(e->AlertBox.alert());
        Button btn2 = new Button("Edit");
        btn2.setOnAction(e->primaryStage.setScene(scene2));
        Button btn3 = new Button("view");
        Button btn4 = new Button("Navigate");
        hb.getChildren().addAll(btn1,btn2,btn3,btn4);
        
            //layout for top menu
        VBox vox = new VBox();
        vox.setAlignment(Pos.CENTER);
        vox.getChildren().addAll(hb);
        // middle item
             //Layout for midle items
        GridPane grid = new GridPane();
        grid.setPadding(new Insets(20));
        grid.setVgap(5);
        grid.setHgap(5);
         //working on grid items
        Label label = new Label("UserName");
         grid.add(label, 0,0);
        
        TextField tf1 = new TextField("enter user name");
        tf1.setPrefColumnCount(20);
        grid.add(tf1,1,0);
        
        Label label2 = new Label("PassWord");
        grid.add(label2,0,1);
        
        PasswordField pwd = new PasswordField();
        grid.add(pwd,1,1);
        
        Label age = new Label("Age");
        grid.add(age,0,2);
                
        TextField tf2 = new TextField("please enter your age");
        grid.add(tf2,1,2);
        
        Label label3 = new Label("Gender");
        grid.add(label3,0,3);
        
        ToggleGroup gp = new ToggleGroup();
        
        CheckBox check = new CheckBox("Male");
        grid.add(check,1,3);
        check.setSelected(true);
        
        CheckBox check2 = new CheckBox("Fmale");
        grid.add(check2,2,3);
        
        
        Button btn5 = new Button("Submit");
        grid.add(btn5,1,4);
        
        ScrollPane spp = new ScrollPane();
        Text text3 = new Text();
        text3.setFill(Color.BLUE);
        text3.setText("It brought alot of smiles on my face babe, "
                + "All i can do is"
                + " just be thinking of you like i always Do babe.\n" +
"I am so frustrated and i know when i meet you online all will be okay "
                + "with me.\n" +
" my love as i will have a great chat with you tonight ......\n" +
"I had a long flight and all i can do is think of you in the plane "
                + "and cant wait to accomplish my mission and to be back home and be in your arms...\n" +
"I am so blessed to love you and you to be loved in return......\n" +
"The sad thing is that i had alot of log gage......and it made "
                + "me really busy and babe when \n" +
"i got to the Hotel as i was with a Taxi driver and i forgot and i"
                + " left my bag containing my laptop and my credit card...........\n" +
"in the Taxi and later when i settled in the Hotel room i noticed"
                + "that my log gage is not in number like it should be"
                + "..........\n" +
"So i lost my laptop and so i spoke to the Hotel manager and arranged "
                + "to borrow me an old laptop of his............\n" +
"But i had to pay him a little amount of money so that i can compensat"
                + "e him...\n" +
"Babe the hotel manger Helped me to make the announcement on Air....\n" +
"But i will be waiting to see if the Taxi driver will be Good ,a good"
                + " Samaritan to bring \n" +
"all that back.....");
        spp.setContent(text3);
        spp.setPadding(new Insets(20));
        spp.setMaxWidth(400);
        spp.setFitToWidth(true);
        
        
        GridPane grid11 = new GridPane();
        grid11.setPadding(new Insets(20));
        grid11.setVgap(5);
        grid11.setHgap(5);
         //working on grid items
        Label label11 = new Label("UserName");
         grid11.add(label11, 0,0);
        
        TextField tf111 = new TextField("enter user name");
        tf111.setPrefColumnCount(20);
        grid11.add(tf111,1,0);
        
        Label label211 = new Label("PassWord");
        grid11.add(label211,0,1);
        
        PasswordField pwd11 = new PasswordField();
        grid11.add(pwd11,1,1);
        
        Label age11 = new Label("Age");
        grid11.add(age11,0,2);
                
        TextField tf211 = new TextField("please enter your age");
        grid11.add(tf211,1,2);
        
        Label label311 = new Label("Gender");
        grid11.add(label311,0,3);
        
        CheckBox check11 = new CheckBox("Male");
        grid11.add(check11,1,3);
        check.setSelected(true);
        
        CheckBox check211 = new CheckBox("Fmale");
        grid11.add(check211,3,3);
              
        Button btn511 = new Button("Submit");
        grid11.add(btn511,0,4);
        
        Button btn521 = new Button("Back");
        grid11.add(btn521,1,4);
        
        
        
        
        
        
        vet.getChildren().addAll(grid,spp,grid11);
        // list side tree item
        TreeView<String>tree;
        
        TreeItem<String>ogua, combine, lamere, kwame, learn, trys, statement;
        
        //root ogua
        ogua = new TreeItem<>();
        ogua.setExpanded(true);
        
        //combine
        combine = makebranch("combine", ogua);
        makebranch("source packages",combine);
        makebranch("combines",combine);
        makebranch("LiBRARY",combine);
        
        //LAMERE
        lamere = makebranch("lamere",ogua);
        makebranch("source package",lamere);
        makebranch("META-INF",lamere);
        makebranch("Numberfunc",lamere);
         makebranch("Numbers",lamere);
        
         
        //learn 
         kwame = makebranch("kwame",lamere);
        makebranch("source package",kwame);
        makebranch("META-INF",kwame);
        makebranch("Numberfunc",kwame);
         makebranch("Numbers",kwame);
        
         //trys
        learn = makebranch("learn",ogua);
        makebranch("source package",learn);
        makebranch("META",learn);
        makebranch("Num",learn);
         makebranch("string",learn);
        
        //trys
         trys = makebranch("trys",ogua);
        makebranch("source package",trys);
        makebranch("META-INF",trys);
        makebranch("Numberfunc",trys);
         makebranch("Numbers",trys);
        
        //statement
         statement = makebranch("statement",ogua);
        makebranch("source package",statement);
        makebranch("META-INF",statement);
        makebranch("Numberfunc",statement);
         makebranch("Numbers",statement);
        
        tree = new TreeView<>(ogua);
        tree.setShowRoot(false);
        
        //layout for left pane display
        StackPane stack = new StackPane();
        stack.getChildren().add(tree);
        
        
        
        
        
        
        
        
        
        
        
        
        
        BorderPane bp = new BorderPane();
        bp.setTop(menus);
        bp.setCenter(vet);
        bp.setLeft(stack);
       
        Scene scene = new Scene(bp, 750, 650);
        
        primaryStage.setTitle("WELCOME TO OGUA SOLUTION CENTER");
        primaryStage.setScene(scene);
        primaryStage.show();
        
        
        
        
        //Scene two
        
        GridPane grid1 = new GridPane();
        grid1.setPadding(new Insets(20));
        grid1.setVgap(5);
        grid1.setHgap(5);
         //working on grid items
        Label label1 = new Label("UserName");
         grid1.add(label1, 0,0);
        
        TextField tf11 = new TextField("enter user name");
        tf11.setPrefColumnCount(20);
        grid1.add(tf11,1,0);
        
        Label label21 = new Label("PassWord");
        grid1.add(label21,0,1);
        
        PasswordField pwd1 = new PasswordField();
        grid1.add(pwd1,1,1);
        
        Label age1 = new Label("Age");
        grid1.add(age1,0,2);
                
        TextField tf21 = new TextField("please enter your age");
        grid1.add(tf21,1,2);
        
        Label label31 = new Label("Gender");
        grid1.add(label31,0,3);
        
        CheckBox check1 = new CheckBox("Male");
        grid1.add(check1,1,3);
        check.setSelected(true);
        
        CheckBox check21 = new CheckBox("Fmale");
        grid1.add(check21,3,3);
              
        Button btn51 = new Button("Submit");
        grid1.add(btn51,0,4);
        
        Button btn52 = new Button("Back");
        grid1.add(btn52,1,4);
        btn52.setOnAction(e->primaryStage.setScene(scene));
        scene2 = new Scene(grid1,750,650);
        
        
        
        
        
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
    public TreeItem<String> makebranch(String name, TreeItem<String>parent){
        TreeItem<String> items = new TreeItem<>(name);
        items.setExpanded(true);
        parent.getChildren().add(items);
        return items;
    }
}
