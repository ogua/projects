/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lamere;
import javafx.scene.control.CheckBox;
import javafx.scene.control.TextField;
/**
 *
 * @author ogua
 */
public class nuberfunc {
    public static boolean intIsset(TextField textfield, String message){
     try{
     int age = Integer.parseInt(textfield.getText());
     System.out.println(textfield.getText());
     return true;
     }catch(NumberFormatException e){
     System.out.println(textfield.getText() + " is not an integer ");
      return false;
     }
    }
    public static void checkhandle(CheckBox checkbox1, CheckBox checkbox2){
         if(checkbox1.isSelected()){
         System.out.println(checkbox1.getText() + " is selected nun");
         }
         if(checkbox2.isSelected()){
         System.out.println(checkbox2.getText() + " is selected nun");
         }
     }
   
}
