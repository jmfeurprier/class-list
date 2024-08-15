<?php

namespace Jmf\ClassList;

use Jmf\ClassList\Exception\ClassNotFoundException;
use Override;
use PHPUnit\Framework\TestCase;

class ClassesResolverTest extends TestCase
{
    private ClassesResolver $classesResolver;

    #[Override]
    protected function setUp(): void
    {
        $this->classesResolver = new ClassesResolver();
    }

    public function testResolve(): void
    {
        $result = $this->classesResolver->resolve($this);

        $this->assertContains(self::class, $result);
        $this->assertContains(TestCase::class, $result);
    }

    public function testResolveWithUndefinedClass(): void
    {
        $this->expectException(ClassNotFoundException::class);

        // @phpstan-ignore argument.type
        $this->classesResolver->resolve('UndefinedClass');
    }
}
