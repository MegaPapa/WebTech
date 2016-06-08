<?php
   
if (!file_exists('./templater.php'))
    include 'templater.php';
else
    exit('Scripts not found!');

   class newsPage extends templater{        
    
    private $newstext = array();
    private $prenews = array();
    private $newsheader = array();
    private $img_array = array();
    private $date_array = array();
    private $replacing_array = array("{news_header}","{trailer_news}","{news_image}","{newsid}","{newsText}","{date}");
    
    private  function mysql_russian_date($date = ''){  
        if ($date == '')  
            return '';
        $rus_months = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        list($day,$hours) = explode(' ', $date);  
        switch( $day ){  
            case date('Y-m-d'):  
                $result = 'Сегодня';  
                break; 
            case date( 'Y-m-d', mktime(0, 0, 0, date("m", date("d"-1, date("Y") )))):  
                $result = 'Вчера';  
                break;  
            default:{
                list($y, $m, $d) = explode('-', $day);
                $month_str = array(  
                'января', 'февраля', 'марта',  
                'апреля', 'мая', 'июня',  
                'июля', 'августа', 'сентября',  
                'октября', 'ноября', 'декабря'  
                );  
                $month_int = array(  
                '01', '02', '03',  
                '04', '05', '06',  
                '07', '08', '09',  
                '10', '11', '12'  
                );
                $m = str_replace($month_int, $month_str, $m);
                if ($d[0] == 0) $d = $d[1];  
                    $result = $d.' '.$m.' '.$y;  
            }
        }

        return $result . ' ' .$hours;  
    } 
    
    
    public function loadnews(){
        $i = 1;
        $tmpDate;
        $result = mysql_query("SELECT newsHead,newsPrehead,newsImg,id,newsText,date FROM news", $this->link);
        while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $this->newsheader[$row['id']] = $row['newsHead'];
            $this->prenews[$row['id']] = $row['newsPrehead'];
            $this->img_array[$row['id']] = $row['newsImg'];
            $this->newstext[$row['id']] = $row['newsText'];
            $this->date_array[$row['id']] = $this->mysql_russian_date($row['date']);
            $i++;
        }
    }
    
    public function createNews($id){
        $this->loadnews();
        $this->content = str_replace($this->replacing_array[0],$this->newsheader[$id],$this->content);
        $this->content = str_replace($this->replacing_array[2],$this->img_array[$id],$this->content);
        $this->content = str_replace($this->replacing_array[4],$this->newstext[$id],$this->content);
        $this->content = str_replace($this->replacing_array[5],$this->date_array[$id],$this->content);
        
    }
    
    public function replace(){
        $newsTPL = '
                <!--    NEWS    -->
                <h2>
                    <a href=news?id={newsid}>{news_header}</a>
                </h2>
                <p><span class="glyphicon glyphicon-time"></span> {date}</p>
                <img class="img-responsive" src={news_image} alt="">
                <br>
                <p>{trailer_news}</p>
                <a class="btn btn-primary buttonOrange" href=news?id={newsid}>Читать дальше <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <!--    ENDNEWS    --> ';
        $this->loadnews();
        $tmpNews;
        $result = mysql_query("SELECT * FROM news", $this->link);
        $newsCount = mysql_num_rows($result);
        for ($i = ($newsCount); $i >= 1; $i--){
            $tmpNews = $newsTPL;
            $tmpNews = str_replace($this->replacing_array[0],$this->newsheader[$this->ids[$i]],$tmpNews);
            $tmpNews = str_replace($this->replacing_array[1],$this->prenews[$this->ids[$i]],$tmpNews);
            $tmpNews = str_replace($this->replacing_array[2],$this->img_array[$this->ids[$i]],$tmpNews);
            $tmpNews = str_replace($this->replacing_array[3],$this->ids[$i],$tmpNews);
            $tmpNews = str_replace($this->replacing_array[5],$this->date_array[$this->ids[$i]],$tmpNews);
            $tmpNews .= '{news}';
            $this->content = str_replace("{news}",$tmpNews,$this->content);
        }
        $this->content = str_replace("{news}","",$this->content);
    }
        
}
?>