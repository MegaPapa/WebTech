<form method="post" action="adminpanel">
               <p><b>Добавление уроков</b></p>
               
               <p>Название урока</p>
               <textarea rows="5" cols="75" id="type" name="lessonName">{lessonName}</textarea>
               <p>Текст урока</p>
               <textarea rows="5" cols="75" id="type" name="lessonText">{lessonText}</textarea>
               <p>Изображение для урока</p>
               <input type="file" accept="image/jpeg,image/png" name="lessonImage">
               <br>
               <input type="submit" value="Сохранить" name="updateLesson">
               <br><br>
</form>