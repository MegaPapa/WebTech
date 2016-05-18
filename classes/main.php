<?php

if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');
class mainPage extends templater{
}

?>