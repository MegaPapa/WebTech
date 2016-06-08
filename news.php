<?php
    

if (file_exists('./classes/news_class.php'))
    include './classes/news_class.php';
else
    exit('Scripts not found!');

$page = new newsPage();
$page->connect();
$page->loadIDs('news');
if ((isset($_GET['id'])) AND (array_search($_GET['id'],$page->ids) != FALSE)){
    $page->start('./tpl/currentNews.tpl',"Новости");
    $page->connect();
    $page->createNews($_GET['id']);
    echo $page->content;
}
else{
    $page->start('./tpl/news.tpl',"Новости");
    $page->connect();
    $page->replace();
    echo $page->content;
}

?>