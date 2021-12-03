<?php

use PHPUnit\Framework\TestCase;

class ProductModelTest extends TestCase
{

    /**
     * Test DeleteUserById Function in UserModel - 'Vinh' do this
     */
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $productModel = new ProductModel();
        $id = "1";
        $check = $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

}