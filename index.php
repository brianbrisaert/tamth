<?php
$pdo = new PDO('mysql:host=185.98.131.149;dbname=tamth1286609', 'tamth1286609', 'Sonysony10!');
$status_result = $pdo->query("SELECT status FROM site_status WHERE id = 1")->fetch();
$status_actuel = $status_result['status'];

$query = $pdo->query("SELECT value FROM settings WHERE name = 'reouverture_date'");
$reouverture_date = $query->fetchColumn();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <?php if ($status_actuel === 'ferme') : ?>
        <div style="color: red; font-weight: bold;">
            <!DOCTYPE HTML>
<html lang="fr">

<head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Tamthai - fermé</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="css/reset.css">
        <link type="text/css" rel="stylesheet" href="css/plugins.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/cs-style.css">
        <link type="text/css" rel="stylesheet" href="css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!-- lodaer  -->
        <div class="loader-wrap">
            <div class="loader-item">
                <div class="cd-loader-layer" data-frame="25">
                    <div class="loader-layer"></div>
                </div>
                <span class="loader"></span>
            </div>
        </div>
        <!-- loader end  -->
        <!-- main start  -->
        <div id="main">
            <!-- cs-content-container -->
            <div class="cs-content-container">
                <a href="#" class="cs-logo"><img src="images/logo2.png" alt=""></a>
                <div class="cs-content-wrapper">
                    <h3>Restaurant fermé</h3>
                    <h2>Réouverture du restaurant le <?= date('d/m/Y', strtotime($reouverture_date)) ?></h2>
                    <div class="cs-subcribe-form subcribe-form fl-wrap"><br/><br/>

<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=185.98.131.149;dbname=tamth1286609', 'tamth1286609', 'Sonysony10!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Traitement du formulaire
$message_envoye = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et nettoyer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Insertion du message dans la base de données
    $stmt = $pdo->prepare("INSERT INTO messages (nom, email, message) VALUES (:nom, :email, :message)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        $message_envoye = true;
    } else {
        echo "Erreur : le message n'a pas pu être envoyé.";
    }
}
?>
                               <?php if ($message_envoye): ?>
    <p style="color: green;">Votre message a bien été envoyé. Merci de nous avoir contactés !</p>
<?php endif; ?>
<font color ="white">Vous pouvez toujours nous écrire : </font>
<br/><br/>
<form method="post" action="index.php">
    <label for="nom"><font color ="white">Nom :</font></label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="email"><font color ="white">Email :</font></label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="message"><font color ="white">Message :</font></label><br>
    <textarea id="message" name="message" rows="5" required></textarea><br><br>

    <div class="row"><button type="submit" class="btn">Envoyer</button></div>
</form>
<!--
                        <p>Inscrivez-vous à nos envois de mail afin d'être tenus au courant de la réouverture du site et du restaurant.
                        </p>
                        <form id="subscribe" class="fl-wrap">
                            <input class="enteremail" name="email" id="subscribe-email" placeholder="Votre Email" spellcheck="false" type="text">
                            <button type="submit" id="subscribe-button" class="subscribe-button color-bg" action="blank.php">Envoyer </button>
                            <label for="subscribe-email" class="subscribe-message"></label>
                        </form>-->

</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
                    </div>
                    <div class="clearfix"></div>
                    <div class="bold-separator"><span></span></div>
                    <div class="clearfix"></div>
                    
                </div>
                <div class="illustration_bg">
                    <div class="bg"  data-bg="images/bg/dec/cs-bg.png"></div>
                </div>
            </div>
            <!-- cs-content-container end-->
            <!-- cs-media -->
            <div class="cs-media">
                              
              
                <!-- cs-media-container -->
               <div class="cs-media-container counter-widget fl-wrap" data-countDate="<?= date('m/d/Y', strtotime($reouverture_date)) ?>">
                    <!-- countdown -->
                    <div class="countdown">
                        <div class="cs-countdown-item">
                            <span class="days rot">00</span>
                            <p>Jours</p>
                        </div>
                        <div class="cs-countdown-item">
                            <span class="hours rot">00</span>
                            <p>Heures </p>
                        </div>
                        <div class="cs-countdown-item">
                            <span class="minutes rot2">00</span>
                            <p>Minutes </p>
                        </div>
                        <div class="cs-countdown-item no-dec">
                            <span class="seconds rot2">00</span>
                            <p>Secondes</p>
                        </div>
                    </div>
                    <!-- countdown end -->      




                               <?php if ($message_envoye): ?>
    <p style="color: green;">Votre message a bien été envoyé. Merci de nous avoir contactés !</p>
