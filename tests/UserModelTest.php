<?php

use PHPUnit\Framework\TestCase;
require_once './app/models/Db.php';
require_once './config/database.php';
class UserModelTest extends TestCase
{
    /**
     * Test getUsers
     */
    public function testGetUsersOk()
    {
        $userModel = new UserModel();
        $param['keyword'] = 'Ardianta Pargo';
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $param['keyword'] = 'asa';
        $user = $userModel->getUsers($param);
        if (empty($user[0])) {
            return $this->assertTrue(false);
        }else {
            return $this->assertTrue(true);
        }
    }
    public function testGetUsersNull()
    {
        $userModel = new UserModel();
        $param['keyword'] = null;
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersBoolTrue()
    {
        $userModel = new UserModel();
        $param['keyword'] = true;
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersBoolFalse()
    {
        $userModel = new UserModel();
        $param['keyword'] = false;
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersFloat()
    {
        $userModel = new UserModel();
        $param['keyword'] = 1.1;
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersNum()
    {
        $userModel = new UserModel();
        $param['keyword'] = 1;
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersString()
    {
        $userModel = new UserModel();
        $param['keyword'] = "asdas";
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersArray()
    {
        $userModel = new UserModel();
        $param['keyword'] = ['1','2'];
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersObject()
    {
        $userModel = new UserModel();
        $param['keyword'] = $userModel;
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersKyTu()
    {
        $userModel = new UserModel();
        $param['keyword'] = '!@$!%^^&!';
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersEmpty()
    {
        $userModel = new UserModel();
        $param['keyword'] = '';
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testGetUsersSpace()
    {
        $userModel = new UserModel();
        $param['keyword'] = '            ';
        $expected = 'Ardianta Pargo';
        $user = $userModel->getUsers($param);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findUserById
     */
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $id = 1;
        $expected = 'Ardianta Pargo';
        $user = $userModel->findUserById($id);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $id = 222222;
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdBoolTrue()
    {
        $userModel = new UserModel();
        $id = true;
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testFindUserByIdBoolFalse()
    {
        $userModel = new UserModel();
        $id = null;
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdFloat()
    {
        $userModel = new UserModel();
        $id = 1.1;
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testFindUserByIdNum()
    {
        $userModel = new UserModel();
        $id = 11212;
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdString()
    {
        $userModel = new UserModel();
        $id = 'dasasda';
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();
        $id = ['1','2'];
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    // public function testFindUserByIdObject()
    // {
    //     $userModel = new UserModel();
    //     $id = $userModel;
    //     $expected = 'Ardianta Pargo';
    //     $user = $userModel->findUserById($id);
    //     $actual = $user[0]['name'];
    //     $this->assertEquals($expected, $actual);
    // }
    public function testFindUserByIdKyTu()
    {
        $userModel = new UserModel();
        $id = '!@#$%^^&*()';
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = '';
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdSpace()
    {
        $userModel = new UserModel();
        $id = '           ';
        $user = $userModel->findUserById($id);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test UpdateUsers
     */
    public function testUpdateUsersOk()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = 1;
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersNg()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = 112;
        $user = $userModel->updateUsers($name, $email, $pass, $id);
        if (empty($user)) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testUpdateUsersNull()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = null;
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersBoolTrue()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = true;
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersBoolFalse()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = false;
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersFloat()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = 1.1;
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersNum()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = '1';
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersString()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = 'awaeqwe';
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersArray()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = [1, 'adas'];
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    // public function testUpdateUsersObject()
    // {
    //     $userModel = new UserModel();
    //     $name = 'Ardianta Pargo';
    //     $email = 'ardianta_pargo';
    //     $pass = 'ardianta';
    //     $id = $userModel;
    //     $actual = $userModel->updateUsers($name, $email, $pass, $id);
    // }
    public function testUpdateUsersKyTu()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = '!@#$%^^&*';
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersEmpty()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = 1;
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUsersSpace()
    {
        $userModel = new UserModel();
        $name = 'Ardianta Pargo';
        $email = 'ardianta_pargo';
        $pass = 'ardianta';
        $id = '                   ';
        $expected = true;
        $actual = $userModel->updateUsers($name, $email, $pass, $id);
        $this->assertEquals($expected, $actual);
    }
}