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
              <header>
                   <h2>Product List</h2>
                   <select>
                      <option value="delete">Mass Delete Action</option>
                   </select>
                    <button type="button">Apply</button>
             </header>
             ';
        foreach ($model as $item) {
            echo '
                <div class="productContainer" style="border: solid 2px black; display: inline-block; width: 220px; padding: 10px; text-align: center" >
                    <input type="checkbox" id="' . $item->getId() . '" style="float: left">
                    <p>' . $item->getSku() . '</p>
                    <p>' . $item->getName() . '</p>
                    <p>' . $item->getPrice() . '</p>
                    <p>' . $item->getSpecial() . '</p>
                </div>
            ';
        }
    }
}