<form method="post" action="adminpanel">
               <p><b>Редактирование табов и аккордов</b></p>
               
               <p>Исполнитель</p>
               <textarea rows="1" cols="75" id="type" name="artist">{newartist}</textarea>
               <p>Песня</p>
               <textarea rows="1" cols="75" id="type" name="song">{newsong}</textarea>
               <p>Табы(аккорды)</p>
               <textarea rows="5" cols="75" id="type" name="tabs">{newtabs}</textarea>
               <br>
               <input type="submit" value="Сохранить" name="updateTab">
               <br><br>
           </form>