/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package hotelmanagementsystem;

/**
 *
 * @author ogua
 */
public class Hotel {
    private String customerRef; 
    private String firstname;
    private String othernames;  
    private int postalCode;    
    private int telNumber;   
    private String email;   
    private String nationality;  
    private String dateofbirth;   
    private String idtype;   
    private String gender;   
    private String checkindate;  
    private String checkoutdate;   
    private int meal;   
    private String roomtype;   
    private int roomnum;  
    private int roomextno;

    public Hotel() {
    }

    public Hotel(String customerRef, String firstname, String othernames, int postalCode, int telNumber, String email, String nationality, String dateofbirth, String idtype, String gender, String checkindate, String checkoutdate, int meal, String roomtype, int roomnum, int roomextno) {
        this.customerRef = customerRef;
        this.firstname = firstname;
        this.othernames = othernames;
        this.postalCode = postalCode;
        this.telNumber = telNumber;
        this.email = email;
        this.nationality = nationality;
        this.dateofbirth = dateofbirth;
        this.idtype = idtype;
        this.gender = gender;
        this.checkindate = checkindate;
        this.checkoutdate = checkoutdate;
        this.meal = meal;
        this.roomtype = roomtype;
        this.roomnum = roomnum;
        this.roomextno = roomextno;
    }

    public String getCustomerRef() {
        return customerRef;
    }

    public void setCustomerRef(String customerRef) {
        this.customerRef = customerRef;
    }

    public String getFirstname() {
        return firstname;
    }

    public void setFirstname(String firstname) {
        this.firstname = firstname;
    }

    public String getOthernames() {
        return othernames;
    }

    public void setOthernames(String othernames) {
        this.othernames = othernames;
    }

    public int getPostalCode() {
        return postalCode;
    }

    public void setPostalCode(int postalCode) {
        this.postalCode = postalCode;
    }

    public int getTelNumber() {
        return telNumber;
    }

    public void setTelNumber(int telNumber) {
        this.telNumber = telNumber;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNationality() {
        return nationality;
    }

    public void setNationality(String nationality) {
        this.nationality = nationality;
    }

    public String getDateofbirth() {
        return dateofbirth;
    }

    public void setDateofbirth(String dateofbirth) {
        this.dateofbirth = dateofbirth;
    }

    public String getIdtype() {
        return idtype;
    }

    public void setIdtype(String idtype) {
        this.idtype = idtype;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public String getCheckindate() {
        return checkindate;
    }

    public void setCheckindate(String checkindate) {
        this.checkindate = checkindate;
    }

    public String getCheckoutdate() {
        return checkoutdate;
    }

    public void setCheckoutdate(String checkoutdate) {
        this.checkoutdate = checkoutdate;
    }

    public int getMeal() {
        return meal;
    }

    public void setMeal(int meal) {
        this.meal = meal;
    }

    public String getRoomtype() {
        return roomtype;
    }

    public void setRoomtype(String roomtype) {
        this.roomtype = roomtype;
    }

    public int getRoomnum() {
        return roomnum;
    }

    public void setRoomnum(int roomnum) {
        this.roomnum = roomnum;
    }

    public int getRoomextno() {
        return roomextno;
    }

    public void setRoomextno(int roomextno) {
        this.roomextno = roomextno;
    }
    
}
