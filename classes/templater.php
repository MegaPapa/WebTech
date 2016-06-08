<?php

class templater{
    
    public $content;
    public $ids = array();
    public $link;
    
    public function connect(){
        $this->link = mysql_connect("localhost", "root", "");
        mysql_select_db("orangeguitar.net", $this->link);
    }
    
    public function loadIDs($bd){
        $i = 1;
        $result = mysql_query("SELECT id FROM $bd", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $this->ids[$i] = $row['id'];
            $i++;
        }
    }
    
    private function get($dest,$pageName){
        $this->content = file_get_contents($dest);
        $this->content = str_replace("{footer}",file_get_contents(dirname(__FILE__)."/footer.tpl"),$this->content);
        $this->content = str_replace("{htmlHead}",file_get_contents(dirname(__FILE__)."/head.tpl"),$this->content);
        $this->content = str_replace("{pageTitle}",$pageName,$this->content);
        $this->content = str_replace("{navbar}",file_get_contents(dirname(__FILE__)."/navbar.tpl"),$this->content);
        $this->content = str_replace("{jquery}",file_get_contents(dirname(__FILE__)."/jquery.tpl"),$this->content);
    }
    
    public function start($page,$pageName){
        static $ERROR404 = '404 Page not found';
        if (file_exists($page))
            $this->get($page,$pageName);
        else
            echo $ERROR404;

    }
    
    public function generateNum($bd){
        $result = mysql_query("SELECT * FROM $bd", $this->link);
        $count = mysql_num_rows($result);
        return rand(1,$count);
    }
}

?>