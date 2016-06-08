<form method="post" action="adminpanel">
               <p><b>Редактирование новостей</b></p>
               
               <p>Название новости</p>
               <textarea rows="5" cols="75" id="type" name="newsHead">{newsHead}</textarea>
               <p>Заголовок</p>
               <textarea rows="5" cols="75" id="type" name="newsPrehead">{newsPrehead}</textarea>
               <p>Текст новости</p>
               <textarea rows="5" cols="75" id="type" name="newsText">{newsText}</textarea>
               <p>Изображение новости</p>
               <input type="file" accept="image/jpeg,image/png" name="newsImage">
               <br>
               <input type="submit" value="Сохранить" name="updateNews">
               <br><br>
           </form>