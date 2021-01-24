<?php
$link = mysqli_connect("localhost", "root", "", "characters");


if(!isset($_GET['pag'])) $_GET['pag'] = '';
switch($_GET['pag']) {

case '':
echo '<form name="cauta" action="cauta.php?pag=cauta" method="post">
     <input type="text" name="cauta" value=""input-lg" name="name" type="tara"placeholder="COUNTRY" data-validate="validate(required, tata)" required="required">  <button type="submit" class="btn btn-success btn-lg">GO!</button>  <br>
	  
	  </form>';
break;

case 'cauta':

if($_POST['cauta'] == '') {
echo 'Introdu un cuvant pentru a cauta in baza de date. <br>
      Apasa <a href="cauta.php">aici</a> pentru a te intoarce.';
} elseif(strlen($_POST['cauta']) < 3) {
echo 'Cuvantul trebuie sa contina cel putin 3 caractere. <br>
      Apasa <a href="cauta.php">aici</a> pentru a te intoarce.';
} else {
$cerereSQL = 'SELECT * FROM `characters` WHERE `name` LIKE "%'.htmlentities($_POST['cauta']).'%"'; 
$rezultat = mysqli_query($link,$cerereSQL);
if(mysqli_num_rows($rezultat) > 0) {
	while($rand = mysqli_fetch_array($rezultat))	{
	
	
	
    echo ' '.$rand['name'].'<br> <i>'.$rand['details'].'</i> <i>';
	}   
} else {
echo 'Nu au fost gasite rezultate pentru cautarea: <font color="red"><b><i>'.htmlentities($_POST['cauta']).'</i></b></font> <br>
	  ';
}

}

break;

}
?>