
<?PHP
	class Paiement{
		private  $idPaiement = null;
		private  $nom_p = null;
		private  $prenom_p = null;
		private  $numcart_p = null;
		private  $prix_p = null;
		private  $mail_p = null;
		
		
		function __construct(string $nom_p, string $prenom_p, string $numcart_p, int $prix_p, string $mail_p){
			
			$this->nom_p=$nom_p;
			$this->prenom_p=$prenom_p;
			$this->numcart_p=$numcart_p;
			$this->prix_p=$prix_p;
			$this->mail_p=$mail_p;
			
		}
		
		function getId(): int{
			return $this->idPaiement;
		}
		function getnom_p(): string{
			return $this->nom_p;
		}
		function getprenom_p(): string{
			return $this->prenom_p;
		}
		function getnumcart_p(): int {
			return $this->numcart_p;
		}
		function getprix_p(): int {
			return $this->prix_p;
		}
		function getmail_p(): string{
			return $this->mail_p;
		}
		
		function setnom_p(string $nom_p): void{
			$this->nom_p=$nom_p;
		}
		function setprenom_p(string $prenom_p): void{
			$this->prenom_p=$prenom_p;
		}
		function setnumcart_p(string $numcart_p): void{
			$this->numcart_p=$numcart_p;
		}
		function setprix_p(string $prix_p): void{
			$this->prix_p=$prix_p;
		}
		function setmail_p(string $mailt_p): void{
			$this->mail_p=$mail_p;
		}
		
	}

?>