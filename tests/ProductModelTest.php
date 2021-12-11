<?php

use PHPUnit\Framework\TestCase;

class ProductModelTest extends TestCase
{
    /**
     * Test DeleteUserById Function in UserModel - 'Vinh' do this
     */
    // Test case testDeleteUserById
    public function testDeleteProductByIdOK()
    {
        $productModel = new ProductModel();
        $id = "1";
        $check = $productModel->deleteProduct($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test make user
     */
    public function testMakeUser()
    {
        $factoryPattern = new FactoryPattern();
        $user = 'user';
        $expteced = new ProductModel();

        $actual =  $factoryPattern->make($user);

        $this->assertEquals($expteced, $actual);
    }
}