<?php endif; ?>


              
                </div>
                <!--cs-media-container end -->
                <!-- cs-contacts --> 
                <div class="cs-contacts">
                    <ul>
                        <li><span>Télephone :</span><a href="#">082 71 42 17</a></li>
                        <li><span>Mail  :</span><a href="#">tamthai.salad@gmail.com</a></li>
                        <li><span>Adresse : </span><a href="#">Chaussée de Namur 18, 5537 Annevoie-Rouillon</a></li>
                    </ul>
                </div>
                <!-- cs-contacts end --> 
                <!--multi-slideshow-wrap_1 -->
                <div class="multi-slideshow-wrap_fs">
                    <div class="full-height fl-wrap">
                        <!--ms-container-->
                        <div class="multi-slideshow_fs ms-container fl-wrap full-height">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!--ms_item-->
                                    <div class="swiper-slide">
                                        <div class="ms-item_fs fl-wrap">
                                            <div class="bg" data-bg="images/bg/10.jpg"></div>
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                    <!--ms_item end-->
                                    <!--ms_item-->
                                    <div class="swiper-slide ">
                                        <div class="ms-item_fs fl-wrap">
                                            <div class="bg" data-bg="images/bg/11.jpg"></div>
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                    <!--ms_item end-->
                                    <!--ms_item-->
                                    <div class="swiper-slide">
                                        <div class="ms-item_fs fl-wrap">
                                            <div class="bg" data-bg="images/bg/17.jpg"></div>
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                    <!--ms_item end-->                                                 
                                </div>
                            </div>
                        </div>
                        <!--ms-container end-->
                    </div>
                    <div class="hiddec-anim"></div>
                </div>
                <!--multi-slideshow-wrap_1 end-->                
            </div>
            <!-- cs-media end-->
            <!-- reservation-modal-wrap-->          
            <div class="reservation-modal-wrap">
                <div class="reserv-overlay crm">
                    <div class="cd-reserv-overlay-layer" data-frame="25">
                        <div class="reserv-overlay-layer"></div>
                    </div>
                </div>
                <div class="reservation-modal-container bot-element">
                    <div class="reservation-modal-item fl-wrap">
                        <div class="close-reservation-modal crm"><i class="fal fa-times"></i></div>
                        <div class="reservation-bg"></div>
                        <div class="section-title">
                            <h4>Don't forget to book a table</h4>
                            <h2>Table Reservations</h2>
                            <div class="dots-separator fl-wrap"><span></span></div>
                        </div>
                        <div class="reservation-wrap">
                            <div id="reserv-message"></div>
                            <form  class="custom-form" action="https://restabook.kwst.net/dark/php/reservation.php" name="reservationform" id="reservationform">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  name="email" id="email" placeholder="Email Address *" value=""/>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  name="phone" id="phone" placeholder="Phone *" value=""/>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="fl-wrap">
                                                <select name="numperson" id="persons" data-placeholder="Persons" class="chosen-select no-search-select">
                                                    <option data-display="Persons">Any</option>
                                                    <option value="1">1 Person</option>
                                                    <option value="2">2 People</option>
                                                    <option value="3">3 People</option>
                                                    <option value="4">4 People</option>
                                                    <option value="5">5 People</option>
                                                    <option value="Banquet">Banquet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-6">
                                            <div class="date-container2 fl-wrap">
                                                <input type="text" placeholder="Date" id="res_date"     name="resdate"   value=""/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="fl-wrap">
                                                <select name="restime" id="resrv-time" data-placeholder="Time" class="chosen-select no-search-select">
                                                    <option data-display="Time">Any</option>
                                                    <option value="10:00am">10:00 am</option>
                                                    <option value="11:00am">11:00 am</option>
                                                    <option value="12:00pm">12:00 pm</option>
                                                    <option value="1:00pm">1:00 pm</option>
                                                    <option value="2:00pm">2:00 pm</option>
                                                    <option value="3:00pm">3:00 pm</option>
                                                    <option value="4:00pm">4:00 pm</option>
                                                    <option value="5:00pm">5:00 pm</option>
                                                    <option value="6:00pm">6:00 pm</option>
                                                    <option value="7:00pm">7:00 pm</option>
                                                    <option value="8:00pm">8:00 pm</option>
                                                    <option value="9:00pm">9:00 pm</option>
                                                    <option value="10:00pm">10:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea name="comments"  id="comments" cols="30" rows="3" placeholder="Your Message:"></textarea>
                                    <div class="clearfix"></div>
                                    <button class="btn color-bg" id="reservation-submit">Reserve Table  <i class="fal fa-long-arrow-right"></i></button>
                                </fieldset>
                            </form>
                        </div>
                        <!-- reservation-wrap end-->
                    </div>
                </div>
            </div>
            <!-- reservation-modal-wrap end-->   
            <!-- cursor-->
            <div class="element">
                <div class="element-item"></div>
            </div>
            <!-- cursor end-->                                                    
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="js/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/cs-scripts.js"></script>
    </body>

