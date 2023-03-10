/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package combine;

import javafx.scene.control.TextField;

/**
 *
 * @author ogua
 */
public class Handleint {
    public static boolean issetInt(TextField tf2, String message){
       try{
       int age = Integer.parseInt(tf2.getText());
        System.out.println(tf2.getText());
        return true;
       }catch(NumberFormatException e){
       System.out.println(tf2.getText() + " is not a number");
       return false;
       }
        
    }
    
}
