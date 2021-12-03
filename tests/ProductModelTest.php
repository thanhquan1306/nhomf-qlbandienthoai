<?php

use PHPUnit\Framework\TestCase;

class ProductModelTest extends TestCase
{
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