<!-- Mirrored from restabook.kwst.net/dark/coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2022 19:57:34 GMT -->
</html>
        </div>
    <?php else : ?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Tamthai restaurant</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content="Tamthai Restaurant Annevoie"/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="css/reset.css">
        <link type="text/css" rel="stylesheet" href="css/plugins.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/dark-style.css">
        <link type="text/css" rel="stylesheet" href="css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!-- lodaer  -->
        <div class="loader-wrap">
            <div class="loader-item">
                <div class="cd-loader-layer" data-frame="25">
                    <div class="loader-layer"></div>
                </div>
                <span class="loader"></span>
            </div>
        </div>
        <!-- loader end  -->
        <!-- main start  -->
        <div id="main">
            <!-- header  -->
            <header class="main-header">
                <!-- header-top  -->
                <div class="header-top">
                    <div class="container">
                  
                        <div class="header-top_contacts"><a href="#"><span>Téléphone :</span> 082 71 42 17</a><a href="#"><span>Mail :</span> tamthai.salad@gmail.com</a></div>
                    </div>
                </div>
               <!--header-top end -->
                <div class="header-inner  fl-wrap">
                    <div class="container">
                        <div class="header-container fl-wrap">
                            <a href="index.php" class="logo-holder ajax"><img src="images/logo.png" alt=""></a>
                            <div class="show-reserv_button show-rb"><span>Reservation</span> <i class="fal fa-bookmark"></i></div>
                            <div class="show-share-btn showshare htact"><i class="fal fa-bullhorn"></i> <span class="header-tooltip">Partager</span></div>
                           
                            <!-- nav-button-wrap-->
                            <div class="nav-button-wrap">
                                <div class="nav-button">
                                    <span></span><span></span><span></span>
                                </div>
                            </div>
                            <!-- nav-button-wrap end-->
                             
                             <?php include 'nav.php';?>
 <!-- navigation  end -->                               
                            <!-- header-cart_wrap  -->
                           <div class="header-cart_wrap novis_cart">
                                <div class="header-cart_title">Your Cart <span>4 items</span></div>
                                <div class="header-cart_wrap_container fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="widget-posts fl-wrap">
                                            <ol>
                                                <li class="clearfix">
                                                    <a href="#"  class="widget-posts-img"><img src="images/menu/404.jpg" class="respimg" alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Grilled Steaks</a>
                                                        <div class="widget-posts-descr_calc clearfix">1 <span>x</span> $45</div>
                                                    </div>
                                                    <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="#"  class="widget-posts-img"><img src="images/menu/404.jpg" class="respimg" alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Cripsy Lobster & Shrimp Bites</a>
                                                        <div class="widget-posts-descr_calc clearfix">2 <span>x</span> $22</div>
                                                    </div>
                                                    <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="#"  class="widget-posts-img"><img src="images/menu/404.jpg" class="respimg" alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Chicken tortilla soup</a>
                                                        <div class="widget-posts-descr_calc clearfix">1 <span>x</span> $37</div>
                                                    </div>
                                                    <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                            <!-- header-cart_wrap end  -->
                            <!-- share-wrapper -->
                            <div class="share-wrapper isShare">
                                <div class="share-container fl-wrap"></div>
                            </div>
                            <!-- share-wrapper-end -->
                        </div>
                    </div>
                    
                </div>
                <!-- header-inner end  -->
            </header>
            <!--header end -->	
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- hero-wrap-->	
                <div class="hero-wrap fl-wrap full-height" data-scrollax-parent="true">
                    <!--multi-slideshow-wrap_1 -->
                    <div class="multi-slideshow-wrap_fs" data-scrollax="properties: { translateY: '30%' }">
                        <div class="full-height fl-wrap">
                            <!--ms-container-->
                            <div class="multi-slideshow_fs ms-container fl-wrap full-height">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!--ms_item-->
                                        <div class="swiper-slide">
                                            <div class="ms-item_fs fl-wrap">
                                                <div class="bg" data-bg="images/bg/19.jpg"></div>
                                                <div class="overlay"></div>
                                            </div>
                                        </div>
                                        <!--ms_item end-->
                                        <!--ms_item-->
                                        <div class="swiper-slide ">
                                            <div class="ms-item_fs fl-wrap">
                                                <div class="bg" data-bg="images/bg/1.jpg"></div>
                                                <div class="overlay"></div>
                                            </div>
                                        </div>
                                        <!--ms_item end-->
                                        <!--ms_item-->
                                        <div class="swiper-slide">
                                            <div class="ms-item_fs fl-wrap">
                                                <div class="bg" data-bg="images/bg/7.jpg"></div>
                                                <div class="overlay"></div>
                                            </div>
                                        </div>
                                        <!--ms_item end-->                                                 
                                    </div>
                                </div>
                            </div>
                            <!--ms-container end-->
                        </div>
                        <div class="hiddec-anim"></div>
                    </div>
                    <!--multi-slideshow-wrap_1 end-->                       
                    <div class="hero-title-wrap fl-wrap">
                        <div class="container">
                            <div class="hero-title">

                                <h4>Une cuisine Thaï authentique.</h4>
                                <h2>Bienvenue au Tamthai <br/>

                                <a href="menu.php" class="hero_btn">Voir le menu sur place <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <!--hero_promo-wrap--> <!--
                    <div class="hero_promo-wrap bot-element2">
                        <div class="hero_promo-button">
                            <a href="https://vimeo.com/10322316" class="image-popup"><i class="fas fa-play"></i></a>
                        </div>
                        <div class="hero_promo-title">
                            <h4>View Promo Video</h4>
                        </div>
                    </div>
                    <!--hero_promo-wrap end--> --> 
                   
                    <!-- hero-bottom-container -->	
                    <div class="hero-bottom-container">
                        <div class="container">
                            <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scrollez vers le bas pour en découvrir plus.</span>
                            </div>
                            <a href="#sec2" class="sd_btn custom-scroll-link"><i class="fal fa-chevron-double-down"></i></a>
                        </div>
                    </div>
                    <!-- hero-bottom-container -->	
                    <div class="hero-dec_top"></div>
                    <div class="hero-dec_bottom"></div>
                    <div class="brush-dec"></div>
                </div>
                <!-- hero-wrap  end -->	
                <!-- content  -->	
                <div class="content">
                    <section class="hidden-section big-padding" data-scrollax-parent="true" id="sec2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-title text-align_left">
                                        <h4>Tamthaï</h4>
                                        <h2>Quelques mots à notre propos</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>
                                    <div class="text-block ">
                                        <p>Tamthai met à votre service son savoir-faire en termes de cuisine thaïlandaise pour le plus grand bonheur de vos papilles. Des mets variés pour tous et préparés sur mesure.
                                        </p>
                                       
                                        <a href="menu.php" class="btn fl-btn">Consulter le menu sur place.<i class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image-collge-wrap fl-wrap">
                                        <div class="main-iamge">
                                            <img src="images/all/3.jpg"   alt="">
                                        </div>
                                        <div class="images-collage-item" style="width:65%" data-position-left="68" data-position-top="-15" data-zindex="2" data-opacity="1.0"><img src="images/all/8.jpg" alt=""></div>
                                        <div class="images-collage-item col_par" style="width:120px" data-position-left="-23" data-position-top="-17" data-zindex="9" data-scrollax="properties: { translateY: '150px' }"><img src="images/cube.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-dec sec-dec_top"></div>
							<div class="wave-bg" data-scrollax="properties: { translateY: '-150px' }"></div>							
                        </div>
                    </section>
                    <!--  section end  -->   
                    <!-- section   -->
                    <section class="column-section no-padding hidden-section" data-scrollax-parent="true" id="sec4">
                        <div class="column-wrap-bg left-wrap">
                            <div class="bg par-elem "  data-bg="images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                            <div class="overlay"></div>
                            <div class="quote-box">
                                <i class="fal fa-quote-right"></i>
                                <p>Une réservation est souhaitée afin de vous garantir une place et de vous éviter tout doute lors de votre arrivée en salle.</p>
                              <!--  <div class="signature"><img src="images/signature.png" alt=""></div> -->   
                               
                            </div>
                        </div>
                        <div class="column-section-wrap dark-bg" >
                            <div class="container"  >
                                <div class="column-text">
                                    <div class="section-title">
                                        <h4>Réservez votre table en ligne ou par téléphone</h4>
                                        <h2>Heures d'ouverture</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>
                                    <div class="work-time fl-wrap"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Du mercredi au samedi</h3>
                                                <div class="hours">
                                                    18:00<br>
                                                    22:00
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h3>Dimanche</h3>
                                                <div class="hours">
                                                    12:00 - 15:00<br>
                                                    18:00 - 22:00
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="bold-separator"><span></span></div>
                                    <div class="big-number"><a href="#">082 71 42 17</a></div>
                                </div>
                            </div>
                            <div class="illustration_bg">
                                <div class="bg"  data-bg="images/bg/dec/7.png"></div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--  section    -->   
                    <section data-scrollax-parent="true">
                        <div class="container">
                            <div class="section-title">
                                <h4>Pourquoi choisir le Tamthaï ?</h4>
                                <h2>préparez-vous pour un repas de qualité</h2>
                                <div class="dots-separator fl-wrap"><span></span></div>
                            </div>
                            <div class="cards-wrap fl-wrap">
                                <div class="row">
                                    <!--card item --> 
                                    <div class="col-md-4">
                                        <div class="content-inner fl-wrap">
                                            <div class="content-front">
                                                <div class="cf-inner">
                                                    <div class="bg "  data-bg="images/services/1.jpg"></div>
                                                    <div class="overlay"></div>
                                                    <div class="inner">
                                                        <h2>Des plats varié et typiques</h2>
                                                        <h4>pour satisfaires vos envies</h4>
                                                    </div>
                                                    <div class="serv-num">01.</div>
                                                </div>
                                            </div>
                                            <div class="content-back">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <div class="dec-icon">
                                                            <i class="fal fa-fish"></i>
                                                        </div>
                                                        <p>Le restaurant propose différents types de plats, en passant par les salades et les potages typiques de Thaïlande. Ceux-ci peuvent être adaptés selon vos envies au niveau du piquant.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--card item end -->
                                    <!--card item --> 
                                    <div class="col-md-4">
                                        <div class="content-inner fl-wrap">
                                            <div class="content-front">
                                                <div class="cf-inner">
                                                    <div class="bg "  data-bg="images/services/2.jpg"></div>
                                                    <div class="overlay"></div>
                                                    <div class="inner">
                                                        <h2>Des ingrédients frais</h2>
                                                        <h4>La qualité est la clef</h4>
                                                    </div>
                                                    <div class="serv-num">02.</div>
                                                </div>
                                            </div>
                                            <div class="content-back">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <div class="dec-icon">
                                                            <i class="fal fa-carrot"></i>
                                                        </div>
                                                        <p>Tous les ingrédients utilisés sont frais et traités avec grand soin afin de vous proposer le meilleur.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--card item end -->
                                    <!--card item --> 
                                    <div class="col-md-4">
                                        <div class="content-inner fl-wrap">
                                            <div class="content-front">
                                                <div class="cf-inner">
                                                    <div class="bg "  data-bg="images/services/3.jpg"></div>
                                                    <div class="overlay"></div>
                                                    <div class="inner">
                                                        <h2>Un chef créatif et talentueux</h2>
                                                        <h4>Une expérience unique</h4>
                                                    </div>
                                                    <div class="serv-num">03.</div>
                                                </div>
                                            </div>
                                            <div class="content-back">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <div class="dec-icon">
                                                            <i class="fal fa-utensils-alt"></i>
                                                        </div>
                                                        <p>Le chef est diplômé de l'école de cuisine thaïlandaise. Il a cuisiné quotidiennement durant des années afin de parfaire ses plats et de vous proposer le meilleur dont il est capable.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--card item end -->                                                 
                                </div>
                                <div class="section-dec sec-dec_top"></div>
                                <div class="section-dec sec-dec_bottom"></div>
                            </div>
                            <
                            <div class="images-collage-item col_par" style="width:120px" data-position-left="83" data-position-top="87" data-zindex="1" data-scrollax="properties: { translateY: '150px' }"><img src="images/cube.png" alt=""></div>
                        </div>
                        <div class="section-bg">
                            <div class="bg"  data-bg="images/bg/dec/section-bg.png"></div>
                        </div>
                    </section>
                    <!--  section end  --> 
                  
                   
                  
                    
                    <!-- section   -->                        
                    <section>
                        <div class="brush-dec2 brush-dec_bottom"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>Que dit-on à notre propos ?</h4>
                                <h2>Quelques avis de nos clients</h2>
                                <div class="dots-separator fl-wrap"><span></span></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="testimonilas-carousel-wrap fl-wrap">
                          
                            <div class="testimonilas-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="images/avatar/2.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Joel Huaux</h3>
                                                    <div class="star-rating" data-starrating="5"> </div>
                                                    <p>"Super accueil et le repas impeccable. Je recommande sans hésitation "</p>
                                                    <span class="testi-number">01.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="images/avatar/3.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Marc Dantinne</h3>
                                                    <div class="star-rating" data-starrating="4"> </div>
                                                    <p>"Toujours un plaisir de s'y rendre. "</p>
                                                    <span class="testi-number">02.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="images/avatar/4.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Ingrid Thiry</h3>
                                                    <div class="star-rating" data-starrating="5"> </div>
                                                    <p>"Cuisine succulente et de qualité, un cadre magnifique et soigné, un service très sympathique, un parking aisé. "</p>
                                                    <span class="testi-number">03.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="images/avatar/5.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Blonbina</h3>
                                                    <div class="star-rating" data-starrating="5"> </div>
                                                    <p>"Pas du tout déçue,  plats délicieux , très belle décoration,  jolie terrasse, personnel très souriant. Mention spéciale pour la tarte au jasmin un délice. Hâte d'y retourner pour goûter un autre plat. Facile d accès et parking."</p>
                                                    <span class="testi-number">04.</span>
                                                </div>
                                            </div>

                                        </div>
                                        <!--testi-item end-->
                                    </div><br/><br/><br/><br/><br/><br/><br/><br/>
