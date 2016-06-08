<?php

    private $mainPage = 
          '<form  align="center" action="authorization" class="authorization" method="post">
              <fieldset>
                <legend>Личный кабинет:</legend>
                E-mail:<br>
                <input type="text" name="login" value=""><br>
                Пароль:<br>
                <input type="password" name="password" value=""><br><br>
                <input type="submit" value="Войти" name="enter"><input type="submit" value="Регистрация" name="registration"><br>
                <input type="submit" value="Восстановление пароля" name="resetPass">
              </fieldset>
           </form>';
    public $acceptReseting = 'Пароль успешно восстановлен.<a href="authorization">Вернуться к окну регистрации</a>';
    private $userCabinet =
        '<form method="post" action="authorization">
           <p><b>Добро пожаловать, {username}</b></p>
           <p><b>Какую рассылку вы хотите выбрать?</b></p>
           <p><input type="checkbox" name="news" value="a1" {checkednews}> Новости<Br>
           <input type="checkbox" name="tabs" value="a2" {checkedtabs}> Табы и аккорды<Br>
           <input type="checkbox" name="lessons" value="a3" {checkedlessons}> Уроки<Br>
           <p><input type="submit" value="Сохранить" name="save"><input type="submit" value="Выход" name="exit"></p>
        </form>';
    private $reAuth = 'Данный e-mail уже используется. <a href="authorization">Повторите регистрацию</a>.';
    private $trueRegistration = 'Регистрация прошла успешно. На вашу почту отправлено письмо для подтверждения регистрации.<a href="authorization">Вернуться к окну регистрации</a>';
    private $registrationTrue = '<p>Регистрация прошла успешно</p><a href="authorization">Вернуться к окну регистрации</a>';
    private $tmpPage;
    private $resetPage = 
          '<form  align="center" action="authorization" class="authorization" method="post">
              <fieldset>
                <legend>Введите ваш e-mail для отправки на него кода восстановления:</legend>
                E-mail:<br>
                <input type="text" name="loginReset" value=""><br>
                <br><br>
                <input type="submit" value="Отправить письмо" name="sendResetMail">
              </fieldset>
           </form>';
    private $newPasswordPage = 
          '<form  align="center" action="authorization" class="authorization" method="post">
              <fieldset>
                <legend>Введите новый пароль:</legend>
                Новый пароль:<br>
                <input type="text" name="newpasswordbox" value=""><br>
                <br><br>
                <input type="submit" value="Сменить пароль" name="newPassword">
              </fieldset>
           </form>';

?>