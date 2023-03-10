/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package something;

/**
 *
 * @author ogua
 */
public class Product {
    private String name;
    private int age;
    private String country;

     public Product() {
        
    }

    public Product(String country) {
        this.country = country;
    }

    public Product(int age) {
        this.age = age;
    }
    public Product(String name, int age, String country) {
        this.name = name;
        this.age = age;
        this.country = country;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public String getCountry() {
        return country;
    }

    public void setCountry(String country) {
        this.country = country;
    }
    
}
