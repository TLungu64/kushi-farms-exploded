<!DOCTYPE html>
<html>
    <head>
        <title>
            Kushi Farms - @yield('title', 'Kushi Farms')
        </title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO">

        <meta name="keywords" content="zambian bananas, zambian Farms, kushi farms, Inderbitzin, fresh produce, sustainable faming, compost, recycling, african agriculture, zambia agriculture">
        <meta name="description" content="Located in Mkushi, central Zambia, Kushi Farms is one of the fastest growing farms in in the country. Specializing in fresh produce and live, we employ some of the worlds best eco farming technics to provide you with the healthiest produce">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic' rel='stylesheet' type='text/css'>

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
                        <a href="/index.html"><img src="images/kushi_farms_logo_2.png" alt="Kushi Farms" /></a>
                        <p class="introLarge">
                            kushi farms
                        </p>
                    </div>
                    <div class="nav threequarter">
                        <ul id="mainNav">
                            <li><a href="/our-produce.html">Our Produce</a></li>
                            <li><a href="/our-story.html">Our Story</a></li>
                            <li><a href="/contact-us.html">Contact Us</a></li>
                            <li><button onclick="document.getElementById('id01').style.display='inline-block'" style="width:auto;">Login</button></li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="row">
                @yield('siteHeader')
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