package com.example.upsaalert.model;

public class Events {
   private String Eventid;
   private String Title;
   private String Description;
   private String Location;
   private String Contact;
   private String datefrm;
   private String timefrm;
   private String image;
   private String cohost;

    public Events() {
    }

    public Events(String eventid, String title, String location, String datefrm, String timefrm, String image, String cohost) {
        Eventid = eventid;
        Title = title;
        Location = location;
        this.datefrm = datefrm;
        this.timefrm = timefrm;
        this.image = image;
        this.cohost = cohost;
    }

    public Events(String eventid, String title, String image) {
        Eventid = eventid;
        Title = title;
        this.image = image;
    }

    public Events(String eventid, String title, String description, String location, String contact, String datefrm, String timefrm, String image, String cohost) {
        Eventid = eventid;
        Title = title;
        Description = description;
        Location = location;
        Contact = contact;
        this.datefrm = datefrm;
        this.timefrm = timefrm;
        this.image = image;
        this.cohost = cohost;
    }

    public String getEventid() {
        return Eventid;
    }

    public void setEventid(String eventid) {
        Eventid = eventid;
    }

    public String getTitle() {
        return Title;
    }

    public void setTitle(String title) {
        Title = title;
    }

    public String getDescription() {
        return Description;
    }

    public void setDescription(String description) {
        Description = description;
    }

    public String getLocation() {
        return Location;
    }

    public void setLocation(String location) {
        Location = location;
    }

    public String getContact() {
        return Contact;
    }

    public void setContact(String contact) {
        Contact = contact;
    }

    public String getDatefrm() {
        return datefrm;
    }

    public void setDatefrm(String datefrm) {
        this.datefrm = datefrm;
    }

    public String getTimefrm() {
        return timefrm;
    }

    public void setTimefrm(String timefrm) {
        this.timefrm = timefrm;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getCohost() {
        return cohost;
    }

    public void setCohost(String cohost) {
        this.cohost = cohost;
    }
}
