<?php
if(preg_match('/bot|crawler|spider|facebook|alexa|twitter/i', $_SERVER['HTTP_USER_AGENT'])) {
    exit();
}