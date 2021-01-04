<?php
include "../controller/PaiementC.php";
include_once '../Model/Paiement.php';

$PaiementC = new PaiementC();
$error = "";

if (
    isset($_POST["nom_p"]) &&
    isset($_POST["prenom_p"]) &&
    isset($_POST["numcart_p"]) &&
    isset($_POST["prix_p"]) &&
    isset($_POST["mail_p"])

){
    if (
        !empty($_POST["nom_p"]) &&
        !empty($_POST["prenom_p"]) &&
        !empty($_POST["numcart_p"]) &&
        !empty($_POST["prix_p"]) &&
        !empty($_POST["mail_p"])

    ) {
        $Paiement = new Paiement(
            $_POST['nom_p'],
            $_POST['prenom_p'],
            $_POST['numcart_p'],
            $_POST['prix_p'],
            $_POST['mail_p']





        );
        $PaiementC->modifierPaiement($Paiement, $_GET['id']);
        header('refresh:5;url=afficherPaiement.php');
    }
    else
        $error = "Missing information";
}

?>
<html>
<head>
    <title>Modifier Utilisateur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<button><a href="afficherPaiement.php">Retour à la liste</a></button>
<hr>

<div id="error">
    <?php echo $error; ?>
</div>

<?php
if (isset($_GET['id'])){
    $Paiement = $PaiementC->recupererPaiement($_GET['id']);

    ?>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td rowspan='4' colspan='1'>
                    Fiche Personnelle
                </td>
                <td>
                    <label for="id">Id:
                    </label>
                </td>
                <td>
                    <input type="text" name="id" id="id"  value = "<?php echo $Paiement['idPaiement']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom_p">nom_p:
                    </label>
                </td>
                <td>
                    <input type="text" name="nom_p" id="nom_p" maxlength="20" value = "<?php echo $Paiement['nom_p']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom_p">prenom_p:
                    </label>
                </td>
                <td><input type="text" name="prenom_p" id="prenom_p" maxlength="20" value = "<?php echo $Paiement['prenom_p']; ?>"></td>
            </tr>

            <tr>
                <td>
                    <label for="numcart_p">numcart_p:
                    </label>
                </td>
                <td>
                    <input type="text" name="numcart_p" id="numcart_p"  value = "<?php echo $Paiement['numcart_p']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prix_p">prix_p:
                    </label>
                </td>
                <td>
                    <input type="number" name="prix_p" id="prix_p"  value = "<?php echo $Paiement['prix_p']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mail_p">mail_p:
                    </label>
                </td>
                <td>
                    <input type="text" name="mail_p" id="mail_p"  value = "<?php echo $Paiement['mail_p']; ?>">
                </td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Modifier" name = "modifer">
                </td>
                <td>
                    <input type="reset" value="Annuler" >
                </td>
            </tr>
        </table>
    </form>
    <?php
}
?>
</body>
</html>