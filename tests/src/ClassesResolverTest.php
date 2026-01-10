<?php

namespace Jmf\ClassList;

use Jmf\ClassList\Exception\ClassNotFoundException;
use Override;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ClassesResolverTest extends TestCase
{
    private ClassesResolver $classesResolver;

    #[Override]
    protected function setUp(): void
    {
        $this->classesResolver = new ClassesResolver();
    }

    public function testResolveWithObject(): void
    {
        $result = $this->classesResolver->resolveForObject($this);

        self::assertContains(self::class, $result);
        self::assertContains(TestCase::class, $result);
    }

    /**
     * @throws ClassNotFoundException
     */
    public function testResolveWithExistingClass(): void
    {
        $result = $this->classesResolver->resolveForClass(ClassesResolverTest::class);

        self::assertContains(self::class, $result);
        self::assertContains(TestCase::class, $result);
    }

    /**
     * @throws ClassNotFoundException
     */
    public function testResolveWithUndefinedClass(): void
    {
        $this->expectException(ClassNotFoundException::class);

        // @phpstan-ignore argument.type
        $this->classesResolver->resolveForClass('UndefinedClass');
    }
}
