/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exercise;

import java.lang.reflect.Array;
import java.util.Scanner;

/**
 *
 * @author OGUA
 */
public class Exercise {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        int numberofrecords;
        int sum = 0;
        float average;
        int x = 0;
        System.out.println("Enter the Specify Value of N");
        Scanner input = new Scanner(System.in); 
        numberofrecords = input.nextInt();
        String name[] = new String[numberofrecords]; 
        int marks[] = new int[numberofrecords];
        int id = 1;
        for(x = 0; x < numberofrecords; x++){
            System.out.println(id+".Please Enter the name of the student");
            name[x] = input.next();
            System.out.println(">>Please Enter the Marks of the student");
            marks[x] = input.nextInt();    
            
            sum = sum + marks[x];
            id++;
        }
        
        average = (float)sum/numberofrecords;
        
        System.out.println("The average mark of the students process is "+average);
        
        for(x = 0; x < numberofrecords; x++){
             System.out.println("Name of Student: "+name[x]+ ", Score: "+marks[x]+"%");
        }
        
        
        
    }
    
}
