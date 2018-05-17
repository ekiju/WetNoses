<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request</title>
    <style>
        #information {
            margin-top: 6%;
            border-radius: 15px;
            background-color: #fafafa;
            padding: 30px;
        }
        #requests {

        }
        img {
            width: 50%;
        }
        .desc {
            margin-left: 20px;
        }
        #titlereq {
            padding: 10px;
            color: purple;
        }
    </style>
</head>
<body>
<?php $this->load->view("partials/header") ?>
    <div class="container">
        <div class="jumbotron">
            <h1>Welcome, <?= $this->session->userdata('current_user_first_name') ?></h1>
        </div>
        <div id="information">
        <h1><?= $requests[0]['title'] ?></h1>
        <?php
            if ($requests[0]['owner_id'] != $this->session->userdata['current_user_id'])
            {
        ?>
            <a href="/interests/interested/<?= $requests[0]['reqid'] ?>"> <button class="btn btn-warning">Interested</button></a>
        <?php
            if($requests[0]['status'] == 'pending')
            {
        ?>
            <button type="button" class="btn btn-info" disabled>
                Pending
            </button>
        <?php
            } else {
        ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                Accept
            </button>
        <?php
            }
        ?>

        <?php
            }
        ?>
        <br>
        Compensation: <?= $requests[0]['price'] ?> <br>
        Date: <?= $requests[0]['date'] ?><br>
        Status: <?= $requests[0]['status'] ?><br>
        Details: <?= $requests[0]['details'] ?><br>
        Request created on: <?= $requests[0]['created_at'] ?><br>
        Owner Info: <?= $requests[0]['first_name'] ?> <?= $requests[0]['last_name'] ?><br>
        Owner Contact: <?= $requests[0]['email'] ?>



    <hr>
        <div id="requests">
            <h1><strong>Meet the furry friends...</strong></h1>
        <?php
            foreach($requests as $request)
            {
        ?>
            <div class="row">
        <?php
                if($request['image'])
                {
                echo '<img width:"40%;" src="data:image;base64,'. base64_encode($request["image"]) . '"><br>';
                }
        ?>
                <div class="desc">

                
                <h2><?= $request['name']?></h2>
                Breed: <?= $request['breed']?><br>
                <?= $request['age']?> years old<br>
                Description: <?= $request['description']?>
                </div>
            </div>
        <?php        
            }
        ?>
        </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accept Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/interests/accept/<?= $requests[0]['reqid'] ?>" method="post">
                    <div class="form-group">
                        <textarea name="notes" class="form-control" placeholder="Message to the owner..."></textarea>
                    </div> 
                    <input type="hidden" name="status" value="incomplete">
                <div class="alert alert-info" role="alert">
                After owner approves your acceptance, you may receive payment.
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send!</button>
                </form>
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