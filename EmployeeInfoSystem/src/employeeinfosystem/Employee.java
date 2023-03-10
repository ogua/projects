/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package employeeinfosystem;

/**
 *
 * @author ogua
 */
public class Employee {
    String id;
    String Fname;
    String Lname;
    String Oname;
    int SoSS;
    String pos;
    String dep;
    String Grad;
    Float salary;

    public Employee() {
    }

    public Employee(String id, String Fname, String Lname, String Oname, int SoSS, String pos, String dep, String Grad, Float salary) {
        this.id = id;
        this.Fname = Fname;
        this.Lname = Lname;
        this.Oname = Oname;
        this.SoSS = SoSS;
        this.pos = pos;
        this.dep = dep;
        this.Grad = Grad;
        this.salary = salary;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getFname() {
        return Fname;
    }

    public void setFname(String Fname) {
        this.Fname = Fname;
    }

    public String getLname() {
        return Lname;
    }

    public void setLname(String Lname) {
        this.Lname = Lname;
    }

    public String getOname() {
        return Oname;
    }

    public void setOname(String Oname) {
        this.Oname = Oname;
    }

    public int getSoSS() {
        return SoSS;
    }

    public void setSoSS(int SoSS) {
        this.SoSS = SoSS;
    }

    public String getPos() {
        return pos;
    }

    public void setPos(String pos) {
        this.pos = pos;
    }

    public String getDep() {
        return dep;
    }

    public void setDep(String dep) {
        this.dep = dep;
    }

    public String getGrad() {
        return Grad;
    }

    public void setGrad(String Grad) {
        this.Grad = Grad;
    }

    public Float getSalary() {
        return salary;
    }

    public void setSalary(Float salary) {
        this.salary = salary;
    }
    
    
}
