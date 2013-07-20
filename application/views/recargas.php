<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Recargas &middot; MyBank</title>
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

      .well {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .well
      .well .checkbox {
        margin-bottom: 10px;
      }
      .well input[type="text"],
      .well input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
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
        <h1>Realizar una recarga</h1>

  </div>

      <form class="well" action="<?php echo base_url()."principal/realizar_recarga";?>" method="post" 
        accept-charset="utf-8">
        <label>Cantidad a recargar:</label>
        <input type="text" class="input-block-level" name="recarga" required placeholder="$$$" 
         autocomplete="off">
         <label>Numero de celular:</label>
        <input type="text" class="input-block-level" name="celular" required placeholder="Numero celular" 
         autocomplete="off">
        <label>Operador:</label>
        <select>
        <option>Claro</option>
        <option>Tigo</option>
        <option>Movistar</option>
        <option>Uff!</option>
        </select>
        <a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Recargar</a>
        <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">My&middot;Bank</h3>
        </div>
        <div class="modal-body">
        <p>Esta seguro que desea realizar la recarga.</p>
        </div>
        <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button class="btn btn-primary" type="submit" 
        href="<?php echo base_url()."principal/realizar_recarga";?>">Recargar</button>
        </div>
  </div>
      </form>
        
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