<?PHP
	include "../config.php";
	require_once '../Model/Paiement.php';

	class PaiementC {
		
		function ajouterPaiement($Paiement){
			$sql="INSERT INTO P (nom_p, prenom_p, numcart_p,prix_p,mail_p) 
			VALUES (:nom_p,:prenom_p,:numcart_p, :prix_p, :mail_p)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom_p' => $Paiement->getnom_p(),
					'prenom_p' => $Paiement->getprenom_p(),
					'numcart_p' => $Paiement->getnumcart_p(),
					'prix_p' => $Paiement->getprix_p(),
					'mail_p' => $Paiement->getmail_p(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherPaiement(){
			
			$sql="SELECT * FROM P";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerPaiement($id){
			$sql="DELETE FROM P WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierPaiement($Paiement, $id){
			
			try {
				echo $Paiement->getnom_p();
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE P SET 
						nom_p = :nom_p, 
						prenom_p = :prenom_p,
						numcart_p = :numcart_p,
						prix_p = :prix_p,
						mail_p = :mail_p
						
					WHERE id = :id'
				);
				$query->execute([
					'nom_p' => $Paiement->getnom_p(),
					'prenom_p' => $Paiement->getprenom_p(),
					'numcart_p' => $Paiement->getnumcart_p(),
					'prix_p' => $Paiement->getprix_p(),
					'mail_p' => $Paiement->getmail_p(),	

					'id' => $id
				]);
				echo $query->execute;
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererPaiement($id){
			$sql="SELECT * from P where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererPaiement1($id){
			$sql="SELECT * from P where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>