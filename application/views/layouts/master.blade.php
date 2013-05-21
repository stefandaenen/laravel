<!DOCTYPE html>
<html>
  <head>
  	<title>@yield('title')</title>
      {{-- load the css styles and javascript from assets , config in base.php--}}
        {{Asset::styles()}}
        {{Asset::scripts()}}
      <style type="text/css">
       body {
          padding-top: 60px;
          padding-bottom: 40px;
        }
      </style>
    {{-- for functionality reason the folowing style is set here --}}
    {{ HTML::style('/css/bootstrap-responsive.css')}}
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
                @yield('homelink')          
            <div class="nav-collapse collapse">
              <ul class="nav">
                
              	@yield('nav')
                
              </ul>
                @yield('login')
            </div><!--/.nav-collapse -->
          </div> <!-- end container 1 -->
        </div>
      </div>
  	<div class="container">

  		<div id="content">
  				
  			@yield('content')

  		</div><!--end content -->


  	    <div class="footer-container">
  			<footer class="wrapper">
  				&copy; Online menu reservation {{ date('Y')}}
  			</footer>
  		</div>

  	</div> <!-- /container -->
  </body>
</html>