<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    .box {
        width: 50%;
        margin: 0 auto;
        border: 1px solid silver;
        border-radius: 10px;
        padding: 35px;
        text-align: center;
    }
    </style>
</head>
<body>
<?php $this->load->view("partials/header") ?>
<div class="jumbotron">
    <h1>image or something here</h1>
</div>
<div class="container">

    <div class="box">
        <div id="alertbox">

        <?php
        if ($this->session->flashdata('login_errors'))
        {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('login_errors')?>
            </div>
        <?php
        }
        if ($this->session->flashdata('register_errors'))
        {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('register_errors')?>
            </div>
        <?php
        } if ($this->session->flashdata('register_success'))
        {
        ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">One step closer!</h4>
            <hr>
            <p class="mb-0"><p><?= $this->session->flashdata('register_success') ?></p></p>
            </div>
        <?php
        }
        ?>    
        </div>

        <div id="loginform">
            <h1>Login</h1>
            <form action="/dashboard/process_signin" method="post">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">Email</div>
                        </div>
                        <input class="form-control" type="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">Password</div>
                        </div>
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </div>
            </form>
            <a href="#" id="signup">Don't have an account? Register Here.</a>
        </div>
        <div id="registerform" style="display:none">
            <h1>Register</h1>
            <form action="/dashboard/process_register" method="post">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">First Name</div>
                    </div>
                    <input class="form-control" type="text" name="first_name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Last Name</div>
                    </div>
                    <input class="form-control" type="text" name="last_name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Email</div>
                    </div>
                    <input class="form-control" type="email" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Password</div>
                    </div>
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Confirm Password</div>
                    </div>
                    <input class="form-control" type="password" name="confirm_password">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </form>
        <a href="#" id="signin">Already have an account? Login Here.</a>
        </div>
    </div>

</div>
    <script>
        $(document).ready(function() {
            $("#signup").click(function() {
                $("#loginform").slideUp("slow", function() {
                $("#registerform").slideDown("slow");
                $("#alertbox").hide();
                });
            });
            $("#signin").click(function() {
                $("#registerform").slideUp("slow", function() {
                $("#loginform").slideDown("slow");
                $("#alertbox").hide();
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>