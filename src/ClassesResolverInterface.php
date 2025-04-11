<?php

namespace Jmf\ClassList;

use Jmf\ClassList\Exception\ClassNotFoundException;

interface ClassesResolverInterface
{
    /**
     * @param object|class-string $subject
     *
     * @return class-string[]
     *
     * @throws ClassNotFoundException
     */
    public function resolve(object | string $subject): iterable;
}
