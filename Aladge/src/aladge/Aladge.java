/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aladge;

import java.util.Scanner;

/**
 *
 * @author OGUA
 */
public class Aladge {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        int numberofrecords;
        int sum = 0;
        float average;
        int x = 0;
        System.out.println("Enter The Specify Value of N");
        Scanner input = new Scanner(System.in); 
        numberofrecords = input.nextInt();
        int arrayvalues = 4;
        int paired_N[] = new int[arrayvalues];
        int id = 1;
        for(x = 0; x < arrayvalues; x++){
            System.out.println(id+".Please Enter Elements for the Array");
            paired_N[x] = input.nextInt();
            sum = sum + paired_N[x];
            id++;
        }
        
        

        
        System.out.println("The average mark of the students process is "+sum);
        
    }
    
}
