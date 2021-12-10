<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class VinhProductModelTest extends TestCase
{
    /**
     * Test DeleteUserById Function in UserModel - 'Vinh' do this
     */
    // Test case testDeleteUserById
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
     // Test case testDeleteProductByIdNg
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
      // Test case testDeleteProductByIdNull
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
       // Test case testDeleteProductByNotId
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
       // Test case testDeleteProductByIdTrue
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
       public function testDeleteUserExpectedandActual()
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
}
