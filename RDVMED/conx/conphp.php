<!DOCTYPE html>
<html>

<head>
    <title>Envoyer </title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100vh;
            padding: 0;
            margin: 0;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        input,
        textarea {
            outline: none;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: #183cdd;
            ;
        }

        h1 {
            margin-top: 0;
            font-weight: 500;
        }

        form {
            margin-top: 20px;
            margin-left: 50px;
            margin-right: 50px;
            position: relative;
            width: 40%;
            border-radius: 30px;
            background: #fff;
        }

        .form-left-decoration,
        .form-right-decoration {
            content: "";
            position: absolute;
            width: 50px;
            height: 20px;
            border-radius: 20px;
            background: #183cdd;
        }

        .form-left-decoration {
            bottom: 40px;
            left: -30px;
        }

        .form-right-decoration {
            top: 90px;
            right: -30px;
        }

        .form-left-decoration:before,
        .form-left-decoration:after,
        .form-right-decoration:before,
        .form-right-decoration:after {
            content: "";
            position: absolute;
            width: 30px;
            height: 20px;
            border-radius: 30px;
            background: #fff;
        }

        .form-left-decoration:before {
            top: -20px;
        }

        .form-left-decoration:after {
            top: 20px;
            left: 10px;
        }

        .form-right-decoration:before {
            top: -20px;
            right: 0;
        }

        .form-right-decoration:after {
            top: 20px;
            right: 10px;
        }

        .circle {
            position: absolute;
            bottom: 80px;
            left: -55px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #fff;
        }

        .form-inner {
            padding: 40px;
        }

        .form-inner input,
        .form-inner textarea {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: none;
            border-radius: 20px;
            background: #183cdd;
        }

        .form-inner textarea {
            resize: none;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border-radius: 20px;
            border: none;
            border-bottom: 4px solid #183cdd;
            background: #183cdd;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
        }

        button:hover {
            background: #183cdd;
        }

        @media (min-width: 568px) {
            form {
                width: 60%;
            }
        }
    </style>


</head>

<body>




    <form action="liste.php" method="post" class="decor">
        <div class="form-left-decoration"></div>
        <div class="form-right-decoration"></div>
        <div class="circle"></div>
        <div class="form-inner">
            <h1>
                <?php

                if (isset($_POST['submit']) and (isset($_POST['grade1']))) //VALIDER EST LE NOM DU BUTTON //ISSET : est actionné
                {

                    $nom = htmlspecialchars($_POST['nom']); //htmlspecialchars est une methode php permet de filtrer les données
                    $email = htmlspecialchars($_POST['email']);

                    echo "<h2> Merci pour se connecter sur notre application Dr <mark><b> $nom </b></mark>  . Souhaitez-vous reservez un rendez-vous ?<mark><b> </b></mark> </br></br>  </h2>";
                }




                if (isset($_POST['submit']) and (isset($_POST['grade2']))) //VALIDER EST LE NOM DU BUTTON //ISSET : est actionné
                {

                    $nom = htmlspecialchars($_POST['nom']); //htmlspecialchars est une methode php permet de filtrer les données
                    $email = htmlspecialchars($_POST['email']);

                    echo "<h2> Merci pour se connecter sur notre application Monsieur <mark><b> $nom </b></mark>  . Souhaitez-vous reservez un rendez-vous ?<mark><b> </b></mark> </br></br>  </h2>";
                }

                ?>

                <br>
            </h1>
            <button name="submit" type="submit"><strong>rendez-vous</strong>
            </button>
        </div>
    </form>

</body>

</html>