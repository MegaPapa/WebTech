<?php
    static $ERROR = '404 Page not found';

    include './classes/main.php';
    $page = new mainPage();
    $page->start('./tpl/main.tpl',"Orange Guitar");
    echo $page->content;
?>