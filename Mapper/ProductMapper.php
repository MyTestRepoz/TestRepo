<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/29/2017
 * Time: 11:36 AM
 */

class ProductMapper
{
    public function mapProduct(ProductModel $model, array $data): ProductModel
    {
        $model->setId($data['id']);
        $model->setSku($data['sku']);
        $model->setName($data['name']);
        $model->setPrice($data['price']);
        $model->setType($data['price']);
        $model->setSpecial('special');

        return $model;
    }
}