<center><iframe src="//embed.tablebooker.be/feedback/35729682/fr/dark/true" height="240" width="320" frameborder="0" style="width: 100%; min-width: 120px; height: 440px; border: 0;" allowtransparency="true"></iframe></center>
                                </div>
                            </div>
                            
                        </div>
                    </section>
                    <!-- section end  --> 
                </div>
                <!-- content end  -->

               <?php include 'footer.php';?>

                              
            </div>
            <!-- wrapper end -->
            




<!-- Popup Formulaire HTML -->
<div class="reservation-modal-wrap">
    <div class="reserv-overlay crm">
        <div class="cd-reserv-overlay-layer" data-frame="25">
            <div class="reserv-overlay-layer"></div>
        </div>
    </div>
    <div class="reservation-modal-container bot-element">
        <div class="reservation-modal-item fl-wrap">
            <div class="close-reservation-modal crm"><i class="fal fa-times"></i></div>
            <div class="reservation-bg"></div>
            <div class="section-title">
                <h4>Une envie de bien manger ?</h4>
                <h2>Réserver une table</h2>
                <div class="dots-separator fl-wrap"><span></span></div>
            </div>
            <div class="reservation-wrap">
                <div id="reserv-message"></div>
                <form class="custom-form" id="reservationform" action="reservation_process.php" method="POST">
                    
                    <!-- Sélection du nombre de personnes -->
                    <label for="num_people">Nombre de personnes</label>
                    <select name="num_people" id="num_people" required>
    <option value="0">Choisir</option> <!-- Pas de 'disabled' ni 'selected' -->
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
</select>


                    <!-- Sélection de la date -->
                    <label for="reservation_date">Date</label>
                    <input type="date" name="reservation_date" id="reservation_date" required />

                    <!-- Sélection de l'heure (en fonction de la date) -->
                    <label for="reservation_time">Heure</label>
                    <select name="reservation_time" id="reservation_time" required>
                        <option value="0" disabled selected>Choisir une date d'abord</option>
                    </select>

                    <!-- Champs d'information supplémentaires -->
                    <label for="first_name">Prénom</label>
                    <input type="text" name="first_name" id="first_name" required />

                    <label for="last_name">Nom</label>
                    <input type="text" name="last_name" id="last_name" required />

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required />

                    <label for="phone">Téléphone</label>
                    <input type="tel" name="phone" id="phone" required />

                    <label for="comments">Remarques</label>
                    <textarea name="comments" id="comments" placeholder="Ajoutez vos remarques ici..."></textarea>

                    <!-- Le bouton "Réserver" doit être de type submit pour envoyer le formulaire -->
                    <button type="submit">Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Fonction pour gérer les créneaux horaires disponibles en fonction de la date choisie
