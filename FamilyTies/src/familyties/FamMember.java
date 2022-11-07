package familyties;

/**
 *
 * @author Matthaios Orestis Markopoulos
 */

import java.util.ArrayList;

//node that will contain a family member's info and relatives' names
class FamMember
{
    public FamMember next;
    public String name;
    public String gender;
    public String father;
    public String mother;
    public String spouce;
    public ArrayList <String> children= new ArrayList<>();
    public ArrayList <String> uncleAunts= new ArrayList<>();
    public ArrayList <String> grandparents= new ArrayList<>();
    public ArrayList <String> grandchildren= new ArrayList<>();
    public ArrayList <String> cousins= new ArrayList<>();
    public ArrayList <String> anipsia= new ArrayList<>();
    public ArrayList <String> siblings= new ArrayList<>();
    LinkedList famList = new LinkedList();
    
 
    /* default Constructor  */
    public FamMember()
    {
        this.children = new ArrayList<>();
        next = null;
        name = null;
        gender = null;
        father = null;
        mother = null;
        spouce = null;
        //childerns=null;
    }    
    /*  Constructor  */
    public FamMember(FamMember next,String name,String gender,String father,String mother,String spouce)
    {
        this.children = new ArrayList<>();
        this.next=next;
        this.name = name;
        this.gender = gender;
        this.father = father;
        this.mother = mother;
        this.spouce = spouce;

    }    

    public FamMember getNext() {
        return next;
    }

    public void setNext(FamMember next) {
        this.next = next;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public String getFather() {
        return father;
    }

    public void setFather(String father) {
        this.father = father;
    }

    public String getMother() {
        return mother;
    }

    public void setMother(String mother) {
        this.mother = mother;
    }

    public String getSpouce() {
        return spouce;
    }

    public void setSpouce(String spouce) {
        this.spouce = spouce;
    }

    public ArrayList<String> getChildren() {
        return children;
    }

    public void setChildren(String child) {
        (this.children).add(child);
    }

    public ArrayList<String> getUncleAunts() {
        return uncleAunts;
    }

    public void setUncleAunts(String uncleAunt) {
        (this.uncleAunts).add(uncleAunt);
    }

    public ArrayList<String> getGrandparents() {
        return grandparents;
    }

    public void setGrandparents(String grandparent) {
        (this.grandparents).add(grandparent);
    }

    public ArrayList<String> getCousins() {
        return cousins;
    }

    public void setCousins(String cousin) {
        (this.cousins).add(cousin);
    }

    public ArrayList<String> getAnipsia() {
        return anipsia;
    }

    public void setAnipsia(String anipsi) {
        (this.anipsia).add(anipsi);
    }

    public ArrayList<String> getSiblings() {
        return siblings;
    }

    public void setSiblings(String sibling) {
        (this.siblings).add(sibling);
    }

    public ArrayList<String> getGrandchildren() {
        return grandchildren;
    }

    public void setGrandchildren(String grandchildren) {
        (this.grandchildren).add(grandchildren);
    }



}
