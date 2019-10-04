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
            <h4><?php
                if($drug['dname_thai'] !=""){
                    echo $drug['dname_thai'] ;
                }else{echo $drug['dname'] ;}

                ?></h4>
        </div>
        <div class="panel-body">
            <?php echo $drug['drug_detail']?>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>