document.getElementById("reservation_date").addEventListener("change", function() {
    const date = new Date(this.value);
    const day = date.getDay();
    const timeSelect = document.getElementById("reservation_time");
    timeSelect.innerHTML = '';  // Clear any previous options

    // Configuration des heures d'ouverture selon le jour
    let times = [];
    if (day >= 3 && day <= 6) { // Mercredi à Samedi, 18h - 21h
        for (let hour = 18; hour <= 21; hour++) {
            times.push(`${hour}:00`, `${hour}:30`);
        }
    } else if (day === 0) { // Dimanche, 12h - 14h
        for (let hour = 12; hour <= 14; hour++) {
            times.push(`${hour}:00`, `${hour}:30`);
        }
    } else { // Lundi et Mardi (fermé)
        times.push('Fermé');
    }

    // Ajout des options au select
    times.forEach(time => {
        let option = document.createElement("option");
        option.value = time;
        option.textContent = time;
        timeSelect.appendChild(option);
    });
});
</script>






















                        </div>
                        <!-- reservation-wrap end-->
                    </div>
                </div>
            </div>
            <!-- reservation-modal-wrap end-->   
            <!-- cursor-->
            <div class="element">
                <div class="element-item"></div>
            </div>
            <!-- cursor end-->                                                    
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="js/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</php>
<?php endif; ?>
</body>
</html>
