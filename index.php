
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='style\style_log_in.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        table, tr, td {
            border: 1px solid #000;
        }
    </style>
</head>
<body>


<div class='container'>
        <div class='card card-container'>
            <img id='profile-img' class='profile-img-card' src='//ssl.gstatic.com/accounts/ui/avatar_2x.png' />
            <p id='profile-name' class='profile-name-card'></p>
            <form class='form-signin' method='POST' action='controllers/checkUser.php' novalidate>
                <span id='reauth-email' class='reauth-email'></span>
                <input name='user_email' type='email' id='inputEmail' class='form-control' placeholder='Email address' required autofocus>
                <input name='user_password' type='password' id='inputPassword' class='form-control' placeholder='Password' required>
                
                <button class='btn btn-lg btn-primary btn-block btn-signin' type='submit'>Sign in</button>
            </form><!-- /form -->
            <a href='#' class='forgot-password'>
                Forgot the password?
            </a>
        </div><!-- /card-container -->
	</div><!-- /container -->


</body>
</html>