<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Ticket Submission System</title>
</head>
<body>
{{--<div class="container">--}}
	@yield('header')
{{--</div>--}}

<div class="container">
	@yield('content')
</div>
{{----}}
<div class="container">
	{{--<div class="row">--}}
	@yield('footer')
	{{--</div>--}}
</div>




{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
{{--<script type="text/javascript" src="{{ public_path('js/bootstrap.js')  }}"></script>--}}
{{--	<script type="text/javascript" src="{{ url('js/bootstrap.min.js')  }}"></script>--}}
{{--<script type="text/javascript" src="{{ public_path('js/bootstrap.min.js')  }}"></script>--}}
{{--<script type="text/javascript" src="{{ public_path('js/jquery-3.2.1.js')  }}"></script>--}}
{{--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>--}}
{{--<script src="http://code.jquery.com/jquery-latest.js"></script>--}}


<script>
    $('.dropdown-toggle').dropdown()
</script>

</body>
</html>