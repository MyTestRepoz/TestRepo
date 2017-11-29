<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/29/2017
 * Time: 10:36 AM
 */

interface ModelInterface
{
    public function getSpecial(): string;

    public function getId(): int;

    public function getSku(): string;

    public function getName(): string;

    public function getPrice(): float;

    public function getType(): string;
}