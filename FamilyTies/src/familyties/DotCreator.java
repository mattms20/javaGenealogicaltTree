
package familyties;

import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Scanner;


public class DotCreator {

public void createDot(ArrayList<FamMember> genderNameList) throws IOException {
    
    
     try {
   File createDot = new File("Dotname.dot"); 
   if(!createDot.exists()) {
      
           createDot.createNewFile();
   }
   
    PrintWriter pw = new PrintWriter(createDot);
    pw.print(genderNameList);
    pw.close();
     }catch (IOException e) {
           e.printStackTrace();
       }
     
     Scanner DotScanner = new Scanner(System.in);
            //Read input for path
            System.out.println("Input where you want to save the file: \n-for example C:\\Users\\Mitsaras\\Desktop");
            String creatDot1 = DotScanner.nextLine();
            //Read input for file name
            System.out.println("Input the name you want to give to your file:");
            String createDot = DotScanner.nextLine();
   }
    }
    
//}
