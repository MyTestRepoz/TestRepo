<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/29/2017
 * Time: 11:01 AM
 */

include __DIR__ . '/../Model/ProductModel.php';

class ProductRepository
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $dbname = 'testdb';
    /** @var mysqli */
    private $conn = null;
    /** @var ProductMapper */
    private $mapper;

    public function __construct(ProductMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    private function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    private function getProductsData(): array
    {
        $this->connect();
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($this->conn);
        return $data;
    }

    public function getProductModelArr(): array
    {
        $modelArr = NULL;
        $dataArr = $this->getProductsData();
        foreach ($dataArr as $data){
            $modelArr[] = $this->mapper->mapProduct(new ProductModel(), $data);
        }
        return $modelArr;
    }
}