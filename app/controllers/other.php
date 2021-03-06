<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ParameterBag;

$app->get("/api/app/version", function (Request $request) use ($app) {

    $local = json_decode(file_get_contents("{__DIR___}/../../bower.json"));
    $remote = json_decode(file_get_contents("https://raw.github.com/Cakebox/Cakebox-light/master/bower.json"));

    $infos = array();
    $infos["local"] = $local->version;
    $infos["remote"] = $remote->version;

    return $app->json($infos);
});
