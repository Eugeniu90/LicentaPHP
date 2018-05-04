<!DOCTYPE html>

<html lang="en">

<head>
    <title>CloudBase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="jquery.bootstrap-growl.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<style>

    .jumbotron {
        background-color: olivedrab;
        color: #fff;
        padding: 100px 25px;
    }
    body {
        font: 400 15px Lato, sans-serif;
        position: relative;
    }

    .jumbotron {
        font-family: Montserrat, sans-serif;
    }

    .navbar {
        font-family: Montserrat, sans-serif;
    }
    footer .glyphicon {
        font-size: 40px;
        margin-bottom: 10px;
        color: olivedrab;
    }
    .navbar {
        margin-bottom: 0;
        background-color: olivedrab;
        z-index: 9999;
        border: 0;
        font-size: 12px !important;
        line-height: 1.42857143 !important;
        letter-spacing: 4px;
        border-radius: 0;
    }
    h2 {
        text-transform: uppercase;
        color: #303030;
        font-weight: 600;
        margin-bottom: 30px;
    }

    h4 {
        line-height: 1.375em;
        color: #303030;
        font-weight: 400;
        margin-bottom: 30px;
    }

    .navbar li a, .navbar .navbar-brand {
        color: #fff !important;
    }

    .navbar-nav li a:hover, .navbar-nav li.active a {
        color: olivedrab !important;
        background-color: #fff !important;
    }

    .navbar-default .navbar-toggle {
        border-color: transparent;
        color: #fff !important;
    }
    .jumbotron {
        background-color: olivedrab; /* Orange */
        color: #ffffff;

    }

    .carousel-control.right, .carousel-control.left {
        background-image: none;
        color: olivedrab;
    }

    .carousel-indicators li {
        border-color: olivedrab;
    }

    .carousel-indicators li.active {
        background-color: olivedrab;
    }

    .item h4 {
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
    }

    .item span {
        font-style: normal;
    }

    form {
        font-size: 1.5em;
    }

    h1, h3 {
        color: olivedrab;
    }

    .stretch {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        z-index: -1;
    }
