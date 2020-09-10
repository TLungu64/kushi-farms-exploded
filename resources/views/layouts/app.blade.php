<!DOCTYPE html>
<html>
    <head>
        <title>
            Kushi Farms - @yield('title')
        </title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO">
        
        <meta name="keywords" content="zambian bananas, zambian Farms, kushi farms, Inderbitzin, fresh produce, sustainable faming, compost, recycling, african agriculture, zambia agriculture">
        <meta name="description" content="Located in Mkushi, central Zambia, Kushi Farms is one of the fastest growing farms in in the country. Specializing in fresh produce and live, we employ some of the worlds best eco farming technics to provide you with the healthiest produce">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Chilanka&display=swap" rel="stylesheet">

        <style>
            .cycle-overlay {
                opacity: 0;
            }
        </style>
        <!--[if IE]>
            <style>
            .cycle-overlay { opacity: 1;}
            </style>
            <![endif]-->

        <link rel="stylesheet" type="text/css" href="css/kube.css" />
        <link rel="stylesheet" type="text/css" href="css/master.css" />
        <link rel="stylesHeet" type="text/css" href="css/model.css">

        {{-- ************************************************************************************************* --}}

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

        {{-- ************************************************************************************************ --}}

        <!-- Iconmoon fonts -->
        <link rel="stylesheet" href="/css/icons/style.css" />
        <!--[if lte IE 7]><script src="/assets/icons/lte-ie7.js"></script><![endif]-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="js/jquery.cycle2.min.js"></script>

        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

        <link rel="stylesheet" type="text/css" href="lib/shadowbox/shadowbox.css">
        <script type="text/javascript" src="lib/shadowbox/shadowbox.js"></script>
        <script type="text/javascript">
            Shadowbox.init();
        </script>
    </head>
    <body>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    
            ga('create', 'UA-45448141-1', 'swissfarms.com.au');
            ga('send', 'pageview');
        </script>
    
        <div id="page">
    
            <header>
                <div class="container innerContent">
                    <div class="quarter logo">
                        <a href="/"><img src="images/kushi_farms_logo_2.png" alt="Kushi Farms" /></a>
                        <p class="introLarge">
                            kushi farms
                        </p>
                    </div>
                    <div class="nav threequarter">
                        <ul id="mainNav">
                            <li><a href="/">Home</a></li>
                            <li><a href="/our-produce">Our Produce</a></li>
                            <li><a href="/our-story">Our Story</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>
                            <li><button onclick="document.getElementById('id01').style.display='inline-block'" style="width:auto;">Login</button></li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="row">
                @yield('header')
            </div>

            <div class="mobileHero">
                @yield('mobileHero')
            </div>

            <div class="row innerContent">
                <div id="sideBar" class="third homeSide noMobile">

                    @yield('sideBar')
                    <!-- Trigger the modal with a button -->

                </div>
                <div class="twothird">

                    @yield('mainContent')
                    
                </div>
            </div>
        </div>

        

        <footer class="container innerContent">
            <table style="width: 100%;" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr>
                        <td>Copyright Kushi Farms, Mkushi, Zambia</td>
                        <td><strong>P:</strong> +260 97 7567533 <strong>E:</strong> info@kushifarms.com</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </footer>

        <div id="id01" class="modal">

            <form class="modal-content animate" action="{{ route('login') }}" method="post">
                @csrf
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="images/kushi_farms_logo_2.png" alt="Logo" class="avatar">
                    <p>
                        <h3>
                            Login
                        </h3>
                    </p>
                </div>
        
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right"><strong>{{ __('E-Mail Address') }}</strong></label>
        
                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Password') }}</strong></label>
        
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                        <button type="submit">Login</button>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
        
                                        <div class="container" style="background-color:#f1f1f1">
                                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                            <span class="psw">Forgot <a href="{{ route('password.request') }}">password?</a></span>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal" id="blackboard-model">
            <form class="modal-content animate" action="{{ route('login') }}" method="post">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10">
                                                    <div style="background:url(images/blackboard.jpg)  no-repeat center center;">
                                                        <p >
                                                            <table style="font-family: 'Chilanka', cursive;
                                                            color: white;
                                                            font-size: 15px;
                                                            vertical-align: top;
                                                            margin-left: auto;
                                                            margin-right: auto;">
                                                                <tr>
                                                                    <th><strong>Item</strong></th><th><strong>Unit Price</strong></th><th><strong>In Stock</strong></th><th><strong>Yet to Mature</strong></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Cattle </td><td>k5000 per/head</td><td>7</td><td>0</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Goat </td><td>k300 per/head</td><td>200</td><td>23</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tomatoes </td><td>k60 per/Kg</td><td>9</td><td>4</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Onions </td><td>k50 per/kg</td><td>58</td><td>3</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sheep </td><td>k500 per/head</td><td>63</td><td>45</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bananas </td><td>k100 per/kg</td><td>89</td><td>7</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Turkey </td><td>k120 per/bird</td><td>8</td><td>16</td><td><button type="button" class="btn btn-primary">Buy</button></td><td><button type="button" class="btn btn-warning">Reserve</button></td>
                                                                </tr>
                                                            </table>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
            
    </body>
</html>