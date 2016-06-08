<form method="post" action="adminpanel">
               <p><b>Добавление новостей</b></p>
               
               <p>Название новости</p>
               <textarea rows="5" cols="75" id="type" name="newsHead"></textarea>
               <p>Заголовок</p>
               <textarea rows="5" cols="75" id="type" name="newsPrehead"></textarea>
               <p>Текст новости</p>
               <textarea rows="5" cols="75" id="type" name="newsText"></textarea>
               <p>Изображение новости</p>
               <input type="file" accept="image/jpeg,image/png" name="newsImage">
               <br>
               <input type="submit" value="Сохранить" name="saveNews">
               <br><br>
           </form>
