<?php
/**
 * Class App
 * General use methods for app
 */
class App
{
    public function escape($string)
    {
        return htmlentities($string);
    }
}