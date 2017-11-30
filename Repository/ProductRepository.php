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

    public function getProductModelArr(): array
    {
        $dataArr = $this->buildDataArr();
        $modelArr = NULL;
        foreach ($dataArr as $data){
            $modelArr[] = $this->mapper->mapProduct(new ProductModel(), $data);
        }
        return $modelArr;
    }

    private function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    private function makeQuery(string $sql): array
    {
        $result = mysqli_query($this->conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $data;
    }

    private function getProductOptions($productId)
    {
        $sql = 'SELECT options_key.option_key, ov.option_value, options_key.unit_of_measurment
                FROM options_key
                INNER JOIN option_has_value as ohv on ohv.option_id = options_key.id
                INNER JOIN options_value as ov on ov.id = ohv.value_id
                where ov.product_id = '. $productId .';
                ';

        return $this->makeQuery($sql);
    }

    private function buildDataArr()
    {
        $sql = "SELECT * FROM products";
        $this->connect();
        $dataArr = $this->makeQuery($sql);
        foreach ($dataArr as $key => $data){
            $options = $this->getProductOptions($data['id']);
            $dataArr[$key]['options'] = $this->appendOptions($options, $data['category']);
        }
        mysqli_close($this->conn);
        return $dataArr;
    }

    private function appendOptions(array $options, string $type):string
    {
        switch ($type){
            default:
                return $options[0]['option_key'] . ': '
                    . $options[0]['option_value'] . ' '
                    . $options[0]['unit_of_measurment'];
            case 'furniture':
                $dimension = $options[0]['option_value'] . 'x'
                    . $options[1]['option_value'] . 'x'
                    . $options[2]['option_value'];
                return 'Dimension: ' . $dimension;
        }
    }


    public function massDeleteProducts(array $idToDeleteArr)
    {
        $this->connect();
        foreach ($idToDeleteArr as $idToDelete)
        {
            $this->deleteProduct($idToDelete);
        }
        mysqli_close($this->conn);
    }

    private function deleteProduct(int $idToDelete)
    {
        $sql = 'DELETE FROM products WHERE id = '. $idToDelete .';';

        mysqli_query($this->conn, $sql);
    }

}