<?php

require "config.php";
require "database.php";
require "model.php";
require "modelDash.php";
require "controller.php";
require "app.php";
require "functions.php";

spl_autoload_register(function($classe_nome){
    require "../private/core/models/" . ucfirst($classe_nome).".php";
});
