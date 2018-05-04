<!DOCTYPE html>

<html lang="en">

<head>Company
    <title>Licenta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    .navbar {
        margin-bottom: 0;
        background-color: #f4511e;
        z-index: 9999;
        border: 0;
        font-size: 12px !important;
        line-height: 1.42857143 !important;
        letter-spacing: 4px;
        border-radius: 0;
    }

    .navbar li a, .navbar .navbar-brand {
        color: #fff !important;
    }

    .navbar-nav li a:hover, .navbar-nav li.active a {
        color: #f4511e !important;
        background-color: #fff !important;
    }

    .navbar-default .navbar-toggle {
        border-color: transparent;
        color: #fff !important;
    }
    .jumbotron {
        background-color: #f4511e; /* Orange */
        color: #ffffff;

    }
    .col-sm-4 {
        color: #f4511e;
        font-size: 10px;
    }

    .container-fluid{
        color: #f4511e;
        font-size: 50px;
    }
    .carousel-control.right, .carousel-control.left {
        background-image: none;
        color: #f4511e;
    }

    .carousel-indicators li {
        border-color: #f4511e;
    }

    .carousel-indicators li.active {
        background-color: #f4511e;
    }

    .item h4 {
        font-size: 19px;
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
    }

    .item span {
        font-style: normal;
    }

</style>

<body>

<div class="jumbotron text-center">
    <h1>Licenta</h1>
    <p>We specialize in Cloud</p>
    <form class="form-inline">
        <div class="input-group">
            <div class="input-group-btn">
                <button class="btn btn-primary m-5" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="toggleWindows()">
                    START!
                </button>
                <form action="home.php" method="post" id="linuxform">
                    <input type="hidden" name="buttonType" value="linux">
                    <button type="submit" class="clicked" id="linux">linux<span>Press button for creating new instance of service!</span></button>
                </form>

            </div>

    </form>
</div>
<div class="button-wrap" id="waterdiv">
    <form action="new.php" method="post" id="linux">
        <input type="hidden" name="buttonType" value="linux">
        <button type="submit" class="clicked" id="linux">Linux<span>Press button for new service!</span></button>
    </form>
</div>
</div>

<div class="container-fluid text-center">
    <h2>Apache-Tomcat</h2>
    <h4>What we offer</h4>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-off"></span>
            <h4>Zabbix-Management</h4>
            <form action="test.php" method="post" id="zabbix">
                <input type="hidden" name="buttonType" value="zabbix">
                <button type="submit" class="clicked" id="zabbix">Linux<span>Press button for new service!</span></button>
            </form>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-heart"></span>
            <h4>MySQL DB</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-lock"></span>
            <h4> jenkins</h4>
            <form action="new.php" method="post" id=" jenkins">
                <input type="hidden" name="buttonType" value=" jenkins">
                <button type="submit" class="clicked" id=" jenkins"> jenkins<span>Press button for new service!</span></button>
            </form>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-leaf"></span>
            <h4>Hazelast</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-certificate"></span>
            <h4>Java</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-wrench"></span>
            <h4>haproxy</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
    </div>
</div>

<h2>What our customers say</h2>
<div id="feedback" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#feedback" data-slide-to="0" class="active"></li>
        <li data-target="#feedback" data-slide-to="1"></li>
        <li data-target="#feedback" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <h4>"Fast and cool!!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
        </div>
        <div class="item">
            <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
        </div>
        <div class="item">
            <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
        </div>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#feedback" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#feedback" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script type="text/javascript">
    function toggleWindows() {
        $('#windows').removeClass('hide');
        $('#linux').addClass('hide');


</script>
<!DOCTYPE html>

<html lang="en">

<head>Compan
    <title>Licenta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .jumbotron {
        background-color: #f4511e; /* Orange */
        color: #ffffff;

    }
    .col-sm-4 {
        color: #f4511e;
        font-size: 10px;
    }

    .container-fluid{
        color: #f4511e;
        font-size: 50px;
    }
    .carousel-control.right, .carousel-control.left {
        background-image: none;
        color: #f4511e;
    }

    .carousel-indicators li {
        border-color: #f4511e;
    }

    .carousel-indicators li.active {
        background-color: #f4511e;
    }

    .item h4 {
        font-size: 19px;
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
    }

    .item span {
        font-style: normal;
    }

</style>

<div class="jumbotron text-center">
    <h1>Licenta</h1>
    <p>We specialize in Cloud</p>
    <form class="form-inline">
        <div class="input-group">
            <div class="input-group-btn">
                <button class="btn btn-primary m-5" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="toggleWindows()">
                    START!
                </button>
                <form action="home.php" method="post" id="linuxform">
                    <input type="hidden" name="buttonType" value="linux">
                    <button type="submit" class="clicked" id="linux">linux<span>Press button for creating new instance of service!</span></button>
                </form>

            </div>

    </form>
</div>
<div class="button-wrap" id="waterdiv">
    <form action="test.php" method="post" id="linux">
        <input type="hidden" name="buttonType" value="linux">
        <button type="submit" class="clicked" id="linux">Linux<span>Press button for new service!</span></button>
    </form>
</div>
</div>

<div class="container-fluid text-center">
    <h2>Apache-Tomcat</h2>
    <h4>What we offer</h4>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-off"></span>
            <h4>Zabbix-Management</h4>
            <form action="test.php" method="post" id="zabbix">
                <input type="hidden" name="buttonType" value="zabbix">
                <button type="submit" class="clicked" id="zabbix">Linux<span>Press button for new service!</span></button>
            </form>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-heart"></span>
            <h4>MySQL DB</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-lock"></span>
            <h4> jenkins</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-leaf"></span>
            <h4>Hazelast</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-certificate"></span>
            <h4>Java</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-wrench"></span>
            <h4>haproxy</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
    </div>
</div>

<h2>What our customers say</h2>
<div id="feedback" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#feedback" data-slide-to="0" class="active"></li>
        <li data-target="#feedback" data-slide-to="1"></li>
        <li data-target="#feedback" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <h4>"Fast and cool!!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
        </div>
        <div class="item">
            <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
        </div>
        <div class="item">
            <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
        </div>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#feedback" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#feedback" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>




<script type="text/javascript">
    function toggleWindows() {
        $('#windows').removeClass('hide');
        $('#linux').addClass('hide');


</script>
<?php

if ($_POST['buttonType'] == 'linux') {
    $exec1 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/test.sh");
    echo "$exec1";
}

if (($_POST['buttonType'] == 'zabbix') {
    $exec2 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/zabbix.sh");
    echo "$exec2";}

if (($_POST['buttonType'] == ' jenkins') {
    $exec3 = shell_exec("/usr/bin/python /Users/eugeniugoncearuc/Personal/LicentaPHP/python/ jenkins.sh");
    echo "$exec3";}
?>
</body>
</html>

</html>