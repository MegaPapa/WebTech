<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{lesson_name}</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/mainPage.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        
  </head>
  <body>
       
    
    
<!--<div class="head-pic container-fluid">
        <h1 style="color: white">Test website head</h1>
    </div>-->

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
           <div class="left-menu col-sm-6 col-md-2 col-lg-2 col-xs-6" style="margin-top: 100px">
 
            <ul class="left-col">
                  {other_lesson}
            </ul>
            
           </div>
            
           <div class="bodyContainer col-sm-8 col-lg-8 col-md-8 col-xs-8" >
           
            <h1>{lesson_name}</h1>
           <iframe width="100%" height="500" src="{source}" frameborder="0" allowfullscreen ></iframe>
               <p>{lesson_text}</p>
           
            </div>
           <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
            
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