<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $doggo['name'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        #information {
            margin-top: 6%;
            border-radius: 15px;
            background-color: #fafafa;
            padding: 30px;
            font-size: 14px;
            line-height:1;
        }
        #dogimage {
            background-color: white;
        }
        #uploading{
            width: 50%;
        }
        #doginfo {
            margin: 20px;
        }
    </style>
</head>
<body>
<?php $this->load->view("partials/header") ?>
<div class="container">
    <div id="information">
    <?php 
            if($doggo['image'])
            {
            echo '<div id="dogimage"><img src="data:image;base64,'. base64_encode($doggo["image"]) . '"><p>' .$doggo['image_caption']. '</p></div>';
            }
    ?>
    <?php echo $error ; ?>
        <a href="#" id="showupload">Upload an Image</a><br>
        <div id="uploading" style="display:none">
            <form action="/ownersportal/image/<?= $doggo['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control form-control-sm" type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="image_caption">Add a caption</label>
                    <input class="form-control form-control-sm" type="text" name="image_caption">
                </div>
                <button type="submit" class="btn btn-outline-success btn-block">Upload</button>
            </form>
        </div>
        <div id="doginfo">
            <h1><?= $doggo['name'] ?></h1>
            <p><strong>BREED: </strong><?= $doggo['breed'] ?></p>
            <p><strong>AGE: </strong><?= $doggo['age'] ?> years old</p>
            <p><strong>LIKES: </strong><?= $doggo['likes'] ?></p>
            <p><strong>DISLIKES: </strong><?= $doggo['dislikes'] ?></p>
            <p><strong>DESCRIPTION: </strong><?= $doggo['description'] ?></p>
        </div>

<hr>

        <h1>All upcoming events:</h1>
        <div class="events">
            <?php
                foreach ($events as $event)
                {
            ?>
            <div class="card" width:'100%;'>
                <div class="card-header">
                    <?= $event['title'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $event['date'] ?>
                    </h5>
                    <p class="card-text">
                        <?= $event['details'] ?>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#showupload").click(function() {
            $("#uploading").show();
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>