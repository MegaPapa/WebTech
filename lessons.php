<?php

if (file_exists('./classes/lessons_class.php'))
    include './classes/lessons_class.php';
else
    exit('Scripts not found!');

$page = new lesson();
$page->start('./tpl/lessons.tpl',"Уроки");
$page->connect();
$page->loadIDs('lessons');
if ((isset($_GET['id'])) AND (array_search($_GET['id'],$page->ids) != FALSE)){
    $page->replace($_GET['id']);
}
else{
    $page->replace($page->generateNum('lessons'));
}
echo $page->content;

?>