<?php
require_once 'app/models/ProductModel.php';
require_once 'app/models/CategoryModel.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'product') {
            return new ProductModel();
        } else if ($model == 'category') {
            return new CategoryModel();
        }
    }

}