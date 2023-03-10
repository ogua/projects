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
public class Bill {
    private int Id;
    private int cashier;
    private int billId;
    private double total;
    private String date;
    private String datetime;

    public Bill() {
    }

    public Bill(int cashier, int billId, double total, String date, String datetime) {
        this.cashier = cashier;
        this.billId = billId;
        this.total = total;
        this.date = date;
        this.datetime = datetime;
    }
    
    public Bill(String date, int billId, double total) {
        this.billId = billId;
        this.total = total;
        this.date = date;
    }

    public int getBillId() {
        return billId;
    }

    public void setBillId(int billId) {
        this.billId = billId;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public int getCashier() {
        return cashier;
    }

    public void setCashier(int cashier) {
        this.cashier = cashier;
    }

    public String getDatetime() {
        return datetime;
    }

    public void setDatetime(String datetime) {
        this.datetime = datetime;
    }

   
}
