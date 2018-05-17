<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dog Owner Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #newreq {
            font-size: 20px;
            color: purple;
        }
        .card {
            margin: 10px;
        }
    </style>
</head>
<body>
<?php $this->load->view("partials/header") ?>
<div class="container">
    <div class="jumbotron">
        <h1>Welcome, <?= $this->session->userdata('current_user_first_name') ?></h1>
    </div>
    <!-- New Request -->
    <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span id="newreq">Create New Request</span>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <?php
        if ($this->session->flashdata('date_error'))
        {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('date_error')?>
            </div>
        <?php
        }
        ?>
        <form action="/ownersportal/new" method="post">
            <div class="form-group">
                <label for="title">Title of your request:</label>
                <input class="form-control" type="text" name="title" placeholder="Walk my puppy">
            </div>
            <div class="form-group">
                <input class="form-control" input type="text" name="price" placeholder="$30">
                <small id="emailHelp" class="form-text text-muted">Flat costs only.</small>

            </div>
            <div class="form-group">
                <input class="form-control" input type="date" name="date">
                <small id="emailHelp" class="form-text text-muted">Date must be in the future.</small>

            </div>
            <input type="hidden" name="status" value="active">
            <input type="hidden" name="owner_id" value="<?= $this->session->userdata('current_user_id') ?>">
            <div class="form-group">
                <label for="exampleFormControlSelect2">You may select multiple dogs:</label>
                <select name="doggo_id[]" multiple class="form-control" id="exampleFormControlSelect2">
                <?php 
                    foreach ($doggos as $doggo)
                    {
                ?>
                    <option value="<?= $doggo['id']?>"><?= $doggo['name']?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="details">Explain any specific instructions to add to your request here:</label>
                <textarea class="form-control" name="details" placeholder="My doggos needs a friend to take them for a swim!"></textarea>
            </div>
            
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit Request</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Add doggos!
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form action="/ownersportal/add" method="post">
            <div class="form-group">
                <label for="name">Doggo Name</label>
                <input class="form-control form-control-sm" type="text" name="name" placeholder="Dixie">
            </div>
            <div class="form-group">
                <label for="breed">Doggo Breed</label>
                <input class="form-control form-control-sm" type="text" name="breed" placeholder="Australian Shepherd">
            </div>
            <div class="form-group">
                <label for="age">Doggo Age</label>
                <input class="form-control form-control-sm" type="number" name="age" placeholder="2">
            </div>
            <div class="form-group">
                <label for="likes">My Doggo likes...</label>
                <textarea name="likes" class="form-control form-control-sm" placeholder="likes balls and frisbee"></textarea>
                <small id="emailHelp" class="form-text text-muted">Let others know what your doggo likes!</small>
            </div>
            <div class="form-group">
                <label for="dislikes">My Doggo dislikes...</label>
                <textarea name="dislikes" class="form-control form-control-sm" placeholder="hates water and bikes"></textarea>
                <small id="emailHelp" class="form-text text-muted">Let others know what your doggo dislikes!</small>
            </div>
            <div class="form-group">
                <label for="description">More about my Doggo...</label>
                <textarea name="description" class="form-control form-control-sm" placeholder="My dog is a friendly animal who..."></textarea>
                <small id="emailHelp" class="form-text text-muted">Include anything else others might like to know!</small>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

<hr>
    <div class="active">
        <h1>Your Active Requests</h1>
        <div class="row">
    <?php
        foreach ($actives as $active)
        {
    ?>
        <div class="card" style="width: 18rem;">
            <h5 class="card-header"><?= $active['title'] ?></h5>
            <div class="card-body">
                <p class="card-text">
                    <p>Compensation: <?= $active['price'] ?></p>
                    <p>Date: <?= $active['date'] ?></p>
                    <p>Details: <?= $active['details'] ?></p>
                </p>
                <a class="btn btn-outline-info btn-lg btn-block" href="/dashboard/view_request/<?= $active['id'] ?>">View</a>
            </div>
        </div>
    <?php
        }
    ?>
        </div>
    </div>
<hr>
    <div class="listed">
        <h1>Listed Doggos</h1>
        <div class="row">
    <?php
        foreach ($doggos as $doggo)
        {
    ?>
            <div class="card" style="width: 18rem;">
                <h5 class="card-header"><?= $doggo['name'] ?></h5>
    <?php
                if ($doggo["image"])
                {
                echo '<img class="card-img-top" src="data:image;base64,'. base64_encode($doggo["image"]) . '">';
                }
    ?>
                <div class="card-body">
                    
                    <p class="card-text">
                    <p>Breed: <?= $doggo['breed'] ?></p>
                    <p>Age: <?= $doggo['age'] ?> years old</p>
                    <p><?= $doggo['name'] ?> ... <?= $doggo['likes'] ?></p>
                    <p><?= $doggo['name'] ?> ... <?= $doggo['dislikes'] ?></p>
                    <p> About <?= $doggo['name'] ?>: <?= $doggo['description'] ?></p>
                    </p>
                    <a class="btn btn-outline-info btn-lg btn-block" href="/ownersportal/view/<?= $doggo['id'] ?>">View</a>
                </div>
            </div>

    <?php
        }
    ?>
        </div>
    </div>

<hr>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>