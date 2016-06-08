<?php
if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');


class adminController extends templater{
    
    public function sendMailFromSite($URL,$option){
        $message = 'http://www.'.$URL;
        //$message = wordwrap($message, 70, "\r\n");
        $result = mysql_query("SELECT email FROM users WHERE $option=1", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
            mail($email, $row['email'], $message);
    }
    
    public function addNews($head,$prehead,$text,$image){
        $image = '/images/'.$image;
        $result = mysql_query("SELECT * FROM news", $this->link);
        $count = mysql_num_rows($result);
        $count++;
        $head = mysql_real_escape_string($head);
        $prehead = mysql_real_escape_string($prehead);
        $text = mysql_real_escape_string($text);
        $image = mysql_real_escape_string($image);
        $sqlQuery = mysql_query("SET INSERT_ID=$count");
        $sqlQuery = mysql_query("INSERT INTO news (newsHead,newsPrehead,newsText,newsImg) VALUES ('$head','$prehead','$text','$image')");
        $this->sendMailFromSite("orangeguitar.net/news?id=$count",'newsSnd');
    }
    
    public function addVideo($head,$url,$text){
        $result = mysql_query("SELECT * FROM videocont", $this->link);
        $count = mysql_num_rows($result);
        $count++;
        $head = mysql_real_escape_string($head);
        $url = mysql_real_escape_string($url);
        $text = mysql_real_escape_string($text);
        $sqlQuery = mysql_query("SET INSERT_ID=$count");
        $sqlQuery = mysql_query("INSERT INTO videocont (videoName,source,annotation) VALUES ('$head','$url','$text')");
        
    }
    
    public function addLesson($head,$text,$image){
        $image = '/images/'.$image;
        $result = mysql_query("SELECT * FROM lessons", $this->link);
        $count = mysql_num_rows($result);
        $count++;
        $sqlQuery = mysql_query("SET INSERT_ID=$count");
        $head = mysql_real_escape_string($head);
        $text = mysql_real_escape_string($text);
        $image = mysql_real_escape_string($image);
        $sqlQuery = mysql_query("INSERT INTO lessons (lesson_name,content,images) VALUES ('$head','$text','$image')");
        $this->sendMailFromSite("orangeguitar.net/lessons?id=$count",'lessonSnd');
    }
    
    public function addTab($artist,$song,$tabs){
        $result = mysql_query("SELECT * FROM tabs", $this->link);
        $count = mysql_num_rows($result);
        $count++; 
        $tabs = mysql_real_escape_string($tabs);
        $song = mysql_real_escape_string($song);
        $artist = mysql_real_escape_string($artist);
        $sqlQuery = mysql_query("SET INSERT_ID=$count");
        $sqlQuery = mysql_query("INSERT INTO tabs (tab,name,artist) VALUES ('$tabs','$song','$artist') ");
        $this->sendMailFromSite("orangeguitar.net/tab?id=$count",'tabSnd');
    }
    
    public function updateNews($head,$prehead,$text,$image,$id,$db){
        $image = '/images/'.$image;
        $head = mysql_real_escape_string($head);
        $prehead = mysql_real_escape_string($prehead);
        $text = mysql_real_escape_string($text);
        $image = mysql_real_escape_string($image);
        $sql = mysql_query("UPDATE $db SET newsHead = '$head',newsPrehead = '$prehead',newsText = '$text',newsImg = '$image' WHERE id=$id");
        if (!$sql)
            exit(mysql_error());
    }
    
    public function delete($who,$id){
        $result = mysql_query("DELETE FROM $who WHERE id=$id", $this->link);
    }
    
    private function printList($skeleton,$nameArray,$who){
        $tmp;
        $this->loadIDs("$who");
        $count = count($this->ids);
        for ($i = 1; $i <= $count; $i++){
            $tmp = $skeleton;
            $tmp = str_replace("{head}",$nameArray[$i],$tmp);
            $tmp = str_replace("{id}",$this->ids[$i],$tmp);
            $tmp .= "{content}";
            $this->content = str_replace("{content}",$tmp,$this->content);
        }
        $this->content = str_replace("{content}","",$this->content);
        echo $this->content;
    }
    
    public function viewDeletingTabs(){
        $i = 1;
        $nameArray = array();
        $result = mysql_query("SELECT artist,name FROM tabs", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $nameArray[$i] = $row['artist'].' - '.$row['name'];
            $i++;
        }
        $skeleton = '<p><a href="adminpanel?deletetab={id}">{head}</a></p>';
        $this->printList($skeleton,$nameArray,'tabs');
    }
    
    
    public function viewAdminPanel(){
        $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__).'/adminController.tpl'),$this->content);
        //echo 'kfkfkkfk';
        echo $this->content;
    }
    
    public function viewRedactionTabs(){
        $i = 1;
        $nameArray = array();
        $result = mysql_query("SELECT artist,name FROM tabs", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $nameArray[$i] = $row['artist'].' - '.$row['name'];
            $i++;
        }
        $skeleton = '<p><a href="adminpanel?rtab={id}">{head}</a></p>';
        $this->printList($skeleton,$nameArray,'tabs');
    }
    
    public function view($skeleton,$db,$header){
        $i = 1;
        $nameArray = array();
        $result = mysql_query("SELECT $header FROM $db", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $nameArray[$i] = $row["$header"];
            $i++;
        }
        $this->printList($skeleton,$nameArray,'news');
    }
    
    public function replaceNews($id){
        $result = mysql_query("SELECT newsHead,newsPrehead,newsText FROM news WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $newsHead = $row['newsHead'];
        $newsPrehead = $row['newsPrehead'];
        $newsText = $row['newsText'];
        $this->content = str_replace("{newsHead}",$newsHead,$this->content);
        $this->content = str_replace("{newsPrehead}",$newsPrehead,$this->content);
        $this->content = str_replace("{newsText}",$newsText,$this->content);
    }
    
     public function replaceTab($id){
        $result = mysql_query("SELECT artist,name,tab FROM tabs WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $artist = $row['artist'];
        $song = $row['name'];
        $tab = $row['tab'];
        $this->content = str_replace("{newartist}",$artist,$this->content);
        $this->content = str_replace("{newsong}",$song,$this->content);
        $this->content = str_replace("{newtabs}",$tab,$this->content);
    }
    
    public function replaceLesson($id){
        $result = mysql_query("SELECT lesson_name,content FROM lessons WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $name = $row['lesson_name'];
        $content = $row['content'];
        $this->content = str_replace("{lessonName}",$name,$this->content);
        $this->content = str_replace("{lessonText}",$content,$this->content);
    }
    
    public function replaceVideo($id){
        $result = mysql_query("SELECT videoName,annotation,source FROM videocont WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $name = $row['videoName'];
        $annotation = $row['annotation'];
        $url = $row['source'];
        $this->content = str_replace("{newName}",$name,$this->content);
        $this->content = str_replace("{newText}",$annotation,$this->content);
        $this->content = str_replace("{newURL}",$url,$this->content);
    }
    
    
    public function viewAddedPage($whoAdded){
        $this->content = str_replace("{content}",file_get_contents(dirname(__FILE__)."/$whoAdded.tpl"),$this->content);
        //echo $this->content;
    }
    
    public function updateTab($artist,$song,$tab,$id,$db){
        $artist = mysql_real_escape_string($artist);
        $song = mysql_real_escape_string($song);
        $tab = mysql_real_escape_string($tab);
        $sql = mysql_query("UPDATE $db SET name = '$song',artist = '$artist',tab = '$tab' WHERE id=$id");
        if (!$sql)
            exit(mysql_error());
    }
    
    public function updateVideo($name,$url,$annotation,$id,$db){
        $name = mysql_real_escape_string($name);
        $url = mysql_real_escape_string($url);
        $annotation = mysql_real_escape_string($annotation);
        $sql = mysql_query("UPDATE $db SET videoName = '$name',source = '$url',annotation = '$annotation' WHERE id=$id");
        if (!$sql)
            exit(mysql_error());
    }
    
    public function updateLesson($lessonName,$lessonText,$image,$id,$db){
        $lessonName = mysql_real_escape_string($lessonName);
        $lessonText = mysql_real_escape_string($lessonText);
        $image = mysql_real_escape_string($image);
        $image = '/images/'.$image;
        $sql = mysql_query("UPDATE $db SET lesson_name = '$lessonName',content = '$lessonText',images = '$image' WHERE id=$id");
        if (!$sql)
            exit(mysql_error());
    }
    
}

?>