<!DOCTYPE html>
<html>

<head>
    <title>Afficher la table rendez-vous </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style> </style>
</head>

<body>

    <div class="testbox">
        <form action="../conx/valide.php" method="GET">
            <div class="banner">
                <h1>Liste des rendez-vous</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>email</th>
                    </tr>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                    </tr>
                </tbody>
                </thead>
            </table>

        </form>
    </div>
</body>

</html>
<?php
$serveur = "localhost";
$dbname = "rdv";
$user = "root";
$pass = "";
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// récupérer tous les utilisateurs
$sql = "SELECT email FROM form";

try {

    $stmt = $dbco->query($sql);

    if ($stmt === false) {
        die("Erreur");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php
$to      = htmlspecialchars($_POST['email']);;
$subject = 'le sujet';
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']); //htmlspecialchars est une methode php permet de filtrer les données
$email = htmlspecialchars($_POST['email']);
$date = htmlspecialchars($_POST['daterdv']);
if (isset($_POST['valide1'])) {
$message = 'Bonjour' . $nom . $prenom . '! 
Votre rendez-vous demandé pour la date' . $date . 'a été ACCEPTE]' .
'Cabinet [NOM_DOCTEUR] ';
}
if (isset($_POST['valide'])) {
$message = 'Bonjour' . $nom . $prenom . '! 
Votre rendez-vous demandé pour la date' . $date . 'a été refuse]' .
'Cabinet [NOM_DOCTEUR] ';
}
$headers = 'From: webmaster@example.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email, $subject, $message, $headers);
                    
?>