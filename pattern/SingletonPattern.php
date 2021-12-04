<?php 
spl_autoload_register(function ($class_name) {
  require './app/models/' . $class_name . '.php';
});

class SingletonPattern {
    private static $instance = null;

    private function __construct()
    {
      
    }

    public static function getInstance() {
      if (self::$instance == null) {
        self::$instance = new SingletonPattern();
      }
      return self::$instance;
    }

    public function findAll() {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $categoryList = $categoryModel->getCategories();
        $accessoryList = $productModel->getAccessories();
        return [$categoryList, $accessoryList];
    }
}