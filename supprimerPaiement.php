<?PHP
	include "../controller/PaiementC.php";

	$PaiementC=new PaiementC();
	
	if (isset($_POST["id"])){
		$PaiementC->supprimerPaiement($_POST["id"]);
		header('Location:afficherPaiement.php');
	}

?>