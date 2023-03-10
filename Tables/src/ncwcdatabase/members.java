/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ncwcdatabase;

/**
 *
 * @author ogua
 */
public class members {
    private Integer id;
    private String firstname;
    private String othernames;
    private String resident;
    private String age;
    private String mStatus;
    private String occupation;
    private String nameofspouse;
    private String noofchildren;
    private String nationality;
    private String hometown;
    private String dateofbaptism;
    private String address;
    private String telno;
    private String houseno;
    private String nameoffchrch;
    private String posinchrch;
    private String cardid;
    private String titheId;
    private byte[] image;

    public members() {
    }

    public members(Integer id) {
        this.id = id;
    }

    public members(String firstname) {
        this.firstname = firstname;
    }

    public members(Integer id, String firstname, String othernames, String resident, String age, String mStatus, String occupation, String nameofspouse, String noofchildren, String nationality, String hometown, String dateofbaptism, String address, String telno, String houseno, String nameoffchrch, String posinchrch, String cardid, String titheId) {
        this.id = id;
        this.firstname = firstname;
        this.othernames = othernames;
        this.resident = resident;
        this.age = age;
        this.mStatus = mStatus;
        this.occupation = occupation;
        this.nameofspouse = nameofspouse;
        this.noofchildren = noofchildren;
        this.nationality = nationality;
        this.hometown = hometown;
        this.dateofbaptism = dateofbaptism;
        this.address = address;
        this.telno = telno;
        this.houseno = houseno;
        this.nameoffchrch = nameoffchrch;
        this.posinchrch = posinchrch;
        this.cardid = cardid;
        this.titheId = titheId;
    }

    public members(Integer id, String firstname, String othernames, String resident, String age, String mStatus, String occupation, String nameofspouse, String noofchildren, String nationality, String hometown, String dateofbaptism, String address, String telno, String houseno, String nameoffchrch, String posinchrch, String cardid, String titheId, byte[] image) {
        this.id = id;
        this.firstname = firstname;
        this.othernames = othernames;
        this.resident = resident;
        this.age = age;
        this.mStatus = mStatus;
        this.occupation = occupation;
        this.nameofspouse = nameofspouse;
        this.noofchildren = noofchildren;
        this.nationality = nationality;
        this.hometown = hometown;
        this.dateofbaptism = dateofbaptism;
        this.address = address;
        this.telno = telno;
        this.houseno = houseno;
        this.nameoffchrch = nameoffchrch;
        this.posinchrch = posinchrch;
        this.cardid = cardid;
        this.titheId = titheId;
        this.image = image;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
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

    public String getResident() {
        return resident;
    }

    public void setResident(String resident) {
        this.resident = resident;
    }

    public String getAge() {
        return age;
    }

    public void setAge(String age) {
        this.age = age;
    }

    public String getmStatus() {
        return mStatus;
    }

    public void setmStatus(String mStatus) {
        this.mStatus = mStatus;
    }

    public String getOccupation() {
        return occupation;
    }

    public void setOccupation(String occupation) {
        this.occupation = occupation;
    }

    public String getNameofspouse() {
        return nameofspouse;
    }

    public void setNameofspouse(String nameofspouse) {
        this.nameofspouse = nameofspouse;
    }

    public String getNoofchildren() {
        return noofchildren;
    }

    public void setNoofchildren(String noofchildren) {
        this.noofchildren = noofchildren;
    }

    public String getNationality() {
        return nationality;
    }

    public void setNationality(String nationality) {
        this.nationality = nationality;
    }

    public String getHometown() {
        return hometown;
    }

    public void setHometown(String hometown) {
        this.hometown = hometown;
    }

    public String getDateofbaptism() {
        return dateofbaptism;
    }

    public void setDateofbaptism(String dateofbaptism) {
        this.dateofbaptism = dateofbaptism;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getTelno() {
        return telno;
    }

    public void setTelno(String telno) {
        this.telno = telno;
    }

    public String getHouseno() {
        return houseno;
    }

    public void setHouseno(String houseno) {
        this.houseno = houseno;
    }

    public String getNameoffchrch() {
        return nameoffchrch;
    }

    public void setNameoffchrch(String nameoffchrch) {
        this.nameoffchrch = nameoffchrch;
    }

    public String getPosinchrch() {
        return posinchrch;
    }

    public void setPosinchrch(String posinchrch) {
        this.posinchrch = posinchrch;
    }

    public String getCardid() {
        return cardid;
    }

    public void setCardid(String cardid) {
        this.cardid = cardid;
    }

    public String getTitheId() {
        return titheId;
    }

    public void setTitheId(String titheId) {
        this.titheId = titheId;
    }

    public byte[] getImage() {
        return image;
    }

    public void setImage(byte[] image) {
        this.image = image;
    }
    
    
 
}
