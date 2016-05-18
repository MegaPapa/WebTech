session_start();
02.
 
03.
if ( !empty($_GET['logout']) ) // если юзер решил выйти
04.
{
05.
// просто разрушаем переменные
06.
unset($_SESSION['logged'], $_SESSION['login']);
07.
}
08.
 
09.
// сверяем данные из формы логина с нужными логином и паролем
10.
if ( !empty($_POST['login']) and !empty($_POST['pass']) )
11.
{
12.
if ( $_POST['login'] == 'vasya' and $_POST['pass'] == 'qwerty' ) // это очень грубый вариант авторизации %)
13.
{
14.
// сохраняем сеансовые переменные logged = true и login с именем пользователя
15.
$_SESSION['logged'] = 1;
16.
$_SESSION['login'] = 'vasya';
17.
}
18.
}
19.
 
20.
if ( !isset($_SESSION['logged']) or empty($_SESSION['logged']) ) // если в сессии не указано, что пользователь залогинен
21.
{
22.
// показываем форму для ввода пароля
23.
 
24.
?>
25.
<form action="auth.php" method="post">
26.
<input type="text" name="login" />
27.
<input type="password" name="pass" />
28.
<input type="submit" value="Ну давай!" />
29.
</form>
30.
<?php
31.
}
32.
else
33.
{
34.
?>
35.
<p>Привет, <?=$_SESSION['login']?>. Теперь у вас есть доступ к секретным данным.
36.
<a href="/auth.php?logout=1">Выйти</a></p>
37.
<?php
38.
}