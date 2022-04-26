<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Login form</title> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.png">

</head>

<body>
    <div class="container ">
        <div class="row">
            <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div class="login-title text-center">
                    <h2><span>FORM <strong>PENDAFTARAN</strong></span></h2>
                </div>
                <div class="login-content">
                    <div class="login-header ">
                        <h3><strong>Selamat Datang</strong></h3>

                    </div>
                    <div class="login-body">
                        <form action="/register" method="post">
                            @csrf

                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="name" type="text" name="name" placeholder="Nama..." class="form-username form-control">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="email" type="email" name="email" placeholder="Email..." class="form-username form-control">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pos-r">
                                    <input id="password" type="password" name="password" placeholder="Password..." class="form-password form-control">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control"><strong>Daftar</strong></button>
                            </div>
                            <div class="login-footer text-center template">

                                <a class="btn btn-danger btn-lg" href="{{url('login/google')}}" role="button">Masuk Via Google</a>

                                <a class="btn btn-info btn-lg" href="{{url('login/facebook')}}" role="button">Masuk Via Facebook</a>

                            </div>
                        </form>
                    </div> <!-- end  login-body -->
                </div><!-- end  login-content -->

            </div> <!-- end  login-container -->

        </div>
    </div><!-- end container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>