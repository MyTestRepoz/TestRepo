<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/30/2017
 * Time: 5:23 PM
 */

include_once './Repository/ProductRepository.php';
include_once './Mapper/ProductMapper.php';

$params = $_POST;
$idDeleteArr = NULL;
foreach ($params as $key=>$param){
    $idDeleteArr[] = $key;
}


$mapper = new ProductMapper();
$repozitory = new ProductRepository($mapper);

$repozitory->massDeleteProducts($idDeleteArr);



