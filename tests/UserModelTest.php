<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    // test findUserById
    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userID = 2;
        $user = $userModel->findUserById($userID);
       if($user== false){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }

    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userID = 9;
        $userName = "user1";
        $user = $userModel->findUserById($userID);
        $actual = $user[0]['username'];
        $this->assertEquals($userName, $actual);
    }

    
}