<?php

if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');

class lesson extends templater{
    private $images = array();
    private $names = array();
    private $text;
    
    private function loadImages($id){
        $i = 1;
        $result = mysql_query("SELECT images FROM lessons WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $this->images = explode("|",$row['images']);
    }
    
    private function loadNames(){
        $i = 1;
        $result = mysql_query("SELECT lesson_name FROM lessons", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $this->names[$i] = $row['lesson_name'];
            $i++;
        }
    }
    
    private function str_replace_once($search, $replace, $text) 
    { 
        $pos = strpos($text, $search); 
        return $pos!==false ? substr_replace($text, $replace, $pos, strlen($search)) : $text; 
    }

    
    private function loadContent($id){
        $i = 1;
        $result = mysql_query("SELECT content FROM lessons WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $this->text = $row['content'];
    }
    
    public function replace($id){
        $i = 0;
        $one = 1;
        $tmpImage = '<img class="img-responsive" src="{imgsrc}" alt="">';
        $lessonTPL = '<li><a href="lessons?id={id}" class="left-menu">{lesson_name}</a></li>';
        $tmpLesson;
        $this->loadNames();
        $this->loadImages($id);
        $this->loadContent($id);
        $this->content = str_replace("{lesson_head}",$this->names[$id],$this->content);
        $this->content = str_replace("{content}",$this->text,$this->content);
        $imagesCount = count($this->images);
        while ($i < $imagesCount){
            $this->content = preg_replace("@{img}@",$tmpImage,$this->content,1);
            $this->content = str_replace("{imgsrc}",$this->images[$i],$this->content);
            $i++;
        }
        $result = mysql_query("SELECT * FROM lessons", $this->link);
        $count = mysql_num_rows($result);
        for ($i = 1; $i <= $count; $i++){
            $tmpLesson = $lessonTPL;
            $tmpLesson = str_replace("{id}",$this->ids[$i],$tmpLesson);
            $tmpLesson = str_replace("{lesson_name}",$this->names[$i],$tmpLesson);
            $tmpLesson .= "{other_lesson}";
            $this->content = str_replace('{other_lesson}',$tmpLesson,$this->content);
        }
        $this->content = str_replace('{other_lesson}','',$this->content);
    }
    
}

?>