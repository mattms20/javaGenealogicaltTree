<?php



session_start();

if(isset($_SESSION['username']))
{
	require "user.php";
	$usr1= new User();
	$usr1->username = $_SESSION['username'];
	$usr1->type = $_SESSION['utype'];	
}
else
{
	header("location:login.php");
}
//

?>
<!DOCTYPE html>
<!--Aρχική σελίδα ιστότοπου όταν έχει γίνει login-->

<head>
  <title>Welcome <?php echo $usr1->username;?></title>

</head>

<html>
<head>

  <style>
  img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 700px;
  height: auto;
}


p2
{font-weight: bold;
}
p1{

  font-style: italic;

}
  </style>
</head>
<body>

<?php
//$helloUser=$usr1->username;
$page = "menu";
include "header.html";
include "menu2.php";

?>
<div align="center">
 <p>The Theater Mparmpamitsos Kourelas presents the show:</p>
<img src="images/yiayia2a.png"  alt="yiayia">
<h2>"Who let the kotes out?"</h2>
 <p>A story which follows Kostaina and her fellow koumpares</p>
  <p>as they are trying to find out the mysterious case of who stole their beloved chicken "Kloklo".</p>
  <p>Strange happenings ..eh happens during their investigation and many questions arise, like:</p>
  <p>Why is the oven on???</p>
  <p>Why is Labroula's child black??? She cheated for sure!</p>
  <p>Where is my medicine?</p>
  <p>Why are you torturing me, my Holy Mary?</p>
  <p>How do you drink your coffee Vasoula?</p>
  <p>Where is my medicine?</p>
  <p>Did you take your zacket my son?
   <p>What did you say? Speack louder, as i'm experiencing hearing issues and having trouble hearing your disqusting voice, you puta-</p>
   <p>Where is my medicine?</p>
   
      <p>Find the answers to most of these questions in the best thriller show of the century, ouuu mhn sou pw xilietias</p>
	  <br>
	  <h4>Actors:</h3>
	  <p2>Kostaina: </p2> <p>Kostaina Papalampraina</p> 
	  <p2>Giannoula: </p2> <p>Giannoula Makropoulou</p>
	  <p2>Giwrgaina: </p2> <p>Giwrgaina the famous</p>
	  <p2>Alekos o Mpakalhs: </p2> <p>Αλέξης Τσίπρας</p>
	  <p2>and many more</p2><br>
	  <br>
	  <p2>Director: </p2> <p>Mitsos Takhs</p>
	  <br>
	  <h4>Critics say:</h4>
	  <p2>Tasoula Lemonia: </p2> <p1>"Μπράβο τα παιδιά! Ωραία παράσταση, αλλα πολύ gore βρε παιδί μου"</p1> <p2>4/5 &#9734;</p2>
	  <br>
	  <p2>Kitsos the husband of Kostaina: </p2> <p1>"Δεν τις μπορω αυτές τις αμερικανιές"</p1> <p2>1/5 &#9734;</p2>
	  <br>
	  <p2>Nikolas the Barber: </p2> <p1>"Tι να σου πω βρε παιδί μ; Δεν την είδα."</p1> <p2>5/5 &#9734;</p2>
	  	  <br>
	  <p2>Mitsaina the Widdow: </p2> <p1>"Ε; τι; Ποιουνου εισαι εσύ;"</p1> <p2>?/5 &#9734;</p2>
	  	  <br>
	  <p2>Pater Michail: </p2> <p1>"Διαβόλου πράματα!"</p1> <p2>4/5 &#9734;</p2>
	  	  	  <br>
	  <p2>Sakis Rouvas: </p2> <p1>"Τελικά ήταν όλοι έτοιμοι..., και απίστευτο ε? Δεν τους κόστισε 215.000"</p1> <p2>4/5 &#9734;</p2>
	  	  	  	  <br>
	  <p2>Vounohori Times: </p2> <p1>"Ρεκόρ πωλήσεων στο καφενείο του Γέρου Λάκη, μυστική η συνταγή του νέου καφέ "Fredotsino Kokotsino" εμπνευσμένη απο την νέα παράσταση του χωριού!"</p1> <p2>5/5 &#9734;</p2>
	  	  	  	  	  <br>
	  <p2>H Mpetoula: </p2> <p1>"Sexy, εκθαμβωτική γεμάτη πάθυος παράστασης, με σασπένς και δράμα που θα συναρπάσει τον κόσμο της εμφυλίου, ιενα shoουw μόνο για δυνατούς χαρακτήρες, θα κάνει πατεράδες να κλάψουν και μανάδες να λιπυοθυμούνε. Εκρίνω! Αξίζει το φετινό βραβείου Ούσκαρ!"</p1> <p2>5/5 &#9734;</p2>
	  	  	  	  	  	  <br>
	  <p2>Paoulina: </p2> <p1>"Ντεν ξιέρω δεν κατάλαμπα πολλά, με ενοχλουσε κι ο μπαρμπαΛεωνιντας απο δίπλα, προστιχος"</p1> <p2>3/5 &#9734;</p2>
	  	  	  	  	  	  <br>
	  <p2>Jimmys: </p2> <p1>"Πολύ κριντζ ρε φιλεεε, λολ"</p1> <p2>1/5 &#9734;</p2>
	  <br>
	  
</div>
<br>
</body>
</html>


