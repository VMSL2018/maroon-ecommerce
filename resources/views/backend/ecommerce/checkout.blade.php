<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Shurjopay Form</title>
  
</head>

<body>
	<div class="container">
	<div class="row col-md-4 col-sm-4 col-lg-4"></div>	
		<div class="row col-md-12 col-sm-12 col-lg-12 clear-both">
		
			<div class="panel panel-primary">
			  <div class="panel-heading">Shurjopay Payment</div>
			  <div class="panel-body">					  
				<form action="/checkout" method="post">
				    @csrf
				  <div class="form-group">
					<label for="text">Amount:</label>
					<input type="text" class="form-control" id="amount" name="amount" required>
				  </div>  
				  <button type="submit" class="btn btn-success btn-lg center-block">Submit</button>
				</form>
			  </div>
			</div>			
			<div class="row col-md-12 col-sm-12 col-lg-12  text-center">@shurjopay</div>
			
		</div>	
		<div class="row col-md-4 col-sm-4 col-lg-4"></div>
	</div>
</body>
</html>