package familyties;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

/**
 *
 * @author Matthaios Orestis Markopoulos
 */


/* Class linkedList */
class LinkedList
{
    protected FamMember start;
    protected FamMember end ;
    protected int size ;
    
    private FamMember firstFam;
    private FamMember secondFam;
    

    ArrayList<FamMember> genderNameList = new ArrayList<>(); 
 
    /*  Constructor  */
    public LinkedList()
    {
        start = null;
        end = null;
        size = 0;
    }
    /*  Function to check if list is empty  */
    public boolean isEmpty()
    {
        return start == null;
    }
    /*  Function to get size of list  */
    public int getSize()
    {
        return size;
    }    
    
    /*  Function to insert an element*/
    public void insertFamMember(String name,String gender,String father,String mother,String spouce)
    {
        FamMember famMember = new FamMember(null,name,gender,father,mother,spouce);    
        size++ ;    
        if(start == null) 
        {
            start = famMember;
            end = start;
        }
        else 
        {
            end.setNext(famMember);
            end = famMember;
        }
    }
    /*  Function to insert an element from CSV line*/
    public void insertFamMemberFromCSV(String line)
    {
        List<String> elements=new ArrayList<>(); 
        
        String[] row = line .split(",");
        int i=0;
            for (String index : row){
                elements.add(i,index);
                i++;
            }
        
            
        if ((elements.get(1)).equals("MAN")||(elements.get(1)).equals("WOMAN"))
        {
            FamMember f=search(elements.get(0)); 
            if(f!=null)
                f.setGender(elements.get(1));
            
            else{
                FamMember famMember = new FamMember(null,elements.get(0),elements.get(1),null,null,null);    
                size++ ;    
                if(start == null) 
                {
                    start = famMember;
                    end = start;
                }
                else 
                {
                    end.setNext(famMember);
                    end = famMember;
                }
                
            }

        }
        
        if(elements.get(1).equals("FATHER"))
        {
            FamMember f=search(elements.get(2)); 
            if(f!=null)
            f.setFather(elements.get(0));
            else
            {
                FamMember famMember = new FamMember(null,elements.get(2),null,elements.get(0),null,null);    
                size++ ;    
                if(start == null) 
                {
                    start = famMember;
                    end = start;
                }
                else 
                {
                    end.setNext(famMember);
                    end = famMember;
                }
                
            }

        }
        
        if(elements.get(1).equals("MOTHER"))
        {
            FamMember f=search(elements.get(2)); 
            if(f!=null)
            f.setMother(elements.get(0));
            else
            {
                FamMember famMember = new FamMember(null,elements.get(2),null,null,elements.get(0),null);    
                size++ ;    
                if(start == null) 
                {
                    start = famMember;
                    end = start;
                }
                else 
                {
                    end.setNext(famMember);
                    end = famMember;
                }
                
            }

        }
        
        if((elements.get(1)).equals("HUSBAND")||(elements.get(1)).equals("WIFE"))
        {
            FamMember f=search(elements.get(2)); 
            if(f!=null){
            f.setSpouce(elements.get(0));
            //System.out.println("\n"+f.getName()+" "+f.getSpouce()+"\n");
            }
            else
            {
                FamMember famMember = new FamMember(null,elements.get(2),null,null,null,elements.get(0));    
                size++ ;    
                if(start == null) 
                {
                    start = famMember;
                    end = start;
                }
                else 
                {
                    end.setNext(famMember);
                    end = famMember;
                }
                

            }
        
        }

    }
    /*  Function to display LinkedList*/
    public void display()
    {

        FamMember ptr = start;
        while (ptr != null)
        {
            System.out.println(ptr.getName()+" _Gender_: "+ptr.getGender()+" _Father_: "+ptr.getFather()+" _Mother_: "+ptr.getMother()+" _Spouce_: "+ptr.getSpouce()+"->");
            ptr = ptr.getNext();
        }

        
    }
    /*  Function to search FamMember(Node) from name in LinkedList*/
    public FamMember search(String name)
    {
        FamMember current = start;    //Initialize current
        while (current != null)
        {
            if ((current.getName()).equals(name)){
                FamMember TempFam=current;
                return TempFam; }   //data found
            current = current.next;
        }
        return null;    //data not found
    }
    
    //Checks whether the first name is present in linked list
    public boolean searchFirst(String firstName)
    {
        FamMember current = start;    //Initialize current
        while (current != null)
        {
            if ((current.getName()).equals(firstName)){
                firstFam=current;
                return true; }   //data found
            current = current.next;
        }
        return false;    //data not found
    }
    
