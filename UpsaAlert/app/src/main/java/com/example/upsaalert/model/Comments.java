package com.example.upsaalert.model;

public class Comments {
    private String id;
    private String Eventid;
    private String Fullname;
    private String Cmsg;
    private String Commentdate;
    private String images;

    public Comments() {
    }

    public Comments(String id, String eventid, String fullname, String cmsg, String commentdate, String images) {
        this.id = id;
        Eventid = eventid;
        Fullname = fullname;
        Cmsg = cmsg;
        Commentdate = commentdate;
        this.images = images;
    }

    public Comments(String eventid, String fullname, String cmsg, String commentdate, String images) {
        Eventid = eventid;
        Fullname = fullname;
        Cmsg = cmsg;
        Commentdate = commentdate;
        this.images = images;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getEventid() {
        return Eventid;
    }

    public void setEventid(String eventid) {
        Eventid = eventid;
    }

    public String getFullname() {
        return Fullname;
    }

    public void setFullname(String fullname) {
        Fullname = fullname;
    }

    public String getCmsg() {
        return Cmsg;
    }

    public void setCmsg(String cmsg) {
        Cmsg = cmsg;
    }

    public String getCommentdate() {
        return Commentdate;
    }

    public void setCommentdate(String commentdate) {
        Commentdate = commentdate;
    }

    public String getImages() {
        return images;
    }

    public void setImages(String images) {
        this.images = images;
    }
}
