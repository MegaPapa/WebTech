<form method="post" action="authorization" align="center">
           <p><b>Добро пожаловать, {username}</b></p>
           <p><b>Какую рассылку вы хотите выбрать?</b></p>
           <p><input type="checkbox" name="news" value="a1" {checkednews}> Новости<Br>
           <input type="checkbox" name="tabs" value="a2" {checkedtabs}> Табы и аккорды<Br>
           <input type="checkbox" name="lessons" value="a3" {checkedlessons}> Уроки<Br>
           <p><input type="submit" value="Сохранить" name="save"><input type="submit" value="Выход" name="exit"></p>
</form>