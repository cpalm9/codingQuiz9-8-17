<?php
require 'Instagram.php';
use MetzWeb\Instagram\Instagram;
// initialize class
$instagram = new Instagram(array(
    'apiKey' => 'CLIENTID',
    'apiSecret' => 'SECRET',
    'apiCallback' => 'http://localhost:8888/success.php' // must point to success.php
));
// create login URL
$loginUrl = $instagram->getLoginUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Stuffs</title>
    <style>
        .login {
            display: block;
            font-size: 25px;
            font-weight: bold;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="main">
        <ul class="grid">
            <li>
                <a class="login" href="<?php echo $loginUrl ?>">Login with Instagram</a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>