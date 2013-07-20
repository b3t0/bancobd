<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Operacion existosa &middot; MyBank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        height: 100%;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

    
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url()."main/members";?>">My&middot;Bank</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <!-- Menu Dropdown -->
                <li class="dropdown">
                <a href="#" class="pull-right" class="dropdown-toggle" data-toggle="dropdown">Usuario <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()."principal/user_info";?>">Información del usuario</a></li>
                <li><a href="<?php echo base_url()."main/logout";?>">cerrar sesión</a></li>
              </ul>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      </div> <!-- /container -->

      <div class="container">

  <div class="page-header">
        <h1>La operación se realizó con éxito</h1>
        <p><a class="btn btn-primary" href="<?php echo base_url()."main/members";?>">Regresar &raquo;</a></p>

  </div>
        
    </div>

    <div id="footer">
      <div class="container">
        <p>&copy; 2013 My&middot;Bank.</p>
      </div>
    </div>  



    <!-- Le javascript
    ================================================== -->
    <!-- required Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>