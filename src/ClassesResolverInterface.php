<?php

declare(strict_types=1);

namespace Jmf\ClassList;

use Jmf\ClassList\Exception\ClassNotFoundException;

interface ClassesResolverInterface
{
    /**
     * @return class-string[]
     */
    public function resolveForObject(object $subject): iterable;

    /**
     * @param class-string $subject
     *
     * @return class-string[]
     *
     * @throws ClassNotFoundException
     */
    public function resolveForClass(string $subject): iterable;
}
