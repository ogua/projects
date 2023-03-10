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
public class Products {
    private int id;
    private String barcode;
    private String Product;
    private String Pricein;
    private String priceout;
    private String qty;
    private String date;
   

    public Products() {
    }

    public Products(int id, String barcode, String Product, String Pricein, String priceout, String qty, String date) {
        this.id = id;
        this.barcode = barcode;
        this.Product = Product;
        this.Pricein = Pricein;
        this.priceout = priceout;
        this.qty = qty;
        this.date = date;
    }
 
    public Products(String barcode, String Product, String Pricein, String priceout, String qty, String date) {
        this.barcode = barcode;
        this.Product = Product;
        this.Pricein = Pricein;
        this.priceout = priceout;
        this.qty = qty;
        this.date = date;
    }

    public String getBarcode() {
        return barcode;
    }

    public void setBarcode(String barcode) {
        this.barcode = barcode;
    }

    public String getProduct() {
        return Product;
    }

    public void setProduct(String Product) {
        this.Product = Product;
    }

    public String getPricein() {
        return Pricein;
    }

    public void setPricein(String Pricein) {
        this.Pricein = Pricein;
    }

    public String getPriceout() {
        return priceout;
    }

    public void setPriceout(String priceout) {
        this.priceout = priceout;
    }

    public String getQty() {
        return qty;
    }

    public void setQty(String qty) {
        this.qty = qty;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
    
}
