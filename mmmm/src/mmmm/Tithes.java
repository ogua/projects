/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package mmmm;

import java.sql.Date;

/**
 *
 * @author ogua
 */
public class Tithes {
    private Integer id;
    private String cardid;
    private String firstname;
    private String otherNames;
    private String mon;
    private String amount;
    private String year;
    private Date date;

    public Tithes() {
    }

    public Tithes(Integer id, String cardid, String firstname, String otherNames, String mon, String amount, String year, Date date) {
        this.id = id;
        this.cardid = cardid;
        this.firstname = firstname;
        this.otherNames = otherNames;
        this.mon = mon;
        this.amount = amount;
        this.year = year;
        this.date = date;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getCardid() {
        return cardid;
    }

    public void setCardid(String cardid) {
        this.cardid = cardid;
    }

    public String getFirstname() {
        return firstname;
    }

    public void setFirstname(String firstname) {
        this.firstname = firstname;
    }

    public String getOtherNames() {
        return otherNames;
    }

    public void setOtherNames(String otherNames) {
        this.otherNames = otherNames;
    }

    public String getMon() {
        return mon;
    }

    public void setMon(String mon) {
        this.mon = mon;
    }

    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount;
    }

    public String getYear() {
        return year;
    }

    public void setYear(String year) {
        this.year = year;
    }

    public Date getDate() {
        return date;
    }

    public void setDate(Date date) {
        this.date = date;
    }
    
    
    
}
