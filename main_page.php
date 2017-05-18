<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Code</title>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ranchers" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet"/>
    </head>
    <body>

        <?php
        include ('header.php');
        include ('contact_modal.php');
        
       
        $page = $_GET["page"];
        if ($body == "") {
            include("home.php"); //plik includowany jeśli body jest puste
        } else {
           
                include("$page.php");
            
                echo"<h1>404</h1> Nie ma takiej strony!";
            
        }
        include ('footer.php');
        ?>






        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>