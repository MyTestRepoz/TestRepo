<?php
/**
 * Created by PhpStorm.
 * User: lauris.rozenbaks
 * Date: 11/27/2017
 * Time: 2:43 PM
 */

class ProductController
{
    /** @var ViewInterface */
    private $view;
    /** @var  ProductRepository */
    private $repository;

    public function __construct(ViewInterface $view, ProductRepository $repository)
    {
        $this->view = $view;
        $this->repository = $repository;
    }

    public function render()
    {
        $data = $this->repository->getProductModelArr();
        $this->view->render($data);
    }

    public function delete()
    {

    }
}