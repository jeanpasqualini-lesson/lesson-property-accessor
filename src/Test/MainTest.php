<?php

namespace Test;

/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/12/15
 * Time: 2:38 PM
 */
use Data\Person;
use Interfaces\TestInterface;

use Symfony\Component\PropertyAccess\PropertyAccess;

class MainTest implements TestInterface {

    public function runTest()
    {
        $accessor = PropertyAccess::createPropertyAccessor();

        $containerChild = new \stdClass();

        $containerChild->child = array(
            "first_name" => "Ammer"
        );

        $person = array(
            "first_name" => "Wouter",
            "child" => $containerChild
        );

        if($accessor->isWritable($person, "[first_name]"))
        {
            $accessor->setValue($person, "[first_name]", "ermest");
        }

        echo $accessor->getValue($person, "[first_name]").PHP_EOL;
        echo $accessor->getValue($person, "[child].child[first_name]").PHP_EOL;
        echo $accessor->getValue(new Person(), "firstname").PHP_EOL;

        echo $accessor->getValue(new Person(), "magic__get").PHP_EOL;

        $customAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->disableMagicCall()
            ->getPropertyAccessor();

        echo $customAccessor->getValue(new Person(), "magic__get").PHP_EOL;
    }
}