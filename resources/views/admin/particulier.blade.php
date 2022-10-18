

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Envoi de Notif</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">

                              @if (Route::has('login'))

                              @auth

                              <li class="nav-item ">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                             </li>

                             <li class="nav-item">
                                <a class="nav-link" href="{{url('client_register')}}">Enregistrer Client</a>
                             </li>

                              <li class="nav-item active">
                                 <a class="nav-link" href="{{url('particulier')}}"> Particulier </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{url('transpchauff')}}"> Transport/Chauff</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{url('mecanogarag')}}">Mecan/garag</a>
                              </li>

                                <x-app-layout>
                                </x-app-layout>

                            @else

                              <li class="nav-item">
                                 <a class="nav-link" href=" {{route('login')}} ">S'identifier</a>
                              </li>

                              @endauth

                              @endif

                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section>
    <form method="POST" action=" {{url('message')}} " class="form-horizontal">
         @csrf

         <div class="form-group">
                <label for="name" class="col-md-4 control-label" >Entrez Message</label>

                <div class="col-md-6">

                    <textarea class="form-control border border-dark" name="message" id="name" value="" required autofocus>

                    </textarea>

                </div>
         </div>

        <table class="table">
            <thead>
              <tr>
                    <th scope="col">
                            <input type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">Nom</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Numero</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                <tr>
                    <td>  <input type="checkbox" name="Telephone[]" class="checkBoxClass" value="{{$datas->Contact}}">
                    </td>
                    <td>{{$datas->Nom}}</td>
                    <td>{{$datas->Profession}}</td>
                    <td>{{$datas->Contact}}</td>
                  </tr>
                @endforeach

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Envoyer Message
                            </button>
                    </div>
                </div>

     </form>

      </section>

      <!-- end banner -->

      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
            $(function(e){
                $("#checkAll").click(function(){
                    $(" .checkBoxClass").prop('checked', $(this).prop('checked'));
                })
            });
      </script>
    </body>
</html>

