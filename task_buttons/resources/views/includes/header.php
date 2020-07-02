<!DOCTYPE html>
<html lang="en">
<head>
    <title id="page_title">
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Propeller CSS -->
    <link rel="stylesheet" href="css/propeller.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!--jQuery Validate-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <link rel="stylesheet" href="<?= asset('css/mc.css'); ?>" >
    <script src="<?= asset('js/mc.js'); ?>" ></script>

    <script>
        $(document).ready(function() {

            <?php
           /* BackEnd Errors*/
            if(!empty($errors->keys())){
                print('
                   $("input:not(:disabled)").addClass("is-valid");
                   $("select").addClass("is-valid");
                ');
            }
            foreach ($errors->keys() as $error_field){
                print('
                $("[name='.$error_field.']").removeClass("is-valid");
                $("[name='.$error_field.']").addClass("is-invalid");
                ');
            }
              /* BackEndErrors*/
            ?>

        });
    </script>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-xl navbar-light mc-bg-lightblue mc-nav-menu">

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= action('DashboardController@index'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= action('ButtonsController@index'); ?>">Buttons Customize</a>
                </li>
            </ul>
        </div>

    </nav>
</div>

<div class="container">
<div id="success" class="mc-success">
    <h5>
        <?= session('success'); ?>
    </h5>
</div>
</div>

<div class="container mc-main-container">



