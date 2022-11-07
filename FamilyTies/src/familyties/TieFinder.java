/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package familyties;


/**
 *
 * @author Matthaios Orestis Markopoulos
 */
class TieFinder {
    
    private boolean isTypeFound;
    private String tieType;
    
    //Finds Ties between the two names (checking one by one each possible relation)
    public void findTies(FamMember firstFam,FamMember secondFam){
        isTypeFound=false;


            isSon(firstFam,secondFam);
            isHusband(firstFam,secondFam);
            isWife(firstFam,secondFam);
            isDaugther(firstFam,secondFam);
            isFather(firstFam,secondFam);
            isMother(firstFam,secondFam);
            isBrother(firstFam,secondFam);
            isSister(firstFam,secondFam);
            isGrandson(firstFam,secondFam);
            isGranddaughter(firstFam,secondFam);
            isGrandfather(firstFam,secondFam);
            isGrandmother(firstFam,secondFam);
            isAunt(firstFam,secondFam);
            isUncle(firstFam,secondFam);
            isAnipsia(firstFam,secondFam);
            isAnipsios(firstFam,secondFam);
            isCousin(firstFam,secondFam);
            isFCousin(firstFam,secondFam);
            
            if(isTypeFound==false) //no relation found
                        System.out.println("No relations found between "+firstFam.getName()+" "+"and"+" "+secondFam.getName());
            else //relation found
        System.out.println(firstFam.getName()+" "+tieType+" "+secondFam.getName());
    }
    
