<?php

if (file_exists('./classes/videocont_class.php'))
    include './classes/videocont_class.php';
else
    exit('Scripts not found!');

$page = new video();
$page->start('./tpl/videocont.tpl');
$page->connect();
$page->loadIDs('videocont');

if ((isset($_GET['id'])) AND (array_search($_GET['id'],$page->ids) != FALSE)){
    $page->replace($_GET['id']);
}
else{
    $page->replace($page->generateNum('videocont'));
}
echo $page->content;


?>