<?php

include ('header.php');
include ('contact_modal.php');


$page = $_GET["page"];
if ($page == "") {
    include("home.php");
} else {
    if (is_file("$page.php")) {
        include("$page.php");
    } else {
        echo"<h1>404</h1> Nie ma takiej strony!";
    }
}


include ('footer.php');




