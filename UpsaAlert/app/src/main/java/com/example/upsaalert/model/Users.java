package com.example.upsaalert.model;

public class Users {
    private String id;
    private String username;
    private String studentid;
    private String imageurl;
    public String email;
    public String token;

    public Users() {

    }

    public Users(String id, String username, String studentid, String imageurl) {
        this.id = id;
        this.username = username;
        this.studentid = studentid;
        this.imageurl = imageurl;
    }

    public Users(String email, String token) {
        this.email = email;
        this.token = token;
    }

    public Users(String id, String username, String studentid, String imageurl, String email, String token) {
        this.id = id;
        this.username = username;
        this.studentid = studentid;
        this.imageurl = imageurl;
        this.email = email;
        this.token = token;
    }

    public Users(String imageurl) {
        this.imageurl = imageurl;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getStudentid() {
        return studentid;
    }

    public void setStudentid(String studentid) {
        this.studentid = studentid;
    }

    public String getImageurl() {
        return imageurl;
    }

    public void setImageurl(String imageurl) {
        this.imageurl = imageurl;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        this.token = token;
    }
}
