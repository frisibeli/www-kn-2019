<?php

$config = parse_ini_file("config.ini", true);

echo $config["mysql"]["host"];