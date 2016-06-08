<?php
if (file_exists('./classes/tab_class.php'))
    include './classes/tab_class.php';
else
    exit('Scripts not found!');

$page = new tab();
$page->start('./tpl/tab.tpl',"Табы");
$page->connect();
$page->loadIDs('tabs');
if ((isset($_GET['id'])) AND (array_search($_GET['id'],$page->ids) != FALSE)){
    $page->replace($_GET['id']);
}
else{
    $page->replace($page->generateNum('tabs'));
}
echo $page->content;
?>