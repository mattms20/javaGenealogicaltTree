
package familyties;


import java.io.*; 
import java.util.ArrayList;
import java.util.List;


public class ReadCSV {

    
    LinkedList familyList= new LinkedList();
    
    public void readcsv() {
       
        String File = "src\\csv.csv";
        BufferedReader reader = null;
        String line= "";
        List<String> list=new ArrayList<>();  

        
        try {
            reader = new BufferedReader (new FileReader(File));
            while ((line= reader.readLine()) != null){
                list.add(line);
                
                String[] row = line .split(",");
                for (String index : row){
                    System.out.printf("%-20s", index);
                }
                System.out.println();
            }
             System.out.println("The CSV file is now stored.");   
            }
        
        catch(Exception e){
    e.printStackTrace();
    }
    finally {
    try {
        reader.close();
    }
    catch (IOException e) {
        e.printStackTrace();
      }
     }
        for(int i=0;i<list.size();i++){
       familyList.insertFamMemberFromCSV(list.get(i)); 
       }
        
        familyList.findFamily();
        //familyList.display();
   }
    
    //public LinkedList takeList() {
 }