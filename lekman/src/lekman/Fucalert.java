/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package lekman;

import javafx.scene.control.ChoiceBox;
import javafx.scene.control.TextField;

/**
 *
 * @author ogua
 */
public class Fucalert {
     public static void getall(TextField users,TextField user,ChoiceBox<String> choice,TextField Age){
       int age;
       String num1;
       String num2;
       String num3;
       num1 = user.getText();
       num2 = choice.getValue();
       num3 = users.getText();
        System.out.print(num1);
        System.out.println("/t"+num3);
        System.out.println(num2);
        try{
        age = Integer.parseInt(Age.getText());
        System.out.println(age);
        }catch(NumberFormatException e){
         System.out.println(Age.getText() + " This is not a number");
        }
    }
}
