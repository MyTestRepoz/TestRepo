<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/29/2017
 * Time: 10:23 AM
 */

include_once './View/ProductView.php';
include_once './Controller/ProductController.php';
include_once './Repository/ProductRepository.php';
include_once './Mapper/ProductMapper.php';

$view = new ProductView();
$mapper = new ProductMapper();
$repository = new ProductRepository($mapper);

$controller = new ProductController($view, $repository);

$controller->render();
