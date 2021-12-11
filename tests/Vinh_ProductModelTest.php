<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class VinhProductModelTest extends TestCase
{
    public function testDeleteProductByIdOK()
    {
        $productModel = new ProductModel();
        $id = 3;
        $check = $productModel->deleteProductById($id);
        if ($check != true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     public function testDeleteProductByIdNg()
     {
         $productModel = new ProductModel();
         $id = 99;
         $check = $productModel->deleteProductById($id);
         if ($check == false) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
      public function testDeleteProductByIdNull()
      {
          $productModel = new ProductModel();
          $id = null;
          $check = $productModel->deleteProductById($id);
          if ($check == false) {
              $this->assertTrue(true);
          } else {
              $this->assertTrue(false);
          }
      }
     public function testDeleteProductByNotId()
     {
         $productModel = new ProductModel();
         $id = " ";
         $check = $productModel->deleteProductById($id);
         if ($check == false) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
       public function testDeleteProductByIdTrue()
       {
           $productModel = new ProductModel();
           $id = true ;
           $check = $productModel->deleteProductById($id);
           if ($check != true) {
               $this->assertTrue(true);
           } else {
               $this->assertTrue(false);
           }
       }
       public function testDeleteProductByIdFalse()
       {
           $productModel = new ProductModel();
           $id = false ;
           $check = $productModel->deleteProductById($id);
           if ($check == false) {
               $this->assertTrue(true);
           } else {
               $this->assertTrue(false);
           }
       }
       public function testDeleteProductByIdFloat()
       {
           $productModel = new ProductModel();
           $id = 1.11 ;
           $check = $productModel->deleteProductById($id);
           if ($check == false) {
               $this->assertTrue(true);
           } else {
               $this->assertTrue(false);
           }
       }
       public function testDeleteproductExpectedandActual()
    {
        $productModel = new ProductModel();
        $id = -1;
        $expected = $productModel->deleteProductById($id);
        $actual = false;
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteProductByIdKey()
    {
        $productModel = new ProductModel();
        $id = "*******" ;
        $check = $productModel->deleteProductById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testDeleteProductByIdString()
    {
        $productModel = new ProductModel();
        $id = "vinh" ;
        $check = $productModel->deleteProductById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    //get Product
    public function testGetCountProduct() {
        $product             = new ProductModel();
        $param["keyword"] = "a";
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }

    public function testGetProductNg() {
        $product             = new ProductModel();
        $param["keyword"] = "dsdsdsd";
        $actual           = count($product->getProducts($param));
        if ($actual == 0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testGetProductStr() {
        $product             = new ProductModel();
        $param["keyword"] = "aaaaaaaa";
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }

    public function testGeProductNumberFloat() {
        $product             = new ProductModel();
        $param["keyword"] = "18,11111";
        $actual           = count($product->getproducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }

    public function testGetProductNull() {
        $product             = new ProductModel();
        $param["keyword"] = null;
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }

    public function testGetProductSpace() {
        $product             = new ProductModel();
        $param["keyword"] = "  ";
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }
    public function testGetProductGood() {
        $product             = new ProductModel();
        $param["keyword"] = "Điện thoại Xiaomi Mi 11 5G";
        $stringActual          = $product->getProducts($param);
        $actual = $stringActual[0]["product_name"];
        $expected         = "Điện thoại Xiaomi Mi 11 5G";
        $this->assertEquals($expected, $actual);
    }
    public function testGetProductFalse() {
        $product             = new ProductModel();
        $param["keyword"] = false;
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }
    public function testGetUserTrue() {
        $product             = new ProductModel();
        $param["keyword"] = true;
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }
    public function testGetProductArray() {
        $product             = new ProductModel();
        $ar = array('product_name'=>'name',
                    'product_description' =>'des');
        $param["keyword"] = $ar;
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }
    public function testGetProductObject() {
        $product             = new ProductModel();
        $param["keyword"] = new ProductModel();
        $actual           = count($product->getProducts($param));
        $expected         = 4;
        $this->assertEquals($expected, $actual);
    }
}
