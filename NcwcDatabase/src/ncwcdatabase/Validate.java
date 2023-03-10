/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

import javafx.scene.control.Label;
import javafx.scene.control.TextField;

/**
 *
 * @author ogua
 */
public class Validate {
    public static boolean Textfieldempty(TextField tf){
     boolean b = false; 
        if(tf.getText().isEmpty())
          b = true;
           return b;   
    }
   public static boolean Textfieldempty(TextField tf,Label lb, String mesg){
     boolean b = true; 
     String msg = null;
       if(Textfieldempty(tf)){
       tf.setStyle("-fx-background-color:red;");
       }else{
         tf.setStyle("-fx-background-color:white;");
       }
       if(Textfieldempty(tf)){
        b = false;
       msg = mesg;
       }
       lb.setText(msg);
      return b;  
    }
   public static boolean NumberFort(TextField tf,Label lb, String mesg){
      boolean b = true; 
      String message = null;
        try{
           if(tf.getText().isEmpty()){
            
               lb.setText("FIELD CANT BE EMPTY");
               tf.setStyle("-fx-background-color:red;");
              return false;
           }
           else{
          int num = Integer.parseInt(tf.getText());
          tf.setStyle("-fx-background-color:white;");
          return b;
           }     
        }catch(NumberFormatException e){
         message = mesg;
         lb.setText(tf.getText() + mesg);
         tf.setStyle("-fx-background-color:red;");
        return false;
        }  
    }
}
