<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WetNoses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .card {
            margin: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
<?php $this->load->view("partials/header") ?>
<div class="container">
    <div class="jumbotron">
        <h1><?= $this->session->userdata('current_user_first_name') ?>'s Dashboard</h1>
        <?php 
            if($this->session->flashdata('login_success'))
            {
        ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome!</h4>
            <hr>
            <p class="mb-0"><p><?= $this->session->flashdata('login_success') ?></p></p>
            </div>
        <?php
            }
        ?>
        <a href="/ownersportal">Dog Owner's Portal</a>
    </div>
    <div id="dogs">
        <h1>Here are all the furry friends that need your &hearts;:</h1>
        <div class="row">
        <?php
            foreach($doggos as $doggo)
            {
        ?>
            <div class="card" style="width: 18rem;">
        <?php
            if($doggo['image'])
            {
            echo '<img class="card-img-top" src="data:image;base64,'. base64_encode($doggo["image"]) . '">';
            }
        ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $doggo['name'] ?></h5>
                    <p class="card-text">
                        <p>Breed: <?= $doggo['breed'] ?></p>
                        <p>Age: <?= $doggo['age'] ?> years old</p>
                        <p>Description: <?= $doggo['description'] ?></p>
                        <a href="/dashboard/view_request/<?= $doggo['request_id'] ?>" class="btn btn-info">View Request</a>
                    </p>    
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    <hr>
    <div id="interests">
        <h1>Saved Interests:</h1>
        <?php
            if(count($interests) == 0) 
            {
        ?>
            <p>You have no saved interests yet!</p>
        <?php
            }
        ?>
        
        <div class="row">
        <?php
            foreach ($interests as $interest)
            {
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <?= $interest['title'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Compensation: <?= $interest['title'] ?></h5>
                    <p class="card-text">
                        <p><?= $interest['date'] ?></p>
                        <p><?= $interest['details'] ?></p>
                        <p><?= $interest['created_at'] ?></p>
                        <form action="/messages/new" method="post">
                            <input type="hidden" name="archived" value="FALSE">
                            <input type="hidden" name="sender_id" value="<?= $interest['users_id'] ?>">
                            <input type="hidden" name="recipient_id" value="<?= $interest['owner_id'] ?>">
                            <div class="form-group">
                                <label for="content"> Message Owner:</label>
                                <textarea name="content" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block">Send Message</button>
                        </form>
                    </p>    
                </div>
            </div>
        <?php
                }
        ?>
        </div>
    </div>
<hr>
    <div class="requests">
        <h1>Open Requests:</h1>
        <?php
            if(count($requests) == 0) 
            {
        ?>
            <p>You haven't created any requests yet!</p>
        <?php
            }
        ?>
        <div class="row">
    <?php
        foreach ($requests as $request)
        {
    ?>
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <?= $request['title'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Compensation: <?= $request['price'] ?></h5>
                    <p class="card-text">
                    <p><?= $request['date'] ?></p>
                    <p><?= $request['status'] ?></p>
                    <p><?= $request['details'] ?></p>
                    </p>
                    
            <?php
                if ($request['owner_id'] == $this->session->userdata('current_user_id'))
                {
            ?>
                <a href="/dashboard/view_request/<?= $request['id'] ?>" class="btn btn-info">View</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Edit
                </button>
                <a href="/dashboard/delete_request/<?= $request['id'] ?>" class="btn btn-danger">Delete</a>
         
            <?php
                } else {
            ?>
                    <a href="/dashboard/view_request/<?= $request['id'] ?>" class="btn btn-outline-info btn-block">View</a>
            <?php
                }
            ?>
                </div>
            </div>
    <?php
        }
    ?>
        </div>
               

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/edit_request/<?= $request['id'] ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="<?= $request['title'] ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="price" value="<?= $request['price'] ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="date" value="<?= $request['date'] ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="details" value="<?= $request['details'] ?>"></textarea>
                    </div>

                    <input type="hidden" name="status" value="active">
                    <input type="hidden" name="owner_id" value="<?= $this->session->userdata('current_user_id') ?>">
                
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Request</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>