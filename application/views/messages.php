<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
    <style>
        .box {
            width: 100%;
            height: 60%;
            background-color: #fafafa;
            text-align: center;
            padding: 80px;
        }
    </style>
</head>
<body>
<?php $this->load->view("partials/header") ?>
<div class="jumbotron">
    <h1>Messages</h1>
</div>
<div class="container">
    <img src="./../../assets/images/image-icon13.png" alt="Message">
    <h3>Inbox</h3>
    <hr>


    <?php
        if(count($messages)==0)
        {
    ?>
        <p>You currently have no new messages!</p>
    <?php
        }
        foreach($messages as $message)
        {
    ?>
        <p><?= $message['content'] ?></p>
        <p><?= $message['created_at'] ?></p>
    <?php
            if ($message['sender_id'] == $this->session->userdata('current_user_id'))
            {
    ?>
                <a href="">edit</a> | <a href="">delete</a><hr>
    <?php            
            }
        }
    ?>

    <div class="box">
        <h1>Under Construction</h1>
        <h2>Page Coming Soon</h2>
    </div>
</div>
</body>
</html>