<?php 
if(isset($_GET["tuoteryhma"])) $tuoteryhma=$_GET["tuoteryhma"]; 

$host ="magnesium"; 
$user = "16aottok"; 
$pass = "salasana"; 
$dbname = "db16aottok"; 

try  //yritetään ottaa yhteys 
{  
    $yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass); //luo PDO-olion 
}  
catch(PDOException $e) // jos ei onnistu (poikkeus) 
{  
    echo $e->getMessage(); //antaa ilmoituksen siitä, missä virhe 
} 

$sql = "SELECT * FROM tuotteet WHERE Ryhma ='$tuoteryhma'";
$vastaus = $yhteys->prepare($sql); 
$vastaus->execute(); 
$vastaukset = $vastaus->fetchAll(PDO::FETCH_ASSOC); 

echo json_encode($vastaukset);
?>