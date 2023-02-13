<?php
if (isset($_POST['valider'])) //VALIDER EST LE NOM DU BUTTON //ISSET : est actionné
{
    if (isset($_POST['nom']) and isset($_POST['email'])) {
        if (!empty($_POST['nom']) and !empty($_POST['email'])) {
            $nom = htmlspecialchars($_POST['nom']); //htmlspecialchars est une methode php permet de filtrer les données
            $email = htmlspecialchars($_POST['email']);
            //header("Location: reponse.html");
            echo "<h2> Bonjour <mark><b> $nom </b></mark> ! Merci d'avoir pris le temps de remplir le formulaire !
            Votre réservation est bien envoyé !. </h2>";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Envoyer </title>
    <meta charset="utf-8">
</head>

<body>
    <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>

    <?php
    echo 'nom : ' . htmlspecialchars($_POST['nom']) . '<br>';
    echo 'Prénom : ' . $_POST['prenom'] . '<br>';
    echo 'Address : ' . $_POST["addresse"] . '<br>';
    echo 'Age : ' . $_POST["age"] . '<br>';
    echo 'Email : ' . $_POST["email"] . '<br>';
    echo 'Numero Téléphone : ' . $_POST["numerotel"] . '<br>';
    echo 'Date : ' . $_POST["daterdv"] . '<br>';
    echo 'Heure: ' . $_POST["heure"] . '<br>';
    ?>
</body>

</html>
<?php
$serveur = "localhost";
$dbname = "rdv";
$user = "root";
$pass = "";

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$adress = $_POST["addresse"];
$age = $_POST["age"];
$email = $_POST["email"];
$NumeroTéléphone = $_POST["numerotel"];
$date = $_POST["daterdv"];
$heure = $_POST["heure"];
$valide = "en attente";


try {
    //On se connecte à la BDD
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //On insère les données reçues
    $sth = $dbco->prepare("
            INSERT INTO form(nom,prenom, addresse, age, email, numerotel,daterdv,
            heure , valide)
            VALUES(:nom , :prenom, :adresse,:age , :email, :numerotel , :daterdv, :heure , :valide)");
    $sth->bindParam(':nom', $nom);
    $sth->bindParam(':prenom', $prenom);
    $sth->bindParam(':adresse', $adress);
    $sth->bindParam(':age', $age);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':numerotel', $NumeroTéléphone);
    $sth->bindParam(':daterdv', $date);
    $sth->bindParam(':heure', $heure);
    $sth->bindParam(':valide', $valide);
    $sth->execute();

    //On renvoie l'utilisateur vers la page de remerciement
    header("Location:index.html");
} catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}
?>