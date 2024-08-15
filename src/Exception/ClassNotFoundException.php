<?php

namespace Jmf\ClassList\Exception;

use Exception;

class ClassNotFoundException extends Exception
{
    /**
     * @param class-string $class
     */
    public function __construct(string $class)
    {
        parent::__construct("Class {$class} not found");
    }
}
