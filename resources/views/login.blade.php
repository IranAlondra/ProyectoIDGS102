@extends('master')
@section("content")


	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
				<script src='https://www.google.com/recaptcha/api.js'></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Iniciar Sesion</div>
						
						<div style="float:right; font-size: 100%; position: relative; top:-10px"></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						          <form action="login" method="POST" >
                <div class="form-group">
                    @csrf
                    <div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
								</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			
							</div>
						
								<center>
                	<button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesion</a>	</center>
							
            </form>
            
            <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
      
				
					</div>    
					<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:100%" >
										No tiene una cuenta! <a href="register">Registrate aquí</a>
									</div>
								</div>
							</div>    
				</div>  
			</div>
		</div>
	</body>
	

@endsection
