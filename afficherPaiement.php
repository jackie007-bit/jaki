<?PHP
	include "../controller/PaiementC.php";

	$PaiementC=new PaiementC();
	$listePaiement=$PaiementC->afficherPaiement();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Paiement </title>
    </head>
    <body>
		<button><a href="FormulairePaiement.php">Ajouter un Paiement</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>nom_p</th>
				<th>prenom_p</th>
				<th>numcart_p</th>
				<th>prix_p</th>
				<th>mail_p</th>
				
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listePaiement as $Paiement){
			?>
				<tr>
					<td><?PHP echo $Paiement['id']; ?></td>
					<td><?PHP echo $Paiement['nom_p']; ?></td>
					<td><?PHP echo $Paiement['prenom_p']; ?></td>
					<td><?PHP echo $Paiement['numcart_p']; ?></td>
					<td><?PHP echo $Paiement['prix_p']; ?></td>
					<td><?PHP echo $Paiement['mail_p']; ?></td>
					
					<td>
						<form method="POST" action="supprimerPaiement.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $Paiement['id']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modif.php?id=<?PHP echo $Paiement['id']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
