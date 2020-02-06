<?php
session_start();
require('framework/web_app.php'); 

$app = new WebApp();

$app->process_request();
