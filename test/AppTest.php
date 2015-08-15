<?php
class AppTest extends PHPUnit_Framework_TestCase
{
    public function testStringEscape()
    {  	
        // Arrange
        $app = new App();
        $string = "<a>some string</a>";

        // Act
        $result = $app->escape($string);

        // Assert
        $this->assertEquals("&lt;a&gt;some string&lt;/a&gt;", $result);
    }
}