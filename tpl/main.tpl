<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orange Guitar</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/mainPage.css" rel="stylesheet">
    
  </head>
  <body>
       

<nav class="slidenav navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbutton navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index" style="color: white">Orange Guitar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="news" style="color: white">Новости</a>
                    </li>
                    <li>
                        <a href="lessons" style="color: white">Уроки</a>
                    </li>
                    <li>
                        <a href="tab" style="color: white">Табы и аккорды</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <!-- Закончился navbar -->
   
  
      
      <div class="contantBody container">
        <div class="row">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

    <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active" style="border-color: white">
                <img src="images/blue-guitar.jpg" alt="Learn" class="img-responsive">

                        <div class="carousel-caption">
                            <h1 style="color: white">Совершенствуй свой навык</h1>
                        </div>
              </div>

              <div class="item">
                <img src="images/black_guitar_2-wallpaper-1366x768.jpg" alt="News"  class="img-responsive" >
                <div class="carousel-caption">
                    <h1 style="color: white">Актуальные новости</h1>
                </div>
              </div>

              <div class="item">
                <img src="images/bass.jpg" alt="Tabs" class="img-responsive">
                <div class="carousel-caption">
                    <h1 style="color: white">Табы и аккорды</h1>
                </div>
              </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        
         <!-- Закончилась carousel   --> 
         
         
          <div class="row">
               
                    <h1 class="page-header" style="margin-left : 1%">Разделы</h1>
               
          </div>
          
          <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                 <h3>
                    <a href="news">Новости</a>
                </h3>
                <p>Последние новости музыкальной индустрии и не только.</p>
                  <a href="news">
                    <img class="img-responsive" src="images/rednews.jpg" alt="News">
                </a>
          
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                 <h3>
                    <a href="tab">Табы и аккорды</a>
                </h3>
                <p>Табы для песен разных жанров и направлений.</p>
                  <a href="tab">
                    <img class="img-responsive" src="images/orangetab.jpg" alt="Tabs">
                </a>
                
              </div>
          </div>
          
          <div class="row"> <hr> </div>
          
          
          <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                 <h3>
                    <a href="videocont">Видеоконтент</a>
                </h3>
                <p>Видеоуроки и записи выступлений.</p>
                  <a href="videocont">
                    <img class="img-responsive" src="images/bluevideo.jpg" alt="">
                </a>
                
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                 <h3>
                    <a href="hint">Полезные уроки, инструкции и наставления.</a>
                </h3>
                <p>Здесь собраны уроки как для новичков, так и для мастеровитых гитарных гуру.</p>
                  <a href="hint">
                    <img class="img-responsive" src="images/greenlessons.jpg" alt="">
                </a>
                
              </div>
          </div>
          
          
          <div class="row"> <hr> </div>
      
      </div>
 
   
   <!-- Закончился bodyContainer -->
   
   
    
        <footer class="footer">
            <div class="downfoot container-fluid">
                <p class="text-muted text-center">ВебТех 2016(с)</p>
            </div>
        </footer>
    
    
  
  
  
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>