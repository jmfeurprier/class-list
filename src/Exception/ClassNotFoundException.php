<?php

declare(strict_types=1);

namespace Jmf\ClassList\Exception;

use InvalidArgumentException;

class ClassNotFoundException extends InvalidArgumentException
{
    /**
     * @param class-string $class
     */
    public function __construct(string $class)
    {
        parent::__construct("Class {$class} not found");
    }
}
