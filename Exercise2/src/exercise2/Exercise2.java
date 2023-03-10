/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exercise2;

import static java.lang.System.exit;
import java.util.InputMismatchException;
import java.util.Scanner;

/**
 *
 * @author OGUA
 */
public class Exercise2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        int numberofrecords;
        int x = 0;
        int sum = 0;
        int numberofvotes = 0;
        float average;
        try{
        System.out.println("Hello Welcome to Ogua Restaurant, Plesae rate us from 1 - 5, enter -1 to end programme");
        Scanner input = new Scanner(System.in); 
        numberofrecords = input.nextInt();  
            while(numberofrecords != -1){
                if(numberofrecords < 1 || numberofrecords > 5){
                    System.out.println("Please the range should be 1 to 5");
                    System.out.println("Enter Value to rate again"); 
                    numberofrecords = input.nextInt();
                }else{
                     System.out.println("Enter Value to rate again"); 
                     numberofrecords = input.nextInt();
                     sum = sum + numberofrecords;
                     numberofvotes++;
                }
           }   
        }catch(Exception e){
            System.out.println("Exception Occured"+e);
        }
         
        average = (float)sum/numberofvotes;
        
        System.out.println("The total number of people who gave each rating is "+numberofvotes);
         System.out.println("The Average number of rating is "+average);
    }
    
}
