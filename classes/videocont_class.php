<?php

if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');

class video extends templater{
    
    private $names = array();
    private $sourceLink;
    private $annotation;
   
    
    private function loadNames(){
        $i = 1;
        $result = mysql_query("SELECT videoName FROM videocont", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $this->names[$i] = $row['videoName'];
            $i++;
        }
    }
    
    private function loadVideo($id){
        $i = 1;
        $result = mysql_query("SELECT source,annotation FROM videocont WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $this->sourceLink = $row['source'];
        $this->annotation = $row['annotation'];
    }
    
    public function replace($id){
        $tmpVideo;
        $videoTPL = '<li><a href="videocont?id={id}" class="left-menu">{video_name}</a></li>';
        $this->loadNames();
        $this->loadVideo($id);
        $this->content = str_replace("{source}",$this->sourceLink,$this->content);
        $this->content = str_replace("{lesson_name}",$this->names[$id],$this->content);
        $this->content = str_replace("{lesson_text}",$this->annotation,$this->content);
        $result = mysql_query("SELECT * FROM videocont", $this->link);
        $count = mysql_num_rows($result);
        for ($i = 1; $i <= $count; $i++){
            $tmpVideo = $videoTPL;
            $tmpVideo = str_replace("{id}",$this->ids[$i],$tmpVideo);
            $tmpVideo = str_replace("{video_name}",$this->names[$i],$tmpVideo);
            $tmpVideo .= "{other_lesson}";
            $this->content = str_replace('{other_lesson}',$tmpVideo,$this->content);
            
            
        }
        $this->content = str_replace('{other_lesson}','',$this->content);
    }
}

?>