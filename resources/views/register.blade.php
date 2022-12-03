@extends('master')
@section("content")
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
			<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
					    
						<div class="panel-title">Reg&iacute;strate</div>
						
					</div>  
					
					<div class="panel-body" >
					    <form action="register" method="POST" >
                @csrf
						<form class="form-inline">
                <div class="form-group">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
								  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="user name">
                  
								</div>	<br> <br>
							</div>
								<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
								      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              
								</div><br> <br>
							</div>

							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div><br> <br>
							
							
							<div class="form-group">
								<label for="captcha" class="col-md-3 control-label"></label>
								<div class="g-recaptcha col-md-9" data-sitekey=" 6LfPhGEhAAAAADUrlZ8LHpFaEQmhSQPAxtUQTmCh"></div>
							
							</div>
							<br> <br>
							
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
									
								</div>
							</div>
						</form>
						<br> <br>
					</div>
				</div>
			</div>
		</div>
	</body>
@endsection