    //Checks whether the second name is present in linked list
    public boolean searchSecond(String secondName)
    {
        FamMember current = start;    //Initialize current
        while (current != null)
        {
            if ((current.getName()).equals(secondName)){
                secondFam=current;
                return true; }   //data found
            current = current.next;
        }
        return false;    //data not found
    }
    
    //Checks if names that are given exist in linked list
    public void validation(String firstName,String secondName){
        if(searchFirst(firstName.toUpperCase())&&searchSecond(secondName.toUpperCase()))
        {
            firstFam=search(firstName.toUpperCase());
            secondFam=search(secondName.toUpperCase());
            TieFinder tieFinder= new TieFinder();
            tieFinder.findTies(firstFam,secondFam);

        }
        else if(firstName.toUpperCase().equals(secondName.toUpperCase()))
        {
            System.out.println("Shocking... They are the same person, please try again.");
        }
        else
        {
            System.out.println("Names are wrong, please try again.");
        }
    }
    

    //function finding rest of family (beyond father, mother, spouce)
    public void findFamily()
    {
        FamMember f = start;    //Initialize current
        while (f != null)
        {
            findChildren(f);

            f = f.next;

        }
         f = start;
        while (f != null)
        {
            findSiblings(f);
            f = f.next;
        }
        f = start;
        while (f != null)
        {
            findGrandparents(f);
            f = f.next;
        }
        f = start;
        while (f != null)
        {
            findGrandchildren(f);
            f = f.next;
        }
        f = start;
        while (f != null)
        {
            findUncleAunt(f);
            f = f.next;
        }
        f = start;
        while (f != null)
        {
            findAnipsia(f);
            f = f.next;
        }
        f = start;

        while (f != null)
        {
            findCousins(f);
            f = f.next;
        }

    }
    //function to find and add male and female children to FamMember
    public void findChildren(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {
                if(f!=ptr){
                    if((ptr.getMother())!=null){
                        if((ptr.getMother()).equals(f.getName()))
                        {
                            f.setChildren(ptr.getName());

                        }
                    }
                    if((ptr.getFather())!=null){
                        if((ptr.getFather()).equals(f.getName()))
                        {
                            f.setChildren(ptr.getName());

                        }
                    }
                }
                ptr = ptr.getNext();
            }
        }   
        //function to find and add male and female siblings to FamMember
    public void findSiblings(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {
                if(f!=ptr){
                    if((ptr.getMother())!=null&&f.getMother()!=null){
                        if((ptr.getMother()).equals(f.getMother()))
                        {
                            f.setSiblings(ptr.getName());

                        }
                    }
                    else if((ptr.getFather())!=null&&f.getFather()!=null){
                        if((ptr.getFather()).equals(f.getFather()))
                        {
                            f.setSiblings(ptr.getName());

                        }
                    }
                }
                ptr = ptr.getNext();
            }
        } 
        //function to find and add male and female grandparents to FamMember
    public void findGrandparents(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {
                if(f!=ptr){
                    if(f.getMother()!=null){
                        if((search(f.getMother())).getMother()!=null)
                        {
                            if(((search(f.getMother())).getMother()).equals(ptr.getName()))
                                f.setGrandparents(ptr.getName());
                        }
                         if((search(f.getMother())).getFather()!=null)
                        {
                            if(((search(f.getMother())).getFather()).equals(ptr.getName()))
                                f.setGrandparents(ptr.getName());
                        }
                    }
                    if(f.getFather()!=null){
                        if((search(f.getFather())).getFather()!=null)
                        {
                            if(((search(f.getFather())).getFather()).equals(ptr.getName()))
                                f.setGrandparents(ptr.getName());
                        }
                         if((search(f.getFather())).getMother()!=null)
                        {
                            if(((search(f.getFather())).getMother()).equals(ptr.getName()))
                                f.setGrandparents(ptr.getName());
                        }
                    }
                }

                ptr = ptr.getNext();
            }
        }
        //function to find and add uncle and aunts to FamMember
    public void findUncleAunt(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {
                if(f!=ptr){
                    if(f.getFather()!=null){
                        for (int i = 0; i<((search(f.getFather())).getSiblings()).size();i++){

                            if ((((search(f.getFather())).getSiblings()).get(i)).equals(ptr.getName()))
                            {

                                f.setUncleAunts(ptr.getName());

                            }
                        }
                    }
                    if(f.getMother()!=null){
                        for (int i = 0; i<((search(f.getMother())).getSiblings()).size();i++){
                            if ((((search(f.getMother())).getSiblings()).get(i)).equals(ptr.getName()))
                            {
                                f.setUncleAunts(ptr.getName());

                            }
                        }
                    }
                }
                ptr = ptr.getNext();
            }
        }
        //function to find and add male and female grandchildren to FamMember
    public void findGrandchildren(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {

                if(f!=ptr){
                    for(int i=0;i<((ptr.getGrandparents()).size());i++){
                    
                        if(((ptr.getGrandparents()).get(i)).equals(f.getName()))
                            f.setGrandchildren(ptr.getName());
                    }
                }

                ptr = ptr.getNext();
            }
        }
        //function to find and add male and female cousins to FamMember
    public void findCousins(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {
                if(f!=ptr){
                    if((f.getFather())!=null){
                        for(int i=0;i<((f.getUncleAunts()).size());i++){
                            for(int v=0;v<(((search((f.getUncleAunts()).get(i))).getChildren()).size());v++){
                                if ((((search((f.getUncleAunts()).get(i))).getChildren()).get(v)).equals(ptr.getName()))
                                {
                                    f.setCousins(ptr.getName());


                                }
                            }
                        }
                    }
                    if((f.getMother())!=null){
                        for(int i=0;i<((f.getUncleAunts()).size());i++){
                            for(int v=0;v<(((search((f.getUncleAunts()).get(i))).getChildren()).size());v++){
                                if ((((search((f.getUncleAunts()).get(i))).getChildren()).get(v)).equals(ptr.getName()))
                                {
                                    f.setCousins(ptr.getName());


                                }
                            }
                        }
                    }
                }
            ptr = ptr.getNext();
            }
        }
        //function to find and add male and female anipsia to FamMember
    public void findAnipsia(FamMember f)
        {
            FamMember ptr = start;

            while (ptr!= null)
            {
                if(f!=ptr){
                    for(int i=0;i<((ptr.getUncleAunts()).size());i++){
                            if (((ptr.getUncleAunts()).get(i)).equals(f.getName()))
                            {
                                f.setAnipsia(ptr.getName());
                            }

                    }
                }
                ptr = ptr.getNext();

            }
        }
    

   
}

        
        
        
    
    /*  Function to insert an element at end  
    public void insertAtEnd(String name,String gender,String father,String mother)
    {
        FamMember famMember = new FamMember(name,gender,father,mother,null); 
        size++ ;    
        if(start == null) 
        {
            start = famMember;
            end = start;
        }
        else 
        {
            end.setLink(famMember);
            end = famMember;
        }
    }
    /*  Function to insert an element at position  */
   /* public void insertAtPos(String name,String gender,String father,String mother, int pos)
    {
        FamMember famMember = new FamMember(name,gender,father,mother,null); 
        FamMember ptr = start;
        pos = pos - 1 ;
        for (int i = 1; i < size; i++) 
        {
            if (i == pos) 
            {
                FamMember tmp = ptr.getLink() ;
                ptr.setLink(famMember);
                famMember.setLink(tmp);
                break;
            }
            ptr = ptr.getLink();
        }
        size++ ;
    }*/
    /*  Function to delete an element at position  */
   /* public void deleteAtPos(int pos)
    {        
        if (pos == 1) 
        {
            start = start.getLink();
            size--; 
            return ;
        }
        if (pos == size) 
        {
            FamMember s = start;
            FamMember t = start;
            while (s != end)
            {
                t = s;
                s = s.getLink();
            }
            end = t;
            end.setLink(null);
            size --;
            return;
        }
        FamMember ptr = start;
        pos = pos - 1 ;
        for (int i = 1; i < size - 1; i++) 
        {
            if (i == pos) 
            {
                FamMember tmp = ptr.getLink();
                tmp = tmp.getLink();
                ptr.setLink(tmp);
                break;
            }
            ptr = ptr.getLink();
        }
        size-- ;
    }   
}*/
    /*  Function to display elements  */
   /* public void display()
    {
        System.out.print("\nSingly Linked List = ");
        if (size == 0) 
        {
            System.out.print("empty\n");
            return;
        }    
        if (start.getLink() == null) 
        {
            System.out.println(start.getData() );
            return;
        }
        Node ptr = start;
        System.out.print(start.getData()+ "->");
        ptr = start.getLink();
        while (ptr.getLink() != null)
        {
            System.out.print(ptr.getData()+ "->");
            ptr = ptr.getLink();
        }
        System.out.print(ptr.getData()+ "\n");
    }*/

    /*  Function to reverse the order of elements  */
   /* public void reverseList()
    {
        // id list size is smaller than 2 then there is son need to be reversed
        if (size <= 1)
        {
        return;
        }
        
        //else reverse it
        else
        {
            //creating variables to help with the sorting
            Node prev = null;
            Node next = null;
            Node current = start;
            
            end=start;
            while (current!= null)
                {
                    next=current.getLink();
                    current.setLink(prev);
                    prev=current;
                    current = next;
                }
            start = prev;   
        }

    }
}*/
 
/*  Class SinglyLinkedList  */
