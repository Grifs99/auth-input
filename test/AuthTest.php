<?php
class UserLoginTest extends PHPUnit_Framework_TestCase
{
    public function testIfReturnsFalseWithoutConnection()
    {  	
        // Arrange
        $db = new Database();
        $a = new Auth($db);

        // Act
        $b = $a->login('somename','somepass');

        // Assert
        $this->assertEquals(false, $b);
    }
}