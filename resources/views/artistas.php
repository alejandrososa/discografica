<!DOCTYPE html>
<html>
    <head>
        <meta name="fragment" content="!" />
        <meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
        <meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
        <meta name="author" content="Luka Cvetinovic for Codrops" />
        <title>Discografica</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="<?= asset('app/lib/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="57x57" href="<?= asset('app/img/favicons/favicon-57x57.png') ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= asset('app/img/favicons/favicon-60x60.png') ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('app/img/favicons/favicon-32x32.png') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= asset('app/img/favicons/favicon-16x16.png') ?>">
        <link rel="shortcut icon" href="<?= asset('app/img/favicons/favicon.ico') ?>">
        <meta name="msapplication-TileColor" content="#00a8ff">
        <meta name="msapplication-config" content="<?= asset('app/img/favicons/browserconfig.xml') ?>">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" type="text/css" href="<?= asset('app/css/normalize.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('app/css/owl.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('app/css/animate.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('app/fonts/font-awesome-4.1.0/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('app/fonts/eleganticons/et-icons.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('app/css/app.css') ?>">
        
        
    </head>
    <body ng-controller="artistasController">
        <div class="preloader">
            <img src="app/img/loader.gif" alt="Preloader image">
        </div>
        <nav class="navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="app/img/logo.png" data-active-url="app/img/logo-active.png" alt=""></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right main-nav">
                        <li><a href="/">Portada</a></li>
                        <li><a href="/albumes">Albumes</a></li>
                        <li><a href="/artistas">Artistas</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-white">Crear Artista</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>


        <section class="section section-padded blue-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <!-- Table-to-load-the-data Part -->
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Instrumento</th>
                                <th>Album</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="artista in artistas">
                                <td>{{ artista.id }}</td>
                                <td>{{ artista.nombre }}</td>
                                <td>{{ artista.instrumento }}</td>
                                <td>{{ artista.album.titulo }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(artista.id)">Eliminar</button>
                                    <button class="btn btn-white btn-sm" ng-click="toggle('edit', artista.id)">Editar</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                    <h3 class="white" id="myModalLabel">{{form_title}}</h3>
                    <form name="frmArtista" action="" class="popup-form" novalidate="">

                        <input type="text" class="form-control form-white has-error" id="nombre" name="nombre" placeholder="Nombre del Artista" value="{{nombre}}"
                               ng-model="artista.nombre" ng-required="true">

                        <input type="text" class="form-control form-white has-error" id="instrumento" name="instrumento" placeholder="Instrumento del Artista" value="{{instrumento}}"
                               ng-model="artista.instrumento" ng-required="true">

                        <div class="dropdown">
                            <button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Album
                            </button>
                            <ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
                                <li ng-repeat="album in albumes" class="animated lightSpeedIn"><a href="#" ng-click="select(album.id)">{{album.titulo}}</a></li>
                            </ul>
                        </div>

                        <button type="button" class="btn btn-submit" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmArtista.$invalid">{{form_button}}</button>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-center-mobile">
                        <h3 class="white">Reserva gratis ya!</h3>
                        <h5 class="light regular light-white">No pierdas esta gran oportunidad.</h5>
                        <a href="#" class="btn btn-blue ripple trial-button">Comenzar gratis ahora</a>
                    </div>
                    <div class="col-sm-6 text-center-mobile">
                        <h3 class="white">Horario <span class="open-blink"></span></h3>
                        <div class="row opening-hours">
                            <div class="col-sm-6 text-center-mobile">
                                <h5 class="light-white light">Lun - Vie</h5>
                                <h3 class="regular white">9:00 - 22:00</h3>
                            </div>
                            <div class="col-sm-6 text-center-mobile">
                                <h5 class="light-white light">Sab - Dom</h5>
                                <h3 class="regular white">10:00 - 18:00</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bottom-footer text-center-mobile">
                    <div class="col-sm-8">
                        <p>&copy; 2016 Todos los derechos reservados. Creado por Alejandro Sosa para <a href="http://mondeapp.com/">MondeApp</a></p>
                    </div>
                    <div class="col-sm-4 text-right text-center-mobile">
                        <ul class="social-footer">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Holder for mobile navigation -->
        <div class="mobile-nav">
            <ul>
            </ul>
            <a href="#" class="close-link"><i class="arrow_up"></i></a>
        </div>


    </body>

    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="<?= asset('app/lib/jquery/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('app/lib/bootstrap/js/tether.min.js') ?>"></script>

    <!-- Theme -->
    <script src="<?= asset('app/lib/theme/owl.carousel.min.js') ?>"></script>
    <script src="<?= asset('app/lib/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('app/lib/theme/wow.min.js') ?>"></script>
    <script src="<?= asset('app/lib/theme/typewriter.js') ?>"></script>
    <script src="<?= asset('app/lib/theme/jquery.onepagenav.js') ?>"></script>
    <script src="<?= asset('app/lib/theme/main.js') ?>"></script>

    <!-- AngularJS Application Scripts -->
    <script src="<?= asset('app/app.js') ?>"></script>
    <script src="<?= asset('app/controllers/artistasController.js') ?>"></script>
</html>
