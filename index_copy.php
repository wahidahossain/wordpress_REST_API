<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JRP Sonax API</title>
    <link rel="stylesheet" href="index/unplug-ui-kit.css">
    <link rel="stylesheet" href="index/unplug-ui-kit-demo.css">
    <link rel="stylesheet" href="index/materialdesignicons.css">
    <link rel="stylesheet" href="index/all.min.css">
</head>
<body>
    <main class="auth">
        <div class="container-fluid">
            <div class="row vh-100">
                <div class="col-md-6 text-center d-flex flex-column justify-content-center auth-bg-section text-white" style="background-image: url(index/register-bg.jpg)">
                    <h1 class="text-reset">Welcome to <br> Sonax API</h1>
                    <p class="font-weight-bold text-reset">Please enter login information</p>
                </div>
                <div class="col-md-6 text-center d-flex flex-column justify-content-center">
                    <div class="auth-form-section">
                        <div class="logo">
                            <img src="index/logo.png" class="img-fluid" alt="Unplug UI" width="200">
                        </div>
                        <h2>Login In</h2>                        
                        <form action="model/login.php" class="auth-form">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                            <input type="password" class="form-control"  name="password" placeholder="Password">
                           
                            </div>
                            <button type="submit" class="btn btn-success btn-block mb-3">Login</button>                            
                        </form>                      
                        <div class="text-left mb-0">Forgot your password? <a href="staff/reset_password_email.php">Reset It</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </main>  
</body>
</html>