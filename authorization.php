<?php

if (file_exists('./classes/authorization_class.php'))
    include './classes/authorization_class.php';
else
    exit('Scripts not found!');

/*if (file_exists('./adminpanel.php'))
    include './adminpanel.php';
else
    exit('Scripts not found!');*/


$page = new authorizationPage();
$page->start('./tpl/authorization.tpl',"Авторизация");
$page->connect();
$check = false;
$login;
$password;
session_start();

if (isset($_POST['sendResetMail'])){
    session_start();
    unset($_SESSION['savingMail']);
    $_SESSION['savingMail'] = $_POST['loginReset'];
    $page->sendResetMail($_SESSION['savingMail']);
}

if (isset($_POST['newPassword'])){
    session_start();
    $password = $_POST['newpasswordbox'];
    
    $newpass = "ma2".md5($password)."y91w";
    $email = $_SESSION['savingMail'];
    $sql = mysql_query("UPDATE users SET password = '$newpass' WHERE email='$email'");
    
}

if (isset($_GET['r'])){
    $page->createNewPassword();
}

if (isset($_POST['resetPass'])){
    $page->resetPassword();
    $check = true;
}

if (isset($_POST['save'])){
    session_start();
    if (isset($_POST['tabs']) == 'on')
        $_SESSION['tabSnd'] = 1;
    else
        $_SESSION['tabSnd'] = 0;
    if (isset($_POST['news']) == 'on')
        $_SESSION['newsSnd'] = 1;
    else
        $_SESSION['newsSnd'] = 0;
    if (isset($_POST['lessons']) == 'on')
        $_SESSION['lessonSnd'] = 1;
    else
        $_SESSION['lessonSnd'] = 0;
    $page->saveSettings();
    $check = false;
}

if (isset($_POST['exit'])){
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['newsSnd']);
    unset($_SESSION['tabSnd']);
    unset($_SESSION['lessonSnd']);
}

if (isset($_GET['a'])){
    $page->checkAuthCode($_GET['a']);
    //echo $_GET['a'];
    $check = true;
}
if (isset($_POST['enter'])) {
    $password = $_POST['password'];
    $login = $_POST['login'];
    $check = true;
    if ($page->authorization($_POST['login'],$_POST['password'])){
        session_start();
        $_SESSION['login'] = $_POST['login'];
        if ($_POST['login'] === 'admin@mail.ru'){
            //$admin = new adminpanel();
            //$admin->start('./tpl/authorization.tpl');
            //$admin->connect();
            //$admin->showAdminPanel();
        }
        else{
            
            //$page->viewCabinet();
        }
    }
    else
        $page->setErrorPage();
}
if (isset($_POST['registration'])) {
    $password = $_POST['password'];
    $login = $_POST['login'];
    if (($password != '') && (preg_match('(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})', $login)) == 1){
        $page->addUser($login,$password);
        $check = true;
    }
}

if (isset($_SESSION['login'])){
    if ($_SESSION['login'] === "admin@mail.ru"){
        $page->goToAdminPage();
        $check = true;
    }
    else{
        $page->viewCabinet();
        $check = true;
    }
}

if (!$check){
    $page->content = str_replace("{content}",$page->getMainPage(),$page->content);
    echo $page->content;
}

?>