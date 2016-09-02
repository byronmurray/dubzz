<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dubzz</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    {{-- select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .btn--panel-heading {
            position: relative;
            bottom: 5px;
        }

        .btn-sm {
          margin-right: 2px;
        }

        .tasks del {
            text-decoration: none !important;
            background: #f19494;
        }

        .revisions ins {
            text-decoration: none !important;
            background: #7ef37e;
        }

        .revisions del, .tasks .diffmod {
            display: none;
        }

        .tasks ins {
            display: none;
        }
        
    </style>
    
</head>
<body id="app-layout">
    
    @include('layouts._navagation')

    {{-- ADMIN ONLY MENU /START --}}
    <div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <div class="absolute-wrapper"> </div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    <li class=""><a href="/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Home</a></li>
                    <!-- Dropdown-->
                    <li class="active panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1">
                            <span class="glyphicon glyphicon-signal"></span> Tasks <span class="caret"></span>
                        </a>

                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="/dashboard/tasks">All</a></li>
                                    <li><a href="/dashboard/tasks/pending">Pending</a></li>
                                    <li><a href="/dashboard/tasks/declined">Declined</a></li>
                                    <li><a href="/dashboard/tasks/deleted">Deleted</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="/dashboard/users"><span class="glyphicon glyphicon-user"></span> Team</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-plane"></span> Processes</a></li>
                    <li><a href="{{ route('tags.index') }}"><span class="glyphicon glyphicon-cloud"></span> Tags</a></li>
                    

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>
</div>          
</div>
<div class="col-md-10 content">
      <div class="panel panel-default">
        <div class="panel-heading">
            Dashboard
        </div>
        <div class="panel-body">

        {{-- ADMIN ONLY MENU /END --}}
        @include('flash::message')
        @yield('content')

    {{-- ADMIN ONLY STUFF FOOTER / START --}}
     </div>
    </div>
</div>

</div>

<style type="text/css">
    
    h1.page-header {
    margin-top: -5px;
}

.sidebar {
    padding-left: 0;
}

.main-container { 
    background: #FFF;
    padding-top: 15px;
    margin-top: -20px;
}

.footer {
    width: 100%;
}  

:focus {
    outline: none;
}

.side-menu {
    position: relative;
    width: 100%;
    height: 100%;
    background-color: #f8f8f8;
    border-right: 1px solid #e7e7e7;
}
.side-menu .navbar {
    border: none;
}
.side-menu .navbar-header {
    width: 100%;
    border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav .active a {
    background-color: transparent;
    margin-right: -1px;
    border-right: 5px solid #e7e7e7;
}
.side-menu .navbar-nav li {
    display: block;
    width: 100%;
    border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav li a {
    padding: 15px;
}
.side-menu .navbar-nav li a .glyphicon {
    padding-right: 10px;
}
.side-menu #dropdown {
    border: 0;
    margin-bottom: 0;
    border-radius: 0;
    background-color: transparent;
    box-shadow: none;
}
.side-menu #dropdown .caret {
    float: right;
    margin: 9px 5px 0;
}
.side-menu #dropdown .indicator {
    float: right;
}
.side-menu #dropdown > a {
    border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body {
    padding: 0;
    background-color: #f3f3f3;
}
.side-menu #dropdown .panel-body .navbar-nav {
    width: 100%;
}
.side-menu #dropdown .panel-body .navbar-nav li {
    padding-left: 15px;
    border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body .navbar-nav li:last-child {
    border-bottom: none;
}
.side-menu #dropdown .panel-body .panel > a {
    margin-left: -20px;
    padding-left: 35px;
}
.side-menu #dropdown .panel-body .panel-body {
    margin-left: -15px;
}
.side-menu #dropdown .panel-body .panel-body li {
    padding-left: 30px;
}
.side-menu #dropdown .panel-body .panel-body li:last-child {
    border-bottom: 1px solid #e7e7e7;
}
.side-menu #search-trigger {
    background-color: #f3f3f3;
    border: 0;
    border-radius: 0;
    position: absolute;
    top: 0;
    right: 0;
    padding: 15px 18px;
}
.side-menu .brand-name-wrapper {
    min-height: 50px;
}
.side-menu .brand-name-wrapper .navbar-brand {
    display: block;
}
.side-menu #search {
    position: relative;
    z-index: 1000;
}
.side-menu #search .panel-body {
    padding: 0;
}
.side-menu #search .panel-body .navbar-form {
    padding: 0;
    padding-right: 50px;
    width: 100%;
    margin: 0;
    position: relative;
    border-top: 1px solid #e7e7e7;
}
.side-menu #search .panel-body .navbar-form .form-group {
    width: 100%;
    position: relative;
}
.side-menu #search .panel-body .navbar-form input {
    border: 0;
    border-radius: 0;
    box-shadow: none;
    width: 100%;
    height: 50px;
}
.side-menu #search .panel-body .navbar-form .btn {
    position: absolute;
    right: 0;
    top: 0;
    border: 0;
    border-radius: 0;
    background-color: #f3f3f3;
    padding: 15px 18px;
}
/* Main body section */
.side-body {
    margin-left: 310px;
}
/* small screen */
@media (max-width: 768px) {
    .side-menu {
        position: relative;
        width: 100%;
        height: 0;
        border-right: 0;
    }

    .side-menu .navbar {
        z-index: 999;
        position: relative;
        height: 0;
        min-height: 0;
        background-color:none !important;
        border-color: none !important;
    }
    .side-menu .brand-name-wrapper .navbar-brand {
        display: inline-block;
    }
    /* Slide in animation */
    @-moz-keyframes slidein {
        0% {
            left: -300px;
        }
        100% {
            left: 10px;
        }
    }
    @-webkit-keyframes slidein {
        0% {
            left: -300px;
        }
        100% {
            left: 10px;
        }
    }
    @keyframes slidein {
        0% {
            left: -300px;
        }
        100% {
            left: 10px;
        }
    }
    @-moz-keyframes slideout {
        0% {
            left: 0;
        }
        100% {
            left: -300px;
        }
    }
    @-webkit-keyframes slideout {
        0% {
            left: 0;
        }
        100% {
            left: -300px;
        }
    }
    @keyframes slideout {
        0% {
            left: 0;
        }
        100% {
            left: -300px;
        }
    }
    /* Slide side menu*/
    /* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
    .side-menu-container > .navbar-nav.slide-in {
        -moz-animation: slidein 300ms forwards;
        -o-animation: slidein 300ms forwards;
        -webkit-animation: slidein 300ms forwards;
        animation: slidein 300ms forwards;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }
    .side-menu-container > .navbar-nav {
        /* Add position:absolute for scrollable menu -> see top comment */
        position: fixed;
        left: -300px;
        width: 300px;
        top: 43px;
        height: 100%;
        border-right: 1px solid #e7e7e7;
        background-color: #f8f8f8;
        overflow: auto;
        -moz-animation: slideout 300ms forwards;
        -o-animation: slideout 300ms forwards;
        -webkit-animation: slideout 300ms forwards;
        animation: slideout 300ms forwards;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }
    @-moz-keyframes bodyslidein {
        0% {
            left: 0;
        }
        100% {
            left: 300px;
        }
    }
    @-webkit-keyframes bodyslidein {
        0% {
            left: 0;
        }
        100% {
            left: 300px;
        }
    }
    @keyframes bodyslidein {
        0% {
            left: 0;
        }
        100% {
            left: 300px;
        }
    }
    @-moz-keyframes bodyslideout {
        0% {
            left: 300px;
        }
        100% {
            left: 0;
        }
    }
    @-webkit-keyframes bodyslideout {
        0% {
            left: 300px;
        }
        100% {
            left: 0;
        }
    }
    @keyframes bodyslideout {
        0% {
            left: 300px;
        }
        100% {
            left: 0;
        }
    }
    /* Slide side body*/
    .side-body {
        margin-left: 5px;
        margin-top: 70px;
        position: relative;
        -moz-animation: bodyslideout 300ms forwards;
        -o-animation: bodyslideout 300ms forwards;
        -webkit-animation: bodyslideout 300ms forwards;
        animation: bodyslideout 300ms forwards;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }
    .body-slide-in {
        -moz-animation: bodyslidein 300ms forwards;
        -o-animation: bodyslidein 300ms forwards;
        -webkit-animation: bodyslidein 300ms forwards;
        animation: bodyslidein 300ms forwards;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }
    /* Hamburger */
    .navbar-toggle-sidebar {
        border: 0;
        float: left;
        padding: 18px;
        margin: 0;
        border-radius: 0;
        background-color: #f3f3f3;
    }
    /* Search */
    #search .panel-body .navbar-form {
        border-bottom: 0;
    }
    #search .panel-body .navbar-form .form-group {
        margin: 0;
    }
    .side-menu .navbar-header {
        /* this is probably redundant */
        position: fixed;
        z-index: 3;
        background-color: #f8f8f8;
    }
    /* Dropdown tweek */
    #dropdown .panel-body .navbar-nav {
        margin: 0;
    }
}


</style>

<script type="text/javascript">
$(function () {
    $('.navbar-toggle-sidebar').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);
    });

    $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
        $('.search-input').focus();
    });
  });

</script>

{{-- ADMIN / END --}}



    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    {{-- select 2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
      $('#tag_list').select2({
        placeholder: 'Select a tag',
      });
    </script>

{{--     <script type="text/javascript">

    $('#toggleForm').hide();
      
    $('#clicky').click(function() {
      $('#toggleForm').toggle('slow');
    });


    </script> --}}

    {{-- cdn tinymce text editor --}}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      var editor_config = {
        path_absolute : "/",
        selector: "textarea",
        height: 500,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        menu: [],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 4,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

      tinymce.init(editor_config);
    </script>

    <script>
        $('div.alert').not('.important').delay(3000).fadeOut(1000);
    </script>

</body>
</html>
