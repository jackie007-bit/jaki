<?php
    include_once '../Model/Paiement.php';
    include_once '../Controller/PaiementC.php';

    $error = "";

    // create user
    $Paiement = null;

    // create an instance of the controller
    $PaiementC = new PaiementC();
    if (
        isset($_POST["nom_p"]) && 
        isset($_POST["prenom_p"]) &&
        isset($_POST["numcart_p"]) &&
        isset($_POST["prix_p"]) &&
        isset($_POST["mail_p"]) 
        
    ) {
        if (
            !empty($_POST["nom_p"]) && 
            !empty($_POST["prenom_p"]) && 
            !empty($_POST["numcart_p"]) &&
            isset($_POST["prix_p"]) &&
            isset($_POST["mail_p"]) 
            
        ) {
            $Paiement = new Paiement(
                $_POST['nom_p'],
                $_POST['prenom_p'], 
                $_POST['numcart_p'],
                $_POST['prix_p'],
                $_POST['mail_p'], 
 

                
            );
            $PaiementC->ajouterPaiement($Paiement);
            header('Location:afficherPaiement.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Display</title>
</head>
    <body>
        <button><a href="afficherPaiement.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td rowspan='3' colspan='1'>Fiche Personnelle</td>
                    <td>
                        <label for="nom_p">nom_p:
                        </label>
                    </td>
                    <td><input type="text" name="nom_p" id="nom_p" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom_p">prenom_p:
                        </label>
                    </td>
                    <td><input type="text" name="prenom_p" id="prenom_p" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="numcart_p">numcart_p:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="numcart_p" id="numcart_p" maxlength = "16" minlength = "16" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix_p">prix_p:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix_p" id="prix_p"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mail_p">mail_p:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="mail_p" id="mail_p"  >
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>