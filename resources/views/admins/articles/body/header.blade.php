
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>


   .material-icons{
    position: absolute;
    left: 514px;
   }


    </style>
</head>
<body>


<nav>
  <div class="nav-wrapper">
    <a href="/admin/dashboard" class="brand-logo">Admin</a>
    <ul class="right hide-on-med-and-down">
      <li>  <a href="{{route('articles.show')}}">articles</a></li>
      <li><a href="{{route('categories.show')}}">categories</a></li>
      <li><a href="{{route('destroy')}}">logout</a></li>
    
    </ul>
  </div>
</nav>


@yield('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      M.updateTextFields();
      $('select').formSelect();
    $('.collapsible').collapsible();
  });

        
	$(document).ready(function(){
    $(".dropdown-trigger").dropdown();
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
