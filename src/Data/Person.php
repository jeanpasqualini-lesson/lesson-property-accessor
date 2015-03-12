<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/12/15
 * Time: 2:51 PM
 */

namespace Data;

class Person {
    private $firstName = "Un prénom";

    public function getFirstname()
    {
        return $this->firstName;
    }

    public function __get($name)
    {
        if($name == "magic__get") return "ok";

        throw new \BadMethodCallException();
    }
}