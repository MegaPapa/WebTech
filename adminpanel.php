<?php

if (file_exists('./classes/adminController.php'))
    include './classes/adminController.php';
else
    exit('Scripts not found!');

session_start();
if ($_SESSION['login'] === 'admin@mail.ru'){
    
    $page = new adminController();
    $page->start('./tpl/adminSkeletonTPL.tpl',"Панель администратора");
    //$page->content = file_get_contents();
    $page->connect();
    $check = false;
    //--------------ADD----------------------
    if (isset($_POST['addNews'])){
        $page->viewAddedPage('addNews');
        echo $page->content;
        $check = true;
    }
    
    if (isset($_POST['addVideo'])){
        $page->viewAddedPage('addVideo');
        echo $page->content;
        $check = true;
    }
    
    if (isset($_POST['addLesson'])){
        $page->viewAddedPage('addLesson');
        echo $page->content;
        $check = true;
    }
    
    if (isset($_POST['addTabs'])){
        $page->viewAddedPage('addTabs');
        echo $page->content;
        $check = true;
    }
    
    
    if (isset($_POST['saveLesson'])){
        $page->addLesson($_POST['lessonName'],$_POST['lessonText'],$_POST['lessonImage']);
        echo str_replace("{content}",'Урок успешно добавлен.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_POST['saveNews'])){
        $page->addNews($_POST['newsHead'],$_POST['newsPrehead'],$_POST['newsText'],$_POST['newsImage']);
        echo str_replace("{content}",'Новость успешно добавлена.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_POST['saveTab'])){
        $page->addTab($_POST['artist'],$_POST['song'],$_POST['tabs']);
        echo str_replace("{content}",'Табы успешно добавлены.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_POST['saveVideo'])){
        $page->addVideo($_POST['videoName'],$_POST['videoURL'],$_POST['videoText']);
        echo str_replace("{content}",'Видео успешно добавлено.<a href="authorization">Вернуться</a>',$page->content);
    } 
    //-------------DELETE---------------------
    if (isset($_POST['deleteNews'])){
        $page->view('<p><a href="adminpanel?deletenews={id}">{head}</a></p>','news','newsHead');    
    }
    
    if (isset($_POST['deleteTabs'])){
        $page->viewDeletingTabs();    
    }
    
    if (isset($_POST['deleteLesson'])){
        $page->view('<p><a href="adminpanel?deletelesson={id}">{head}</a></p>','lessons','lesson_name');    
    }
    
    if (isset($_POST['deleteVideo'])){
        $page->view('<p><a href="adminpanel?deletevideo={id}">{head}</a></p>','videocont','videoName');    
    }
    
    if (isset($_GET['deletenews'])){
        $page->delete('news',$_GET['deletenews']);
        echo str_replace("{content}",'Новость успешно удалена.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_GET['deletetab'])){
        $page->delete('tabs',$_GET['deletetab']);
        echo str_replace("{content}",'Табы успешно удалены.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_GET['deletevideo'])){
        $page->delete('videocont',$_GET['deletevideo']);
        echo str_replace("{content}",'Видео успешно удалено.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_GET['deletelesson'])){
        $page->delete('lessons',$_GET['deletelesson']);
        echo str_replace("{content}",'Урок успешно удалён.<a href="authorization">Вернуться</a>',$page->content);
    }
    //----------------REDACTION---------------------
    if (isset($_POST['redactionNews'])){
        $page->view('<p><a href="adminpanel?rnews={id}">{head}</a></p>','news','newsHead');    
    }
    
    if (isset($_POST['redactionTabs'])){
        $page->viewRedactionTabs();    
    }
    
    if (isset($_POST['redactionLesson'])){
        $page->view('<p><a href="adminpanel?rlesson={id}">{head}</a></p>','lessons','lesson_name');    
    }
    
    if (isset($_POST['redactionVideo'])){
        $page->view('<p><a href="adminpanel?rvideo={id}">{head}</a></p>','videocont','videoName');    
    }
    
    if (isset($_GET['rnews'])){
        $page->viewAddedPage('redactionNews');
        $page->replaceNews($_GET['rnews']);
        session_start();
        $_SESSION['savingID'] = $_GET['rnews'];
        echo $page->content;
    }
    
    if (isset($_GET['rtab'])){
        $page->viewAddedPage('redactionTab');
        $page->replaceTab($_GET['rtab']);
        session_start();
        $_SESSION['savingID'] = $_GET['rtab'];
        echo $page->content;
    }
    
    if (isset($_GET['rvideo'])){
        $page->viewAddedPage('redactionVideo');
        $page->replaceVideo($_GET['rvideo']);
        session_start();
        $_SESSION['savingID'] = $_GET['rvideo'];
        echo $page->content;
    }
    
    if (isset($_GET['rlesson'])){
        $page->viewAddedPage('redactionLesson');
        $page->replaceLesson($_GET['rlesson']);
        session_start();
        $_SESSION['savingID'] = $_GET['rlesson'];
        echo $page->content;
    }
    
    //--------------------UPDATE----------------------------------------
    if (isset($_POST['updateNews'])){
        session_start();
        $page->updateNews($_POST['newsHead'],$_POST['newsPrehead'],$_POST['newsText'],$_POST['newsImage'],$_SESSION['savingID'],'news');
        echo str_replace("{content}",'Новость успешно изменена.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_POST['updateTab'])){
        session_start();
        $page->updateTab($_POST['artist'],$_POST['song'],$_POST['tabs'],$_SESSION['savingID'],'tabs');
        echo str_replace("{content}",'Табы успешно изменены.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_POST['updateLesson'])){
        session_start();
        $page->updateLesson($_POST['lessonName'],$_POST['lessonText'],$_POST['lessonImage'],$_SESSION['savingID'],'lessons');
        echo str_replace("{content}",'Урок успешно изменен.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    if (isset($_POST['updateVideo'])){
        session_start();
        $page->updateVideo($_POST['videoName'],$_POST['videoURL'],$_POST['videoText'],$_SESSION['savingID'],'videocont');
        echo str_replace("{content}",'Видео успешно изменено.<a href="authorization">Вернуться</a>',$page->content);
    }
    
    //-------------------------------------------------------------------
    if (!check){
        $page->viewAdminPanel();
    }
}
else
    exit('Permission denied');

?>