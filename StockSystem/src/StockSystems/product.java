/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package StockSystems;

/**
 *
 * @author ogua
 */
public class product {
    private int id;
    private String name;
    private int qty;
    private double Amount;
    private String description;

    public product() {
    }

    public product(int id, String name, int qty, double Amount, String description) {
        this.id = id;
        this.name = name;
        this.qty = qty;
        this.Amount = Amount;
        this.description = description;
    }

    public product(int id, String name, int qty) {
        this.id = id;
        this.name = name;
        this.qty = qty;
    }
    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getQty() {
        return qty;
    }

    public void setQty(int qty) {
        this.qty = qty;
    }

    public double getAmount() {
        return Amount;
    }

    public void setAmount(double Amount) {
        this.Amount = Amount;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }
    
}
