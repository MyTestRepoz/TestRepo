<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/27/2017
 * Time: 3:40 PM
 */

include_once 'ViewInterface.php';

class ProductView implements ViewInterface
{
    public function render(array $model)
    {
        echo '
                   <h2>Product List</h2>
                   <form method="post" action="./../delete.php">
                   <select>
                      <option value="delete">Mass Delete Action</option>
                   </select>
                    <button type="submit" >Apply</button>
             ';
        foreach ($model as $item) {
            echo '
                <div class="productContainer" style="border: solid 1px black; text-align: center" >
                    <input type="checkbox" name="' . $item->getId() . '" style="float: left">
                    <p>' . $item->getSku() . '</p>
                    <p>' . $item->getName() . '</p>
                    <p>' . $item->getPrice() . '</p>
                    <p>' . $item->getSpecial() . '</p>
                </div>
            ';
        }
        echo '</form>';
    }
}