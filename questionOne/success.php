<?php
require 'Instagram.php';
use MetzWeb\Instagram\Instagram;
// initialize class
$instagram = new Instagram(array(
    'apiKey' => 'CLIENTID',
    'apiSecret' => 'SECRET',
    'apiCallback' => 'http://localhost:8888/success.php' // must point to success.php
));
// receive OAuth code parameter
$code = $_GET['code'];
// check whether the user has granted access
if (isset($code)) {
    // receive OAuth token object
    $data = $instagram->getOAuthToken($code);
    $username = $data->user->username;
    $fullname = $data->user->full_name;
    $bio = $data->user->bio;
    $profilePicture = $data->user->profile_picture;
    $instagram->setAccessToken($data);
    $result = $instagram->getUser();
} else {
    // check whether an error occurred
    if (isset($_GET['error'])) {
        echo 'An error occurred: ' . $_GET['error_description'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
</head>
<body>
<div class="container">
    <header class="clearfix"></header>
        <h1>Instagram stuff</h1>
    </header>
    <div class="main">
        <ul class="grid">
            <li><?php echo $fullname; ?></li>
            <li><?php echo $bio; ?></li>
            <li><image src="<?php echo $profilePicture?>"></image></li>
        </ul>
    </div>
</div>
</body>
</html>