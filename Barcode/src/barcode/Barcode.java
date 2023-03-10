/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package barcode;

import com.onbarcode.barcode.Code128;
import java.io.File;

/**
 *
 * @author ogua
 */
public class Barcode {
    private static Object BarcodeReader;

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception {
       // Select a barcode type to create a Java barcode object 
    Code128 barcode = new Code128(); 

// Set barcode data text to encode
    barcode.setData("Barcode-in-Java"); 

// Set barcode data text to encode
    barcode.setX(2); 

// Generate barcode & encode into GIF format
    barcode.drawBarcode("D://image (2).png"); 

// Generate barcode & encode into JPEG format
    barcode.drawBarcode("D://image (2).png"); 

// Generate barcode & encode into EPS format
    barcode.drawBarcode2EPS("D://image (2).png"); 

// Generate barcode & print into Graphics2D object
    barcode.drawBarcode("Java Graphics2D object"); 
    
    String[] datas = BarcodeReader.read(new File("D://image (2).png"), BarcodeReader.Code128); 
    }
    
}
