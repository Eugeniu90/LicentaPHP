<?php
session_start();
?>
<html class=" -webkit-">
<head>
    <title>Bootstrap Theme Company</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php

    if ($_POST['buttonType'] == 'linux') {
        $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/test.sh");
        echo "$exec1";
    }
?>
<header>
    <nav role="navigation">
        <ul>
            <li id="menu"><a href="userpage.php"><i class="material-icons">menu</i></a></li>
            <li id="title">Automated Linux Cloud</li>
            <li id="more"><a href="home.php"><i class="material-icons">more_vert</i></a></li>
        </ul>
    </nav>
</header>

</style>

<body>
<div class="jumbotron text-center">
    <h1>
     <button class="btn btn-primary m-5" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="toggleWindows()">
        START
</button>

    </h1>
    <p>We specialize in blablabla</p>
</div>
</body>
<div class="container-fluid text-center">
    <h2>Servicii</h2>
    <h4>What we offer</h4>
    <br>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </div>





<div id="buttons-wrapper">
    <!-- linux and water buttons + post-->

    <div class="instant-water-linux wrapper-section">
        <span class="section-description">Use below buttons to create new services!</span>
        <div class="button-wrap" id="linuxdiv">
            <form action="home.php" method="post" id="linuxform">
                <input type="hidden" name="buttonType" value="linux">
                <button type="submit" class="clicked" id="linux">linux<span>Press button for creating new instance of service!</span></button>
            </form>
        </div>

        <div class="container-fluid">
		<div class="col-12">
			<div class="d-flex flex-wrap justify-content-center">
				<h1 class="w-100 text-center text-center"><u>Licenta mea</u></h1>


                <div id="windows" class="w-100 hide">

					<div class="d-flex justify-content-center">
						<div class="card-deck">
						  <div class="card">
						    <img class="card-img-top" src="images/tomcat.jpg" alt="PHOYO">
						    <div class="card-body">
						      <h5 class="card-title">My sql pentru Linux</h5>
                                <form action="home.php" method="post" id="linuxform">
                                    <input type="hidden" name="buttonType" value="linux">
                                    <button type="submit" class="clicked" id="linux">linux<span>Press button for creating new instance of service!</span></button>
                                </form>
						      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						    </div>
						  </div>
						  <div class="card">
						    <img class="card-img-top" src="..." alt="Card image cap">
						    <div class="card-body">
						      <h5 class="card-title">Apache pentru windows</h5>
						      <p class="card-text">Aici o sa ia serviciul de apache</p>
						      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    </div>
    <script type="text/javascript">

        function toggleWindows() {
            $('#windows').removeClass('hide');
            $('#linux').addClass('hide');

        }
    </script>
    <script
            src="//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>//jQuery(function ($) {

    </script>
</body>
</html>
