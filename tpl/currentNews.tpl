<!DOCTYPE html>
<html lang="ru">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{news_header}</title>

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
    
    
   
  
     

    
   
 
    <div class="container-fluid" >
     
       <div class="row-fluid">
           <div class="col-sm-6 col-md-2 col-lg-2 col-xs-6" style="margin-top: 100px">
    
           
           
            
           
           
           
           
            </div>
            
           <div class="bodyContainer col-sm-8 col-lg-8 col-md-8 col-xs-8" >
           <div class="row">
                
                    <h1 class="page-header" style="margin-left: 2%"> {news_header}</h1>
                    
           </div>
              <p><span class="glyphicon glyphicon-time"></span> {date}</p>
              <img class="img-responsive" src={news_image} alt="">
                
                <hr>
                <p>{newsText}</p>
                <hr>
            </div>
           
       </div>
      </div> 
      
  
   
    
        <footer class="footer">
            <div class="downfoot container-fluid">
                <p class="text-muted text-center">ВебТех 2016(с)</p>
            </div>
        </footer>
    
    
  
  
  
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <!-- Script to Activate the Carousel -->
  </body>
</html>