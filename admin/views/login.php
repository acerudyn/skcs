<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SKCS | Login</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/style.css" </head>

    <body>

        <div class="container">
            <div class="info">
                <img src="img/logo_skcs.png" width="190" height="71">
            </div>
        </div>
        <div class="form">
            <div class="thumbnail"><img src="img/user.png" /></div>
            <form class="register-form">
                <input type="text" placeholder="name" required/>
                <input type="password" placeholder="password" required/>
                <input type="text" placeholder="email address" required/>
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" method="post" action="controller/login-action.php">
                <input type="text" placeholder="username" name="username" required/>
                <input type="password" placeholder="password" name="password" required/>
                <button type="submit" name="login">Login</button>
                <p class="message">All Rights Reserved | <a href="#">PT. SKCS</a></p>
            </form>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>

    </body>

</html>
