<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
    <title>Realtime Notification using Socket.IO in Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <style>
        h3 {
            font-family: Verdana;
            font-size: 18pt;
            font-style: normal;
            font-weight: bold;
            color: red;
            text-align: center;
        }
    </style>
    <h3>Realtime Notification using Socket.IO in Codeigniter</h3>

    <form action="message/send" method="post" name="message">

        <div class="container">
            <divstyle="float:right;">
                <p>
                <h4>
                    Messages: <b><span id="msgcount"></span></b>
                </h4>
                </p>
        </div>
        <div class="col-md-3">
            <p>
                <input type="text" placeholder="Type Here..." class="form-control" size="20px" id="message" name="message" />
            </p>
        </div>
        <div class="col-md-3">
            <input type="button" class="btn btn-primary" id="send" name="send" value="Send" />
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody id="message-tbody">
                <?php foreach ($allMsgs as $row) { ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['msg']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </form>

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>">
    </script>
    <!-- <script src="<?php // echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js'); 
                        ?>"></script> -->
    <script src="https://cdn.socket.io/4.1.3/socket.io.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("click", "#send", function() {
                var dataString = {
                    message: $("#message").val()
                };
                $.ajax({
                    type: "POST",
                    url: "message/send",
                    data: dataString,
                    headers: {
                        'Access-Control-Allow-Origin': '*'
                    },
                    cache: false,
                    success: function(data) {
                        socket.emit('message', $("#message").val());
                       
                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    },
                });
            });
        });
        
        var socket = io.connect('http://localhost:8080',  { transports : ['websocket'] });
        socket.on('newmessage', function(data) {
            $("#message-tbody").prepend('<tr><td>' + data + '</td><td>' + data + '</td></tr>');
            $("#msgcount").text(data.msgcount);
        });
    </script>
</body>
</html>