    //checks if 1st is Hunsband to 2nd
    public void isHusband(FamMember firstFam,FamMember secondFam){
         if(firstFam.getGender().equals("MAN"))
         {
             if(firstFam.getSpouce()!=null){
                if(firstFam.getSpouce().equals(secondFam.getName()))
                    {
                        tieType="husband";
                        isTypeFound=true;
                    }
             }
         }
     }
    //checks if 1st is Wife to 2nd
    public void isWife(FamMember firstFam,FamMember secondFam){
         if(firstFam.getGender().equals("WOMAN"))
         {
             if(firstFam.getSpouce()!=null){
                if(firstFam.getSpouce().equals(secondFam.getName()))
                    {
                        tieType="wife";
                        isTypeFound=true;
                    }
             }
         }
     }
        //checks if 1st is son to 2nd
    public void isSon(FamMember firstFam,FamMember secondFam){
         if(firstFam.getGender().equals("MAN"))
         {
             if(firstFam.getFather()!=null){
                if(firstFam.getFather().equals(secondFam.getName()))
                    {
                        tieType="son";
                        isTypeFound=true;
                    }
             }
             if(firstFam.getMother()!=null){
                if(firstFam.getMother().equals(secondFam.getName()))
                     {
                         tieType="son";
                         isTypeFound=true;
                     }
             }
         }
     }
     //checks if 1st is daughter to 2nd
    public void isDaugther(FamMember firstFam,FamMember secondFam){
      if(firstFam.getGender().equals("WOMAN"))
      {
        if(firstFam.getMother()!=null){
          if(firstFam.getMother().equals(secondFam.getName()))
              {
                  tieType="daughter";
                  isTypeFound=true;
              }
        }
        if(firstFam.getFather()!=null){
            if(firstFam.getFather().equals(secondFam.getName()))
                 {
                    tieType="daughter";
                    isTypeFound=true;
                }
        }
      }
     }   
    //checks if 1st is father to 2nd
    public void isFather(FamMember firstFam,FamMember secondFam){
      if(firstFam.getGender().equals("MAN"))
      {
        if(secondFam.getFather()!=null){
          if(firstFam.getName().equals(secondFam.getFather()))
              {
                  tieType="Father";
                  isTypeFound=true;
              }
        }
      }
    }   
    //checks if 1st is mother to 2nd
    public void isMother(FamMember firstFam,FamMember secondFam){
      if(firstFam.getGender().equals("WOMAN"))
      {
        if(secondFam.getMother()!=null){
          if(firstFam.getName().equals(secondFam.getMother()))
              {
                  tieType="Mother";
                  isTypeFound=true;
              }
        }
      }
    }   
    //checks if 1st is grandson to 2nd
    public void isGrandson(FamMember firstFam,FamMember secondFam){
      if(firstFam.getGender().equals("MAN"))
      {
        if(firstFam.getGrandparents()!=null){
          if((firstFam.getGrandparents()).contains(secondFam.getName()))
              {
                  tieType="Grandson";
                  isTypeFound=true;
              }
        }
      }
    }   
    //checks if 1st is granddaughter to 2nd
    public void isGranddaughter(FamMember firstFam,FamMember secondFam){
      if(firstFam.getGender().equals("WOMAN"))
      {
        if(firstFam.getGrandparents()!=null){
          if((firstFam.getGrandparents()).contains(secondFam.getName()))
              {
                  tieType="Granddaughter";
                  isTypeFound=true;
              }
        }
      }
    }   
    //checks if 1st is grandma to 2nd
    public void isGrandmother(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("WOMAN"))
      {
        if(firstFam.getGrandchildren()!=null){
          if((firstFam.getGrandchildren()).contains(secondFam.getName()))
              {
                  tieType="grandmother";
                  isTypeFound=true;
              }
        }
      }
    }
    //checks if 1st is grandpa to 2nd
    public void isGrandfather(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("MAN"))
        {
            if(firstFam.getGrandchildren()!=null){
              if((firstFam.getGrandchildren()).contains(secondFam.getName()))
                  {
                      tieType="grandfather";
                      isTypeFound=true;
                  }
            }
        }
    }
    //checks if 1st is aunt to 2nd
    public void isAunt(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("WOMAN"))
        {
        if(firstFam.getAnipsia()!=null){
          if((firstFam.getAnipsia()).contains(secondFam.getName()))
              {
                  tieType="aunt";
                  isTypeFound=true;
                  
              }
        }
          
        }
    }
    //checks if 1st is uncle to 2nd
    public void isUncle(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("MAN"))
        {
        if(firstFam.getAnipsia()!=null){
          if((firstFam.getAnipsia()).contains(secondFam.getName()))
              {
                  tieType="uncle";
                  isTypeFound=true;
                  
              }
        }
          
        }
    }
    //checks if 1st is anipsia to 2nd
        public void isAnipsia(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("WOMAN"))
        {
        if(firstFam.getUncleAunts()!=null){
          if((firstFam.getUncleAunts()).contains(secondFam.getName()))
              {
                  tieType="anipsia";
                  isTypeFound=true;
                  
              }
        }
          
        }
    }
    //checks if 1st is anipsios to 2nd
    public void isAnipsios(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("MAN"))
        {
        if(firstFam.getUncleAunts()!=null){
          if((firstFam.getUncleAunts()).contains(secondFam.getName()))
              {
                  tieType="anipsios";
                  isTypeFound=true;
                  
              }
        }
          
        }
    }
        //checks if 1st is brother to 2nd
     public void isBrother(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("MAN"))
        {
          
        if(firstFam.getSiblings()!=null){
          if((firstFam.getSiblings()).contains(secondFam.getName()))
              {
                  tieType="brother";
                  isTypeFound=true;
                  
              }
        }
        }
    }
     //checks if 1st is sister to 2nd
    public void isSister(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("WOMAN"))
        {
          
        if(firstFam.getSiblings()!=null){
          if((firstFam.getSiblings()).contains(secondFam.getName()))
              {
                  tieType="sister";
                  isTypeFound=true;
                  
              }
        }
          
        }
    }   
    //checks if 1st is cousin to 2nd
    public void isCousin(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("MAN"))
        {        
            if(firstFam.getCousins()!=null){
            
        
                if((firstFam.getCousins()).contains(secondFam.getName()))
                {
                  tieType="male cousin";
                  isTypeFound=true;
                  
                }
             }
        }
    }
      //checks if 1st is female cousin to 2nd  
    public void isFCousin(FamMember firstFam,FamMember secondFam){
        if(firstFam.getGender().equals("WOMAN"))
        {
          
            if(firstFam.getCousins()!=null){
                if((firstFam.getCousins()).contains(secondFam.getName()))
                {
                  tieType="female cousin";
                  isTypeFound=true;
                  
                }
            }
        }
    }
    

}
