<?php
$serveur = "localhost";
$dbname = "rdv";
$user = "root";
$pass = "";
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// récupérer tous les utilisateurs
$sql = "SELECT * FROM form";

try {

    $stmt = $dbco->query($sql);

    if ($stmt === false) {
        die("Erreur");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Afficher la table rendez-vous </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
    html,
    body {
        min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    textarea,
    p {
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
        line-height: 22px;
    }

    h1 {
        position: absolute;
        margin: 0;
        font-size: 32px;
        color: #fff;
        z-index: 2;
    }

    .testbox {
        display: flex;
        justify-content: center;
        align-items: center;
        height: inherit;
        padding: 20px;
    }

    form {
        width: 100%;
        padding: 20px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 30px 0 #163dbb;
    }

    .banner {
        position: relative;
        height: 400px;

        background-image: url("https://www.rdv-medical.fr/assets/components/phpthumbof/cache/prise-rdv-medecin.20a74ba7421285b1a3ed7b5caa3021c4.jpg");
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .banner::after {
        content: "";
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    p.top-info {
        margin: 10px 0;
    }

    input,
    select,
    textarea {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input {
        width: calc(100% - 10px);
        padding: 5px;
    }

    select {
        width: 100%;
        padding: 7px 0;
        background: transparent;
    }

    textarea {
        width: calc(100% - 12px);
        padding: 5px;
    }

    .item:hover p,
    .item:hover i,
    .question:hover p,
    .question label:hover,
    input:hover::placeholder {
        color: #163dbb;
    }

    .item input:hover,
    .item select:hover,
    .item textarea:hover {
        border: 1px solid transparent;
        box-shadow: 0 0 8px 0 #163dbb;
        color: #163dbb;
    }

    .item {
        position: relative;
        margin: 10px 0;
    }

    input[type="date"]::-webkit-inner-spin-button {
        display: none;
    }

    .item i,
    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        font-size: 20px;
        color: #a9a9a9;
    }

    .item i {
        right: 2%;
        top: 30px;
        z-index: 1;
    }

    [type="date"]::-webkit-calendar-picker-indicator {
        right: 1%;
        z-index: 2;
        opacity: 0;
        cursor: pointer;
    }

    input[type=radio] {
        width: 0;
        visibility: hidden;
    }

    label.radio {
        position: relative;
        display: inline-block;
        margin: 5px 20px 25px 0;
        cursor: pointer;
    }

    .question span {
        margin-left: 30px;
    }

    label.radio:before {
        content: "";
        position: absolute;
        left: 0;
        width: 17px;
        height: 17px;
        border-radius: 50%;
        border: 2px solid #163dbb;
    }

    label.radio:after {
        content: "";
        position: absolute;
        width: 8px;
        height: 4px;
        top: 6px;
        left: 5px;
        background: transparent;
        border: 3px solid #163dbb;
        border-top: none;
        border-right: none;
        transform: rotate(-45deg);
        opacity: 0;
    }

    input[type=radio]:checked+label:after {
        opacity: 1;
    }

    .btn-block {
        margin-top: 10px;
        text-align: center;
    }

    button {
        width: 150px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: #163dbb;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background: #163dbb;
    }

    @media (min-width: 568px) {

        .name-item,
        .city-item {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .name-item input,
        .city-item input {
            width: calc(50% - 20px);
        }

        .city-item select {
            width: calc(50% - 8px);
        }
    }
    </style>
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
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Addresse</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>NumeroTel</th>
                        <th>Daterdv</th>
                        <th>Heure</th>
                        <th> Valider </th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($row['addresse']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['numerotel']); ?></td>
                        <td><?php echo htmlspecialchars($row['daterdv']); ?></td>
                        <td><?php echo htmlspecialchars($row['heure']); ?></td>


                        <td>
                            <div class="btn-block">
                                <button type="submit" name="valide1" href="/">Accepter</button>
                            </div>
                        </td>
                        <td>
                            <div class="btn-block">
                                <button type="submit" name="valide2" href="/">Refuser</button>
                            </div>
                        </td>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </form>


</body>

</html>