<footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
           <!-- Redes Sociais, Patrocinadores -->
        </ul>
      </nav>
    </div>
</div>
    </footer>
  </div>
</div>
<div class="fixed-plugin">
  <div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
      <i class="fa fa-cog fa-2x"> </i>
    </a>
    <ul class="dropdown-menu">
      <li class="header-title"> Sidebar Filters</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger active-color">
          <div class="badge-colors ml-auto mr-auto" id='data-color' >
            <span class="badge filter badge-purple" data-color="purple"></span>
            <span class="badge filter badge-azure" data-color="azure"></span>
            <span class="badge filter badge-green active" data-color="green"></span>
            <span class="badge filter badge-warning" data-color="orange"></span>
            <span class="badge filter badge-danger" data-color="danger"></span>
            <span class="badge filter badge-rose" data-color="rose"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="header-title">Background Color</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger active-color">
          <div class="badge-colors ml-auto mr-auto">
            <span class="badge filter badge-dark active"  id="btn-darkmode" data-background-color="black"></span>
            <span class="badge filter badge-white " id="btn-lightmode" data-background-color="white"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="header-title">Images</li>
      <li class="active">
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="{{asset('assetsDashboard/img/sidebar-1.jpg')}}" alt="">
        </a>
      </li>
      <li>
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="{{asset('assetsDashboard/img/sidebar-2.jpg')}}" alt="">
        </a>
      </li>
      <li>
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="{{ asset('assetsDashboard/img/sidebar-3.jpg')}}" alt="">
        </a>
      </li>
      <li>
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="{{asset('assetsDashboard/img/sidebar-4.jpg')}}" alt="">
        </a>
      </li>
    </ul>
  </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assetsDashboard/js/core/jquery.min.js') }}"></script>
<script src="{{asset('assetsDashboard/js/core/popper.min.js')}}"></script>
<script src="{{asset('assetsDashboard/js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('assetsDashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{asset('assetsDashboard/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('assetsDashboard/js/plugins/sweetalert2.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assetsDashboard/js/plugins/jquery.validate.min.js')}}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('assetsDashboard/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assetsDashboard/js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('assetsDashboard/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{asset('assetsDashboard/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('assetsDashboard/js/plugins/bootstrap-tagsinput.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assetsDashboard/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('assetsDashboard/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('assetsDashboard/js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assetsDashboard/js/plugins/nouislider.min.js')}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('assetsDashboard/js/plugins/arrive.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('assetsDashboard/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assetsDashboard/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assetsDashboard/demo/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

 
<script>
  $(document).ready(function() {
    $().ready(function() {
      let $sidebar = $('.sidebar');


     let $sidebar_img_container = $sidebar.find('.sidebar-background');

let $full_page = $('.full-page');

let $sidebar_responsive = $('body > .navbar-collapse');


let window_width = $(window).width();

let fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();


      let darkmodebtn= document.getElementById('btn-darkmode');
      let lightmodebtn = document.getElementById('btn-lightmode');
      let divThemeColorOption = document.getElementById('data-color');
      let backgroundColor = localStorage.getItem('data-background-color');
      let colorTheme = localStorage.getItem("data-color");
      if(backgroundColor ){
        $sidebar.attr('data-background-color', backgroundColor)
        if(backgroundColor == "black"){
            lightmodebtn.classList.remove('active')
            darkmodebtn.classList.add('active')
         }
         if(backgroundColor == "white"){
            darkmodebtn.classList.remove('active')
            lightmodebtn.classList.add('active')
          }
        }
        console.log(colorTheme);
        

        if(colorTheme){
            Array.from(divThemeColorOption.children).forEach((el)=> {
                if(el.getAttribute('data-color') !== colorTheme ){
                 el.classList.remove('active');
                
                }else{
                    el.classList.add('active');
                    if ($sidebar.length != 0) {
                  $sidebar.attr('data-color', colorTheme);
                }

                if ($full_page.length != 0) {
                  $full_page.attr('filter-color', colorTheme);
                }

                if ($sidebar_responsive.length != 0) {
                  $sidebar_responsive.attr('data-color', colorTheme);
                }
                }
            });
        }



      darkmodebtn.addEventListener('click' , ()=> {
           $sidebar.attr('data-background-color', 'black')
           $sidebar.addClass('active')
           localStorage.setItem('data-background-color', 'black') 
          } 
          );
      lightmodebtn.addEventListener('click' , ()=> {
          $sidebar.attr('data-background-color', 'white')
          $sidebar.addClass('active')
          localStorage.setItem('data-background-color', 'white') 

      }
          );


      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
          $('.fixed-plugin .dropdown').addClass('open');
        }

      }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

           color = $(this).data('color');
      
        localStorage.setItem("data-color" , color)

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', color);
        }
      });

      $('.fixed-plugin .background-color .badge').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('background-color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-background-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');

        var new_image = $(this).find("img").attr('src');
        console.log($sidebar_img_container)
        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            console.log('Teste');
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').change(function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });

      $('.switch-sidebar-mini input').change(function() {
        $body = $('body');

        $input = $(this);

        if (md.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          md.misc.sidebar_mini_active = false;

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

          setTimeout(function() {
            $('body').addClass('sidebar-mini');

            md.misc.sidebar_mini_active = true;
          }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });
    });


  });
</script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    md.initDashboardPageCharts();

  });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="http://malsup.github.com/jquery.form.js"></script> 

</body>

</html>
