<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>STEMMING TALA & NAZIEF</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{route('home')}}" class="logo"><b>STEMMING</b></a>
            <!--logo end-->
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Information Retrieval</h5>
              	  	
                  <li class="mt">
                      <a href="{{route('home')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">General</a></li>
                          <li><a  href="#">Buttons</a></li>
                          <li><a  href="#">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Calendar</a></li>
                          <li><a  href="#">Gallery</a></li>
                          <li><a  href="#">Todo List</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Blank Page</a></li>
                          <li><a  href="#">Login</a></li>
                          <li><a  href="#">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="#">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Basic Table</a></li>
                          <li><a  href="#">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Morris</a></li>
                          <li><a  href="#">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Demo</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Stemming</h4>
                      <form id="sentence-form" class="form-horizontal style-form" method="POST">
                          @csrf
                        <div class="form-group">
                              <div class="col-sm-10">
                                  <span class="help-block">Masukkan teks Bahasa Indonesia untuk di Stem</span>
                                  <textarea name="sentence" style="height: 257px;" type="text" class="form-control"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10">
                                <button class="btn btn-primary">Stem</button>
                            </div>
                          </div>
                      </form>
                  </div>

                  
                  </div><!-- col-lg-12-->
                  
          	</div><!-- /row -->
              <div class="row mt">
                <div class="col-lg-12">
                <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Responsive Table</h4>
                    <section id="unseen">
                      <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Kata</th>
                            <th>Stem (Nazief Adriani)</th>
                            <th>Stem (Tala)</th>
                            <th>Waktu (Nazief Adriani)</th>
                            <th>Waktu (Tala)</th>
                        </tr>
                        </thead>
                        <tbody id="body-table">
                        </tbody>
                    </table>
                    </section>
            </div><!-- /content-panel -->
         </div><!-- /col-lg-4 -->			
        </div><!-- /row --> 
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{asset('js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>

	<!--custom switch-->
	<script src="{{asset('js/bootstrap-switch.js')}}"></script>
	
	<!--custom tagsinput-->
	<script src="{{asset('js/jquery.tagsinput.js')}}"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="{{asset('js/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
	
	
	<script src="{{asset('js/form-component.js')}}"></script>    

  <script>
      $(document).ready(function () {
          $('#sentence-form').on('submit', function(event) {
            $('.stem-result').remove();
            event.preventDefault(),
            $.ajax({
                type: 'POST',
                url: '/stem',
                data: $("#sentence-form").serialize(),
                success: function (data, status) {
                    if (data.success == true) {
                        for (let index = 0; index < data[0].length; index++) {
                            $('#body-table').append('<tr class="stem-result"><td>'+data[0][index]+'</td><td>'+data[1][index]+'</td><td>'+data[2][index]+'</td><td>'+data[3][index]+' detik</td><td>'+data[3][index]+' detik</td></tr>');
                        }
                    }
                }
            })
        });
});
  </script>

  </body>
</html>
