<?php
require("../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT'] . '/CoursesProject/module/Api/src/Controller']);

header('Content-Type: application/json');
echo $openapi->toJson();