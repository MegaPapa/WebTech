<?php
if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');

class tab extends templater{
    
    private $replacing_array = array();
    private $tab;
    private $names = array();
    private $artists = array();
    
    
    
    private function loadNames(){
        $i = 1;
        $result = mysql_query("SELECT name,artist FROM tabs", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $this->names[$i] = $row['name'];
            $this->artists[$i] = $row['artist'];
            $i++;
        }
    }
    
    private function loadTab($id){
        $result = mysql_query("SELECT tab FROM tabs WHERE id=$id", $this->link);
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $this->tab = $row['tab'];
    }
    
    public function replace($id){
        $tmpTab;
        $tabTPL = '<li><a href="tab?id={id}" class="left-menu">{artist} - {song}</a></li>';
        $this->loadTab($id);
        $this->loadNames();
        $this->content = str_replace("{song}",$this->names[$id],$this->content);
        $this->content = str_replace("{artist}",$this->artists[$id],$this->content);
        $this->content = str_replace("{tab}",$this->tab,$this->content);
        $result = mysql_query("SELECT * FROM tabs", $this->link);
        $tabsCount = mysql_num_rows($result);
        for ($i = 1; $i <= $tabsCount; $i++){
            $tmpTab = $tabTPL;
            $tmpTab = str_replace("{id}",$this->ids[$i],$tmpTab);
            $tmpTab = str_replace("{song}",$this->names[$i],$tmpTab);
            $tmpTab = str_replace("{artist}",$this->artists[$i],$tmpTab);
            $tmpTab .= "{other_song}";
            $this->content = str_replace('{other_song}',$tmpTab,$this->content);
            
        }
        $this->content = str_replace('{other_song}','',$this->content);
    }
    
    
}
?>