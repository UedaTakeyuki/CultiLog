<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plants Log</title>

    @yield('header_before')
    
    <!-- BOOTSTRAP start -->
    <!--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP end -->

    @yield('header_after')

</head>
<body>
    
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">栽培monitor</a>
		</div>
		
		<div class="collapse navbar-collapse" id="navbarEexample1">
			<ul class="nav navbar-nav">
				<li><a href="/unit">栽培棚</a></li>
				<li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">品種<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/plant">一覧</a></li>
						<li><a href="/plant/create">追加</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!--    <div class="container"> -->
        @yield('content')
<!--    </div> -->
</body>
</html>