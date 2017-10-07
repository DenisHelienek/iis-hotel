<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hotel California</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .navbar
            {
                margin-bottom: 0;
            }
        </style>
    
    </head>
        
    <body>

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><i class="fa fa-building"></i> Hotel California</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="/ubytovanie">Ubytovanie</a></li>
                <li><a href="/restauracia">Restauracia</a></li>
                <li><a href="/wellness">Wellness</a></li>
                <li><a href="/kontakt">Kontakt</a></li>
                    
                    <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                
                    <li><a href="#">Page 2</a></li>-->
            </ul>
    
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/registracia"><span class="glyphicon glyphicon-user"></span> Zaregistrovat</a></li>
                <li><a href="/prihlasenie"><span class="glyphicon glyphicon-log-in"></span> Prihlasit</a></li>
            </ul>
        </div>
        </nav>

        <style>
        .panel-default > .panel-body
        {
            color: white;
            text-align: center;
            font-weight: bold;
            background-color: #333;
            border-color: #333;
        }
    
        .panel-default
        {
            border-color: #333;
            border-radius: 0
        }

        .carousel-inner img {
            width: 100%; 
            margin: auto;
            min-height:200px;
        }

        @media (max-width: 600px) {
            .carousel-caption {
                display: none; 
             }
        }
        </style>


        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="http://www.hotellasolas.es/images/FotosRecortadas/Slider/full4.png" alt="Image">
                        <div class="carousel-caption">
                            <h3>Hotel California</h3>
                        </div>      
                </div>

                <div class="item">
                    <img src="http://www.journaldespalaces.com/images/hyatt_regency_chandigarh_junior_suite1_47519.png" alt="Image">
                    <div class="carousel-caption">
                        <h3>Hotel California</h3>
                    </div>      
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Predchadzajuci </span>
            </a>
  
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Nasledujuci</span>
            </a>
        </div>
  
        <div class="panel panel-default">
            <div class="panel-body">Nasli ste to spravne miesto na relax a oddych.</div>
        </div>

        <div class="container text-center">    
            <h3>Zadanie</h3><br>
            <p>Navrhnete IS hotelu, ktery by poskytoval prehled o dostupnosti pokoju, udaje o hostech, jejich 
pobytech v hotelu, pozadavcich na sluzby, platby za pokoje, atd. Zakaznici mohou provadet 
rezervace pokoju (tim padem musi zadat sve osobni udaje). Klient si muz
e v ramci jedne 
rezervace objednat vice pokoju, treba i na jine datum. Hotelu staci mit informace pouze o 
jednom klientovi, ktery zastituje cely pobyt v hotelu (o ostatnich ucastnicich pobytu nemusi 
byt dostupne zadne informace). Pobyt muze byt vytvoren na
zaklade rezervace, nebo k 
rezervaci pokoje vubec nemusi dojit, pokud klient prijde primo na recepci hotelu. Jednotlive 
typy pokoju maji ruzne ceny, cena pokoje se navic muze lisit podle obdobi (turisticka sezona), 
na ktere si klient pokoj objednava. Cena 
pokoje se zaroven odviji od toho, zda si host pokoj 
rezervuje dopredu, nebo az na miste. Klient si muze priobjednat k danemu pobytu sluzby v 
hotelu navic, jako napr. pronajem bazenu, a to i vicekrat. IS dale bude schopen evidovat 
skutecne absolvovane pobyt
y 
-
tj. ktere pokoje klient od kdy do kdy obyval a jake sluzby 
skutecne  vyuzil  (od  x  do  x  naKteremPokoji).  U  kazdeho  pobytu  je  evidovano,  ktery 
zamestnanec prevzal platbu za pobyt.
</p>
        </div><br>


        <style>
            footer
            {
                background-color: #333;
                padding: 25px;
            }
                
            p.foot
            {
                color: grey;
            }
        </style>

        <footer class="container-fluid text-center">
            <p class="foot">Tato stranka bola vytvorena pre projekt do predmetu IIS na FIT VUT v Brne</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>