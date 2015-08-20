<?php
//If the form is submitted
if(isset($_POST['submit'])) {

        //Check to make sure that the name field is not empty
        if(trim($_POST['contactname']) == '') {
                $hasError = true;
        } else {
                $name = trim($_POST['contactname']);
        }

        //Check to make sure sure that a valid email address is submitted
        if(trim($_POST['email']) == '')  {
                $hasError = true;
        } else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
                $hasError = true;
        } else {
                $email = trim($_POST['email']);
        }

        //Check to make sure comments were entered
        if(trim($_POST['message']) == '') {
                $hasError = true;
        } else {
                if(function_exists('stripslashes')) {
                        $comments = stripslashes(trim($_POST['message']));
                } else {
                        $comments = trim($_POST['message']);
                }
        }

        //If there is no error, send the email
        if(!isset($hasError)) {
                $emailTo = 'almir.pamukovic@gmail.com'; // Put your own email address here
                $body = "Name: $name \n\nEmail: $email \n\nPhone Number: $phone \n\nSubject: $subject \n\nComments:\n $comments";
                $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

                mail($emailTo, $subject, $body, $headers);
                $emailSent = true;
        }
}
?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="creative agency,personal portfolio" name="description">
        <meta content="Gamma" name="author">
        <title>Radar Capital</title>
        <!-- CSS -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="css/elementTransitions.css" rel="stylesheet" media="screen">
        <link href="css/superslides.css" rel="stylesheet" media="screen">
        <link href="css/slimbox2.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Arapey:400italic,400' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <!-- Navigation -->
        <div id="undefined-sticky-wrapper" class="sticky-wrapper is-sticky">
            <div id="nav">
                <div class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                                <a class="navbar-brand" href="index.html">
                                    <!-- <i class="fa fa-anchor"></i>RADAR -->
                                    <div class="navbar-logo"></div>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav" id="top-nav">
                                    <li class="active">
                                        <a href="/#slides">Home</a>
                                    </li>
                                    <li>
                                        <a href="/#features">Approach</a>
                                    </li>
                                    <li>
                                        <a href="/#about">About</a>
                                    </li>
                                    <li>
                                        <a href="/#projects">Portfolio</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#blog">Blog</a>
                                    </li> -->
                                    <li>
                                        <a href="/#cta-contact">Contact</a>
                                    </li>
                            </ul>
                            <a href="/#undefined-sticky-wrapper" class="btn btn-green navbar-btn pull-right external">Go back home</a>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- .nav-wrapper -->
        </div>
        <!-- end:Navigation -->

            <div id="map"></div>
            <!-- start:Contact page -->
            <div class="container" id="contact">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="headline">Get In Touch With Us</h2>
                        <p>You can do that by simply using the contacts from below.</p>
                         <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
          <fieldset>
           
            <?php if(isset($hasError)) { //If errors are found ?>
              <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
              <div class="alert alert-success">
                <p><strong>Message Successfully Sent!</strong></p>
                <p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
              </div>
            <?php } ?>

            <div class="form-group">
              <label for="name">Your Name<span class="help-required">*</span></label>
              <input type="text" name="contactname" id="contactname" value="" class="form-control required" role="input" aria-required="true" />
            </div>

           
            <div class="form-group">
              <label for="email">Your Email<span class="help-required">*</span></label>
              <input type="text" name="email" id="email" value="" class="form-control required email" role="input" aria-required="true" />
            </div>

         

            <div class="form-group">
              <label for="message">Message<span class="help-required">*</span></label>
              <textarea rows="8" name="message" id="message" class="form-control required" role="textbox" aria-required="true"></textarea>
            </div>

            <div class="actions">
              <input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn btn-green btn-lg" title="Click here to submit your message!" />
              
            </div>
          </fieldset>
        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h3>Please send your investment summaries that cover:</h3>
                            <!-- <p>But also the leap into electronic typesetting, remaining essentially</p> -->
                            <div class="accordion" id="accordion">
                                <!-- Start accordion item -->
                                <div class="panel">
                                    <div class="panel-title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                <span></span>Product description</a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="text">Technology, current state of product development.</div>
                                    </div>
                                </div>
                                <!-- End accordion item -->
                                <!-- Start accordion item -->
                                <div class="panel">
                                    <div class="panel-title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">
                                                <span></span>Market opportunity</a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="text">Geography, industry, target clients.</div>
                                    </div>
                                </div>
                                <!-- End accordion item -->
                                <!-- Start accordion item -->
                                <div class="panel">
                                    <div class="panel-title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed">
                                                <span></span>Business model</a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="text">Key sources of revenues and lines of expenses.</div>
                                    </div>
                                </div>
                                <!-- End accordion item -->
                                <!-- Start accordion item -->
                                <div class="panel">
                                    <div class="panel-title">
                                        <h4>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed">
                                                <span></span>Team background</a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="text">Current team, hiring plan for the 6 months.</div>
                                    </div>
                                </div>
                                <!-- End accordion item -->
                            </div>
                        </div>
                        <!-- accordion widget -->
                    </div>
                </div>
            </div>
            <!-- end:Contact page -->
            <footer id="footer" class="p-top-50">
                <div class="container">
                    <div class="row br-btm">
                        <div class="footer-wrap clearfix text-center">
                            <div class="col-md-4">
                                <span>
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <address>
                                    <strong>SILICON VALLEY</strong>
                                    <br>201 Spear Str.
                                    <br>San Francisco, CA 94105
                            </div>
                            <!-- col-4 -->
                            <div class="col-md-4">
                                <span>
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <address>
                                    <strong>ASIA PACIFIC</strong>
                                    <br>243A De La Thanh Str.
                                    <br>Hanoi, Vietnam
                            </div>
                            <div class="col-md-4">
                                <span>
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <address>
                                    <strong>EUROPE</strong>
                                    <br>125 Erzsebet Kiralyne Str.
                                    <br>1142 Budapest, Hungary
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    <div class="btm-footer col-md-12 text-center">
                        <!-- <ul class="footer-links clearfix list-inline list-unstyled">
                            <li>
                                <a href="about.html#rewards" class="external">Buy App</a>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="about.html">About us</a>
                            </li>
                            <li>
                                <a href="about.html">Privacy</a>
                            </li>
                            <li>
                                <a href="contact-form.html">Contact</a>
                            </li>
                            <li>
                                <a href="blog.html">Updates</a>
                            </li>
                            <li>
                                <a href="about.html">Feedbacks</a>
                            </li>
                        </ul> -->
                        <p class="p-top-10">All Rights Reserved @1991-2014 Radar Capital</p>
                        <ul class="socials list-inline list-unstyled p-top-10">
                            <li>
                                <a class="about-social-icon gplus" href="#">
                                    <i class="fa fa-google-plus" style=""></i>
                                </a>
                            </li>
                            <li>
                                <a class="about-social-icon pinterest" href="#">
                                    <i class="fa fa-pinterest" style=""></i>
                                </a>
                            </li>
                            <li>
                                <a class="about-social-icon twitter" href="#">
                                    <i class="fa fa-twitter" style=""></i>
                                </a>
                            </li>
                            <li>
                                <a class="about-social-icon rss" href="#">
                                    <i class="fa fa-rss" style=""></i>
                                </a>
                            </li>
                            <li>
                                <a class="about-social-icon facebook" href="#">
                                    <i class="fa fa-facebook" style=""></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/bootstrap-contact.js"></script>
            <script src="js/jquery.validate.pack.js"></script>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
            <script type="text/javascript">
                // When the window has finished loading create our google map below
                google.maps.event.addDomListener(window, 'load', init);

                function init() {
                    // Basic options for a simple Google Map
                    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                    var mapOptions = {
                        // How zoomed in you want the map to start at (always required)
                        zoom: 11,

                        // The latitude and longitude to center the map (always required)
                        center: new google.maps.LatLng(40.6700, -73.9400), // New York

                        // How you would like to style the map. 
                        // This is where you would paste any style found on Snazzy Maps.
                        styles: [{
                                featureType: 'water',
                                stylers: [{
                                        color: '#95ce53'
                                    }, {
                                        visibility: 'on'
                                    }
                                ]
                            }, {
                                featureType: 'landscape',
                                stylers: [{
                                        color: '#f2f2f2'
                                    }
                                ]
                            }, {
                                featureType: 'road',
                                stylers: [{
                                        saturation: -100
                                    }, {
                                        lightness: 45
                                    }
                                ]
                            }, {
                                featureType: 'road.highway',
                                stylers: [{
                                        visibility: 'simplified'
                                    }
                                ]
                            }, {
                                featureType: 'road.arterial',
                                elementType: 'labels.icon',
                                stylers: [{
                                        visibility: 'off'
                                    }
                                ]
                            }, {
                                featureType: 'administrative',
                                elementType: 'labels.text.fill',
                                stylers: [{
                                        color: '#444444'
                                    }
                                ]
                            }, {
                                featureType: 'transit',
                                stylers: [{
                                        visibility: 'off'
                                    }
                                ]
                            }, {
                                featureType: 'poi',
                                stylers: [{
                                        visibility: 'off'
                                    }
                                ]
                            }
                        ]
                    };

                    // Get the HTML DOM element that will contain your map 
                    // We are using a div with id="map" seen below in the <body>
                    var mapElement = document.getElementById('map');

                    // Create the Google Map using out element and options defined above
                    var map = new google.maps.Map(mapElement, mapOptions);
                }
            </script>
    </body>

</html>