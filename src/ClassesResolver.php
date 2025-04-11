<?php

namespace Jmf\ClassList;

use Jmf\ClassList\Exception\ClassNotFoundException;
use Override;
use Webmozart\Assert\Assert;

class ClassesResolver implements ClassesResolverInterface
{
    #[Override]
    public function resolveForObject(object $subject): iterable
    {
        return $this->doResolve($subject::class);
    }

    #[Override]
    public function resolveForClass(string $subject): iterable
    {
        if (!class_exists($subject)) {
            throw new ClassNotFoundException($subject);
        }

        return $this->doResolve($subject);
    }

    /**
     * @param class-string $baseClass
     *
     * @return class-string[]
     */
    private function doResolve(string $baseClass): iterable
    {
        $parentClasses = $this->getParentClasses($baseClass);

        return [
            $baseClass,
            ...$parentClasses,
        ];
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
