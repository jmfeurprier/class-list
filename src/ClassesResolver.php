<?php

namespace Jmf\ClassList;

use Jmf\ClassList\Exception\ClassNotFoundException;
use Webmozart\Assert\Assert;

readonly class ClassesResolver
{
    /**
     * @param object|class-string $subject
     *
     * @return class-string[]
     *
     * @throws ClassNotFoundException
     */
    public function resolve(object | string $subject): iterable
    {
        $baseClass     = $this->getBaseClass($subject);
        $parentClasses = $this->getParentClasses($baseClass);

        return [
            $baseClass,
            ...$parentClasses,
        ];
    }

    /**
     * @param object|class-string $subject
     *
     * @return class-string
     *
     * @throws ClassNotFoundException
     */
    private function getBaseClass(object | string $subject): string
    {
        if (is_object($subject)) {
            return $subject::class;
        }

        if (!class_exists($subject)) {
            throw new ClassNotFoundException($subject);
        }

        return $subject;
    }

    /**
     * @param class-string $baseClass
     *
     * @return class-string[]
     */
    private function getParentClasses(string $baseClass): iterable
    {
        $parentClasses = class_parents($baseClass);

        Assert::isArray($parentClasses);

        return array_values($parentClasses);
    }
}
