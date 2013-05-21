<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- The styles -->
    {{ HTML::style('/css/bootstrap.css')}}
      
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    {{ HTML::style('/css/bootstrap-responsive.css')}}    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">OnlineMenu</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              
                      <li>{{ HTML::link('/', 'Home')}}</li>
                      <li>{{ HTML::link('/', 'Register')}}</li>
                      <li>{{ HTML::link('/', 'Login')}}</li>
              
            </ul>
                  form
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	validationerrors
        <h1>Hello, </h1>
        <h2>welcom to our OnlineMenu application!</h2>
        <figure>

          image here
					
		    </figure>
        
        <h3>This is an application to order a menu or sandwich online. Please login to make use of our services. </h3>
        
      </div>

      

      <hr>

      <div class="footer-container">
		<footer class="wrapper">
			Here comes the footer.
		</footer>
	  </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('/js/assets/jquery.js')}}
    {{HTML::script('/js/assets/bootstrap-transition.js')}}
    {{HTML::script('/js/assets/bootstrap-alert.js')}}
    {{HTML::script('/js/assets/bootstrap-modal.js')}}
    {{HTML::script('/js/assets/bootstrap-dropdown.js')}}
    {{HTML::script('/js/assets/bootstrap-scrollspy.js')}}
    {{HTML::script('/js/assets/bootstrap-tab.js')}}
    {{HTML::script('/js/assets/bootstrap-tooltip.js')}}
    {{HTML::script('/js/assets/bootstrap-popover.js')}}
    {{HTML::script('/js/assets/bootstrap-button.js')}}
    {{HTML::script('/js/assets/bootstrap-collapse.js')}}
    {{HTML::script('/js/assets/bootstrap-carousel.js')}}
    {{HTML::script('/js/assets/bootstrap-typeahead.js')}}


  </body>
</html>