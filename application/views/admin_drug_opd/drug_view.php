<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo version();?></title>
    <script src="<?php echo base_url()?>assets/vendor/js/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/vendor/css/bootstrap.css" rel="stylesheet">

    <!--Set Color Page-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <!--

    <!-- Custom Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Kanit');
    </style>
</head>
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
<style>
    body {
        font-family: 'Kanit', sans-serif;
        font-size: 90%;
    }
</style>

<script src="<?php echo base_url()?>assets/vendor/js/bootstrap.min.js"></script>

<br>
<div class="col col-xs-12">
    <div class="panel-success">
        <div class="panel-heading">
            <h4><?php echo $drug['dname_thai'] ?></h4>
        </div>
        <div class="panel-body">
            <?php echo $drug['drug_detail']?>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>

<?php
$text = $drug['drug_detail'];
$lang = "th";
$file  = md5($lang."?".urlencode($text));
$file = "audio/" . $file .".mp3";

if(!is_dir("audio/"))
    mkdir("audio/");
else
    if(substr(sprintf('%o', fileperms('audio/')), -4)!="0777")
        chmod("audio/", 0777);


if (!file_exists($file))
{
    $mp3 = file_get_contents(
        'http://translate.google.com/translate_tts?ie=UTF-8&q='. urlencode($text) .'&tl='. $lang .'&total=1&idx=0&textlen=5&prev=input');
    file_put_contents($file, $mp3);
}

?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
<body>
<div align="center">
    <audio controls="controls" autoplay="autoplay">
        <source src="<?php echo $file; ?>" type="audio/mp3" />
    </audio>
</div>
<div align="center"><a href="<?php echo $file; ?>">Download File MP3 ที่ทดสอบที่นี่</a><br/>คลิกขวา เลือก Save Target As</div>
</body>
</html>