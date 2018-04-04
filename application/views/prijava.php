<!DOCTYPE html>
<html>
<head>
<title>Ustno spraševanje</title>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/auth.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/projektna.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigacija -->
    <?php include 'glava.php'?>

    <!-- Vsebina -->
    
    <div class = "container">
	<div class="wrapper">
		<form action="../auth/preveri_prijavo" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Prijavi se !</h3>
			  
			  <input type="text" class="form-control" name="upor_ime" placeholder="Uporabniško ime" required="" autofocus="" />
			  <input type="password" class="form-control" name="pass" placeholder="Geslo" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Prijavi se</button>  			
		</form>			
	</div>
</div>
    

    <!-- Noga spletne strani -->
    <footer>Avtor: Žan Jurečič, Jaša Jovan; mentor: doc. dr. Uroš Ocepek; 2018 - Srednja tehniška in poklicna šola Trbovlje</footer>
</body>
</html>