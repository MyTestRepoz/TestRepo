<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/29/2017
 * Time: 10:25 AM
 */

interface ViewInterface
{
    public function render(array $model);
}