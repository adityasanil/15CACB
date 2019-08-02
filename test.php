<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <script>
        function sendMail() {

            var name = '<?php echo "Aditya"; ?>';

            // var name = document.getElementById('name').value;
            var TO_ADDRESS = document.getElementById('TO_ADDRESS').value;

            var xhttpObj = new XMLHttpRequest();
            xhttpObj.open("POST", "https://script.google.com/macros/s/AKfycbxTSP2pY4g-hONhzbzfc4AJxtvUCHMTPgUlMJP5aQ/exec", true);
            xhttpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttpObj.send("name=" + name + "&TO_ADDRESS=" + TO_ADDRESS);
        }
    </script>
</head>

<body>

    <input type="text" name="name" id="name">
    <input type="email" name="TO_ADDRESS" id="TO_ADDRESS">
    <input type="submit" onclick="sendMail()">

    <script data-cfasync="false" type="text/javascript" src="https://cdn.rawgit.com/dwyl/html-form-send-email-via-google-script-without-server/master/form-submission-handler.js"></script>
</body>

</html>s