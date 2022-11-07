
package familyties;

import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;


class TxtOutput {
           
    ArrayList<FamMember> genderNameList = new ArrayList<>(); 


    

    public ArrayList alphabeticalOrder(LinkedList familyList) throws IOException{

            
            FamMember familyMember = familyList.start;
            while (familyMember != null)
            {
               genderNameList.add(familyMember);
               familyMember = familyMember.next;
            
            }
            
            //Bubble Sort
            for (int i = 0; i < genderNameList.size()-1; i++) {
             for (int j= 0; j < genderNameList.size()-i-1; j++) {

                FamMember x = genderNameList.get(j);
                FamMember y = genderNameList.get(j+1);

             
                    if (x.getName().compareTo(y.getName()) > 0) {
                        FamMember temp = x;
                        genderNameList.set(j,y);
                        genderNameList.set(j+1, temp);
                    }  
           
                }
            }
            Scanner input = new Scanner(System.in);
            //Read input for path
            System.out.println("Input where you want to save the file: \n-for example C:\\Users\\Mitsaras\\Desktop");
            String txtFilePath =input.nextLine();
            //Read input for file name
            System.out.println("Input the name you want to give to your file:");
            String txtFileName =input.nextLine();
            //write name and gender from every famMember on the arraylist
            //make txt there
            try (FileWriter writer = new FileWriter(txtFilePath+"\\"+txtFileName+".txt")) {
                //write name and gender from every famMember on the arraylist
                for(int i = 0;i<genderNameList.size();i++){
                    String name=(genderNameList.get(i)).getName();
                    String gender=(genderNameList.get(i)).getGender();
                    writer.write(name+" "+gender+"\n");
                }

                System.out.println(txtFileName+".txt saved.");
                
             }
            catch (FileNotFoundException e) {
                System.out.println(" !-! No such path found !-! : "+txtFilePath);
                
            }
            return genderNameList;
    }
}

