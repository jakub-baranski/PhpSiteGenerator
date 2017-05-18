<?php

$json = json_decode(stripcslashes($_REQUEST['json']));
echo json_encode($json->footerHeight);

function fillLi() {
    global $json;
    for ($i = 0; $i < count($json->links); ++$i) {
        $content .= "<li>"
                . "<a href='";
        $content .= $json->links[$i]->link;
        $content .= "'>";
        $content .= $json->links[$i]->name;
        $content .= "</a>\n</li>\n";
    }return $content;
}

//generowanie html'a
$fp = fopen('generated/index.html', 'w+');
$content = "<!DOCTYPE html>\n"
        . "<html lang='pl'>\n"
        . "<head>\n"
        . "<meta charset='utf-8'>\n"
        . "<meta name='viewport' content='width=device-width, initial-scale=1'>\n"
        . "<title>";
$content .= $json->title;
$content .= "</title>\n";
//plik css glownego stylu
$content .= "<link href='css/bootstrap.min.css' rel='stylesheet'/>\n";
$content .= "<link href='css/generated.css' rel='stylesheet'/>\n"
        . "</head>\n"
        . "<body>\n";
//navbar gora, dol
if ($json->navbarPos == 'bottom' || $json->navbarPos == 'top') {
    $content .="<nav class='navbar navbar-default navbar-fixed-$json->navbarPos'>\n"
            . "<div class='container'>\n"
            . "<div class='navbar-header'>\n"
            . "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>\n"
            . "<span class='sr-only'>Toggle navigation</span>\n"
            . "<span class='icon-bar'></span>\n"
            . "<span class='icon-bar'></span>\n"
            . "<span class='icon-bar'></span>\n"
            . "</button>\n"
            . "</div>\n"
            . "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>\n"
            . "<ul class='nav navbar-nav'>\n";

    $content .= fillLi();
    $content .= "</ul>\n"
            . "</div>\n"
            . "</div>\n"
            . "</nav>\n";
}
// koniec navbara gornego v dolnego
//poczatek headera
$content .= "<div class='container-fluid'>\n"
        . "<div class='row'>\n"
        . "<div class='my-page-heading'>\n"
        . "<div class='container'>\n"
        . "<h1><strong>";
$content .= $json->headerTitle;
$content .= "</strong></h1>";
$content .= "<p>";
$content .= $json->headerSubtitle;
$content .= "</p>"
        . "</div>\n"
        . "</div>\n"
        . "</div>\n"
        . "</div>\n";
//tu wstawic glowna czesc strony
$content .= "<div class='container-fluid my-content'>\n"
        . "<div class='container'>";
//w razie potrzeby wstawic panele
//panel lewy:
if ($json->panel == 'left' || $json->panel == 'both') {
    $content .= "<div class='my-left-panel col-md-2'>";
    if ($json->navbarPos == "left") {
        $content.= "<ul class='my-side-nav'>";
        $content .= fillLi();
        $content.= "</ul>\n";
    }
    $content .= "</div>\n";
}
//panel glowny
$content .= "<div class='col-md-";
if ($json->panel == 'left' || $json->panel == 'right') {
    $content .="10";
} else if ($json->panel == 'both') {
    $content .="8";
} else {
    $content .="12";
}
$content .= "'>\n";
$content .= "<h2>$json->contentTitle</h2>\n"
        . "<p>$json->contentText</p>\n"
        . "</div>\n";
//panel prawy
if ($json->panel == 'right' || $json->panel == 'both') {
    $content .= "<div class='my-right-panel col-md-2'>";
    if ($json->navbarPos == "right") {
        $content.= "<ul class='my-side-nav'>";
        $content .= fillLi();
        $content.= "</ul>\n";
    }
    $content .= "</div>\n";
}
$content .= "</div>\n"
        . "</div>\n";

//tu jest stopka

$content .="<footer class='footer'>\n"
        . "<div class='container my-footer-container'>\n"
        . "<p>$json->footerTitle</p>\n"
        . "<p><small>$json->footerSubtitle</small>\n"
        . "</div>\n"
        . "</footer>\n";
//skrypty
$content .= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>\n"
        . "<script src='js/bootstrap.min.js'></script>\n"
        . "</body>"
        . "</html>";
fwrite($fp, $content);
fclose($fp);

//making a css file

$fpcss = fopen("generated/css/generated.css", "w+");
$content = "";
//navbar
$content .= ".navbar-default{";
$content .= "background-color:". urldecode($json->navbarColor).";";
$content .= "color:".  urldecode($json->navbarColorText).";";
$content .= "}";
$content .= ".navbar-default .navbar-nav>li>a{";
$content .= "color:". urldecode($json->navbarColorText).";";
$content .= "}";
//header
$content .= ".my-page-heading {";
if ($json->navbarPos == "top") {
    $content .="padding-top: 100px;";
}
$content .= "text-align: $json->headerAlign;";
$content .= "background-color:". urldecode($json->headerColor) .";";
$content .= "color:".  urldecode($json->headerColorText).";";
$content .= "height: $json->headerHeight"."px;";
$content .= "}\n";
//content
$content .= ".my-content{";
$content .= "min-height: 300px;";
$content .= "text-align: $json->contentAlign;";
$content .= "background-color: ".  urldecode($json->contentColor).";";
$content .= "color: ".  urldecode($json->contentColorText).";";
$content .= "}";
//side navs
$content .= ".my-side-nav{";
$content .= "list-style: none;";
$content .= "color: ".  urldecode($json->contentColorText).";";
$content .= "}";
//footer
$content .= ".footer{";
if ($json->navbarPos == "bottom") {
    $content .="padding-bottom: 100px;";
}
$content .= "background-color:". urldecode($json->footerColor) .";";
$content .= "color:". urldecode($json->footerColorText) .";";
$content .= "padding: 30px;";
$content .= "text-align: $json->footerAlign;";
$content .= "text-align: center;";
$content .= "min-height: $json->footerHeight"."px ;";
$content .= "}";

//left panel
$content .= ".my-left-panel{";
$content .= "position: relative;";
$content .= "top:0;";
$content .= "bottom:0;";
$content .= "background-color:". urldecode($json->leftPanelColor) .";";
$content .= "}";

fwrite($fpcss, $content);
fclose($fpcss);

// making a zip file...

include 'zipper.php';