</style>
<body data-spy="scroll" data-target=".navbar">
    <nav class="navbar navbar-expand-lg navbar-default fixed-top">
        <a class="navbar-brand" href="#myPage">CloudBase</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#feedback" class="nav-link">Feedback</a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="nav-link">Technologies</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="#googleMap" class="nav-link">Locatie</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid position-relative" style="background: transparent; overflow: hidden;">
        <video autoplay muted loop id="myVideo" class="stretch">
            <source src="../images/Aloha-Mundo.mp4" type="video/mp4">
        </video>
        <div class="container" style="margin-top: 200px;">
            <h1 class="display-4" style="color:white">CloudBase</h1>
            <p class="lead">We specialize in Cloud</p>
            <form class="form-inline">
                <div class="input-group w-100">
                    <div class="input-group-btn w-100">
                        <button class="btn mb-5 btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="toggleWindows()">
                            Start creating your services!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid" style="background-color: white">
        <div class="mb-5 d-none" id="tiles">
            <h1>Apache-Tomcat</h1>
            <h3>What we offer</h3>
            <br>
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="../images/zabbix-logo_8nfm.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Zabbix-Management</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <form action="test.php" method="post" id="zabbix" class="text-center">
                            <input type="hidden" name="buttonType" value="zabbix">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" id="zabbix">Linux<span>Press button for creating service!</span></button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/jenkins.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"> jenkins</h4>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <form action="test.php" method="post" id="jenkins" class="text-center">
                            <input type="hidden" name="buttonType" value="Jenkins">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" id="jenkins">jenkins<span>Press button for creating service!</span></button>
                        </form>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/haproxy.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">HAproxy</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <form action="test.php" method="post" id="haproxy">
                            <input type="hidden" name="buttonType" value="haproxy">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" id="haproxy">haproxy<span>Press button for creating service!</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-deck mt-3">
                <div class="card">
                    <img class="card-img-top" src="../images/nginx.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Nginx</h4>
                        <p class="card-text">Dupa ce ati apasat butonul, ve-ti putea accesa serverul pe urmatorul link: http://localhost:8080</p>
                        <form action="test.php" method="post" id="nginx">
                            <input type="hidden" name="buttonType" value="nginx">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" id="nginx ">jenkins<span>Press button for creating service!</span></button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/kibana2.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Kibana-Elasticsearch-Logstash-Filebeat</h4>
                        <p class="card-text">On the click, the link will be copyed to your clipboard, please use it!</p>
                        <form action="test.php" method="post" id="kibana">
                            <input type="hidden" name="buttonType" value="kibana">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" onclick="copyToClipboard('http://localhost:5601/app/kibana#/visualize/step/1?_g=()')" id="kibana">Start ELK!</button>
                        </form>
                        <form action="test.php" method="post" id="kibana_stop">
                            <input type="hidden" name="buttonType" value="kibana_stop">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" onclick="copyToClipboard('http://localhost:5601/app/kibana#/visualize/step/1?_g=()')" id="kibana_stop">Stop ELK!</button>
                        </form>
                        <p class="card-text"><small class="text-muted">Please follow the link: http://localhost:5601/app/kibana#/home?_g=() </small></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../images/rabbit.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">RabbitMQ</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <form action="test.php" method="post" id="rabbitmq">
                            <input type="hidden" name="buttonType" value="rabbitmq">
                            <button type="submit" class="clicked btn btn-outline-success btn-lg" id="rabbitmq">RabbitMQ<span>Press button for creating service!</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-right mb-5 pt-3" id="feedback">Reviews &amp; Feedback</h1>
        <div id="carouselExampleControls" class="carousel slide pb-5 pt-5" data-ride="carousel" data-interval="2000">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <h4>"Fast and cool!!"<br><span style="font-style:normal;">Gicu Gigel</span></h4>
                </div>
                <div class="carousel-item">
                    <h4>"One word... WOW!!"<br><span style="font-style:normal;">Marcu Vladisla</span></h4>
                </div>
                <div class="carousel-item">
                    <h4>"Reliabile, fast, real-time!"<br><span style="font-style:normal;">Mihnea Matei</span></h4>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <h1 id="portfolio">Used technologies:</h1>
        <div class="card-deck mb-5">
            <div class="card">
                <img class="card-img-top" src="../images/docker.jpg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Docker</h3>
                    <p class="card-text">Yes, we built Docker</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../images/tomcat.jpg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Tomcat Apache</h3>
                    <p class="card-text"Can support applications</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../images/kibana.png" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Kibana-Elasticsearch-Filebeat-Logstash</h3>
                    <p class="card-text">This pipeline tool can implement statistic all your logs in one nice graphic!</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        
    </div>

    <div class="d-flex" style="background-color: olivedrab">
        <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center flex-column" style="color:white">
            <h1 style="color: white" id="contact">Contact</h1>
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><i class="glyphicon glyphicon-map-marker"></i> BUCURESTI, RO</p>
            <p><span class="glyphicon glyphicon-phone"></span> +40747764281</p>
            <p><span class="glyphicon glyphicon-envelope"></span> eugeniu.goncearuc@etti.stud.upb.com</p>
        </div>
        <div class="col-12 col-lg-6 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.9696694486433!2d26.05540721604565!3d44.433784379102384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b201db0e7fc333%3A0xe151c4506f229f7b!2sFaculty+of+Electronics%2C+Telecommunications+and+Information+Technology!5e0!3m2!1sen!2sro!4v1524472649979" frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen id="googleMap"></iframe>
        </div>
    </div>
</body>

<script type="text/javascript">
    function toggleWindows() {
        $('#tiles').removeClass('d-none');
    }

    function copyToClipboard(str) {
        const el = document.createElement('textarea');
        el.value = str;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
    };

    $("nav ul li a[href^='#']").on('click', function(e) {
        console.log('asdads')
        // prevent default anchor click behavior
        e.preventDefault();

        // store hash
        var hash = this.hash;

        // animate
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 1000, function(){

            // when done, add hash to url
            // (default click behaviour)
            window.location.hash = hash;
        });

    });
</script>
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(41.878114, -87.629798);
        var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>



<?php

if ($_POST['buttonType'] == 'linux') {
    $exec1 = shell_exec("/usr/bin/sh /Users/eugeniugoncearuc/Personal/LicentaPHP/python/test.sh");
    echo "$exec1";
   }
?>
<?php

if ($_POST['buttonType'] == 'zabbix') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/zabbix.sh");
    echo "$exec1";
}
?>
<?php

if ($_POST['buttonType'] == 'jenkins') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/jenkins.sh");
    echo "$exec1";
}
?>
<?php

if ($_POST['buttonType'] == 'haproxy') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/haproxy.sh");
    echo "$exec1";
}
?>
<?php

if ($_POST['buttonType'] == 'rabbitmq') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/Rabbit-MQ/rabbitmq.sh");
    echo "$exec1";
}
?>
<?php

if ($_POST['buttonType'] == 'kibana') {
    $exec3 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/elk.sh");
    echo "$exec3";
}
?>
<?php

if ($_POST['buttonType'] == 'kibana_stop') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/Rabbit-MQ/elk_stop.sh");
    echo "$exec1";
}
?>
<?php

if ($_POST['buttonType'] == 'nginx') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/nginx.sh");
    echo "$exec1";
}



?>

</html>