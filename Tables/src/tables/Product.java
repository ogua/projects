/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package tables;

/**
 *
 * @author ogua
 */
public class Product {
    private String name;
    private double price;
    private int quantity;
    
    public Product(){
    }
    public Product(String name){
    this.name = name;
    }
    public Product(double price){
    this.price = price;
    }
     public Product(int quantity){
    this.quantity = quantity;
    }
     
     public Product(String name, double price, int quantity){
     this.name = name;
     this.price = price;
     this.quantity = quantity;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public int getQuantity() {
        return quantity;
    }

    public void setQuantity(int quantity) {
        this.quantity = quantity;
    }
     
     
     
     
     
}
