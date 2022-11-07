
package familyties;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author Matthaios Orestis Markopoulos
 */
public class Main {
        public static void main(String[] args) throws IOException
    {             
        Scanner scan = new Scanner(System.in);
        Scanner scanLine = new Scanner(System.in);
        /* Creating object of class linkedList */
        LinkedList list = new LinkedList(); 
        System.out.println("Menu");          
        boolean exit=false;
        boolean csvImported=false;
        
        ArrayList<FamMember> genderNameList = new ArrayList<>(); 
        //String yOrN = null;
        /*  Perform list operations  */
        do
        {
            System.out.println("\nProgram Operations\n");
            System.out.println("1. Read CSV file (from src folder) and store it");
            System.out.println("2. Sort the names alphabetically and save them in .txt");
            System.out.println("3. Check Relations");
            System.out.println("4. Create .dot file of the family");
            System.out.println("5. Exit");  
            String choice = scan.nextLine();            
            switch (choice)
            {
            case "1" : 
                ReadCSV readCSV = new ReadCSV();
                readCSV.readcsv();
                list=readCSV.familyList;
                csvImported=true;
                break;                          
            case "2" : 
                if(!csvImported){
                    System.out.println("Please read a CSV file first.");
                }
                else{
                TxtOutput txtOutput = new TxtOutput();
                genderNameList=txtOutput.alphabeticalOrder(list);
                }
                break;                         
            case "3" : 
                if(!csvImported){
                    System.out.println("Please read a CSV file first.");
                }
                else
                {
                System.out.println("Enter first name:");
                String firstName = scanLine.nextLine();
                System.out.println("Enter second name:");
                String secondName = scanLine.nextLine();
                list.validation(firstName,secondName);   
                }
                break;
            case "4" : 
                System.out.println("This feature is a DLC content. \n ***Purchase our DOT-GraphViz DLC for 69.99$ ONLY!*** \n **Price may differ for each region**");
                System.out.println("Instead, here is display feature, available in your free version:");
                System.out.println("Press Enter to display");
                scanLine.nextLine() ;
                list.display();
                break;
            case "5" : 
                exit=true;
                break;                          
             default : 
                System.out.println("Wrong Entry \n ");
                break;   
            }
            //exit = true;
        System.out.println("Press Enter to continue");
        scanLine.nextLine() ;

        } while (exit == false);               
    }
}

