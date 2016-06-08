<?php

if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');

include 'lib/class.phpmailer.php';


class authorizationPage extends templater{
    
    private function sendREALYMAIL($regURL,$email){
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';
        
        $mail->Username = 'orangeguitar@mail.ru';
        $mail->Password = '159753159757415963a';
        $mail->AltBody = 'testtesttest';
        $mail->SetFrom = 'Администрация сайта OrangeGuitar';
        $mail->Subject = 'Письмо';
        $mail->AddAddress("a7xmax@mail.ru",'Нашему пользователю');
        
        if ($mail->send())
            exit('true send');
        else
            exit('false send ');
            
        
            
    }
    

    public function goToAdminPage(){
        echo file_get_contents(dirname(__FILE__).'/adminPage.tpl');
    }
    
    public function checkAuthCode($code){
        $i = 1;
        $emails = array();
        $md5Codes = array();
        $isRegistration = array();
        $result = mysql_query("SELECT email,isRegistration FROM users", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $emails[$i] = $row['email'];
            $md5Codes[$i] = md5($emails[$i]);
            $isRegistration[$i] = $row['isRegistration'];
            $i++;  
        }
        $key = array_search($code,$md5Codes);
        if (array_search($code,$md5Codes)){
            $sql = mysql_query("UPDATE users SET isRegistration = 1 WHERE email='$emails[$key]'");
            $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__).'/succesfulRegistration.tpl'),$this->content);
            echo $this->content;
        }
    }
    
    public function replaceToNewPassword($password,$email){
        session_start();
        $acceptReseting = 'Пароль успешно восстановлен.<a href="authorization">Вернуться к окну регистрации</a>';
        $newpass = "ma2".md5($password)."y91w";
        $sql = mysql_query("UPDATE users SET password = $newpass WHERE email='$email'");
        //exit($email);
        $this->content = str_replace("{content}",$this->acceptReseting,$this->content);
        //echo $this->content;
    }
    
//-------------------------SAVING------------------------------------
    
    public function saveSettings(){
        session_start();
        $login = $_SESSION['login'];
        $tabSnd = $_SESSION['tabSnd'];
        $newsSnd = $_SESSION['newsSnd'];
        $lessonSnd = $_SESSION['lessonSnd'];
        $sql = mysql_query("UPDATE users SET tabSnd = $tabSnd,newsSnd = $newsSnd,lessonSnd = $lessonSnd WHERE email='$login'");
        if (!$sql)
            exit('error');
    }
    
    public function resetPassword(){
        $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__).'/resetPage.tpl'),$this->content);
        echo $this->content;
    }
    
    public function authorization($login,$password){
        $tmpPass;
        $email;
        $isRegistration;
        $result = mysql_query("SELECT email,password,isRegistration,newsSnd,tabSnd,lessonSnd FROM users WHERE email='$login'", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $email = $row['email'];  
        $tmpPass = $row['password'];
        $isRegistration = $row['isRegistration'];
        if (($isRegistration != 0) && ($tmpPass === ("ma2".md5($password)."y91w"))){
            session_start();
            $sndNews = $row['newsSnd'];
            $sndTabs = $row['tabSnd'];
            $sndLessons = $row['lessonSnd'];
            $tmpPage = file_get_contents(dirname(__FILE__).'/userCabinet.tpl');
            if ($sndNews == 1)
                $_SESSION['newsSnd'] = 1;
            else
                $_SESSION['newsSnd'] = 0;
            if ($sndTabs == 1)
                $_SESSION['tabSnd'] = 1;
            else
                $_SESSION['tabSnd'] = 0;
            if ($sndLessons == 1)
                $_SESSION['lessonSnd'] = 1;
            else
                $_SESSION['lessonSnd'] = 0;
            return true;
        }

    }
    
    public function setErrorPage(){
        $errText = 'Вы ввели неверный логин или пароль. Повторите ввод <a href="authorization">снова</a>.';
        $this->content = str_replace("{content}",$errText,$this->content);
        echo $this->content;
    }
    
    public function viewCabinet(){
        $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__).'/userCabinet.tpl'),$this->content);
        session_start();
        $this->content = str_replace("{username}",$_SESSION['login'],$this->content);
        echo $this->content;
    }
    
    public function getMainPage(){
        //$mainPage = 
        return file_get_contents(dirname(__FILE__).'/registrationForm.tpl');
    }
    
    private function sendAuthMail($regURL,$email){
        $message = 'http://www.'.$regURL;
        $message = wordwrap($message, 70, "\r\n");
        //$this->SendREALYMAIL($regURL,$email);
        mail($email, 'Registration', $message);
        //orangeguitar.net/authorization?a=
    }
    
    
    
    public function createNewPassword(){
        $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__).'/newPasswordPage.tpl'),$this->content);
        //echo $this->content;
    }
    
    
    public function sendResetMail($login){
        $result = mysql_query("SELECT password FROM users WHERE email='$login'", $this->link);
        //exit($login);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $this->savingMail = $login;
        $md5Code = md5($row['password']);
        $regURL = 'orangeguitar.net/authorization?r='.$md5Code; 
        $this->sendAuthMail($regURL,$login);
        //$this->createNewPassword();
    }
    
    
    
    private function checkUser($login){
        $i = 1;
        $emails = array();
        $isRegistration = array();
        $result = mysql_query("SELECT email,isRegistration FROM users", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $emails[$i] = $row['email'];
            $isRegistration[$i] = $row['isRegistration'];
            $i++;   
        }
        $key = array_search($login,$emails);
        if ((array_search($login,$emails)) || ($isRegistration[$key] != 0))
            return false;
        else
            return true;
    }
    
    public function addUser($login,$password){
        if ($this->checkUser($login)){
            $login = mysql_real_escape_string($login);
            $pass =  "ma2".md5($password)."y91w";
            $sql = mysql_query("INSERT INTO users (email,password,newsSnd,tabSnd,lessonSnd) VALUES ('$login','$pass',1,0,0)");
            if (!$sql)
                echo "<p>Ошибка регистрации, попробуйте позже</p>";
            else{
                $md5Code = md5($login);
                $regURL = 'orangeguitar.net/authorization?a='.$md5Code;
                $this->sendAuthMail($regURL,$login);
                $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__).'/trueRegistration.tpl'),$this->content);
                echo $this->content;
            }
        }
        else{
            $reAuth = 'Данный e-mail уже используется. <a href="authorization">Повторите регистрацию</a>.';
            $this->content = str_replace("{content}",$reAuth,$this->content);
            echo $this->content;
        }
    }
    
    /*public function generatePage($number){
        $error = '<p>Неверный e-mail. Проверьте правильность введённой информации</p>';
        
        if ($number == 1){
            
        }
        if ($number == 2){
            //$this->content = str_replace("{content}");
        }
    }*/
    
}

?>