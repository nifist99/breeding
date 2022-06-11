<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    @include('admin_template/css')

    <style>
        .field-icon {
            float: right;
            margin-right: 11px;
            margin-top: -34px;
            position: relative;
            z-index: 2;
        }

        .field-icon2 {
            float: right;
            margin-right: 11px;
            margin-top: -34px;
            position: relative;
            z-index: 2;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            @include('admin_template/error')
                            <form class="user" method="post" action="{{url('register')}}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror form-control-user" name="name" id="name"
                                            placeholder="Name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user @error('hp') is-invalid @enderror" name="hp" id="hp"
                                            placeholder="No Hp / Wa" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email"
                                        placeholder="Email Address" required="">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password" required="">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="repeat_password" name="repeat_password" placeholder="Repeat Password" required="">
                                            <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon2 toggle-password2"></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="{{url('forgot-password')}}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('admin_template/js')

        <script>
            $( document ).ready(function() {
                $(".toggle-password").click(function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $($(this).attr("toggle"));
                        if ($('#password').attr('type') == "password") {
                            $("#password").prop("type", "text");
                        } else {
                            $("#password").prop("type", "password");
                        }
                });

                $(".toggle-password2").click(function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $($(this).attr("toggle"));
                        if ($('#repeat_password').attr('type') == "password") {
                            $("#repeat_password").prop("type", "text");
                        } else {
                            $("#repeat_password").prop("type", "password");
                        }
                });
            });
        </script>

</body>

</html>