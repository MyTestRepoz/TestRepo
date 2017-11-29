<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/27/2017
 * Time: 2:43 PM
 */

include_once 'ModelInterface.php';

class ProductModel implements ModelInterface
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $sku;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $special;

    /**
     * @return string
     */
    public function getSpecial(): string
    {
        return $this->special;
    }
    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @param string $special
     */
    public function setSpecial(string $special)
    {
        $this->special = $special;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}
