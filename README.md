Class list
==========

Retrieves the list of all the classes (actual and parent classes) of a given class or object.

## Installation & Requirements

Install with [Composer](https://getcomposer.org):

```shell script
composer require jmf/class-list
```

## Usage

### With objects

```php
<?php

use Jmf\ClassList\ClassesResolver;

$resolver = new ClassesResolver();

class Foo {}
class Bar extends Foo {}
class Baz extends Bar {}

$foo = new Foo();
$bar = new Bar();
$baz = new Baz();

print_r($resolver->resolveForObject($foo));
print_r($resolver->resolveForObject($bar));
print_r($resolver->resolveForObject($baz));
```

Will output:

````text
Array
(
    [0] => Foo
)
Array
(
    [0] => Bar
    [1] => Foo
)
Array
(
    [0] => Baz
    [1] => Bar
    [2] => Foo
)
````

### With classes

```php
<?php

use Jmf\ClassList\ClassesResolver;

$resolver = new ClassesResolver();

class Foo {}
class Bar extends Foo {}
class Baz extends Bar {}

print_r('stdClass');
print_r($resolver->resolveForClass(Foo::class));
print_r($resolver->resolveForClass(Bar::class));
print_r($resolver->resolveForClass(Baz::class));
```

Will output:

````text
Array
(
    [0] => stdClass
)
Array
(
    [0] => Foo
)
Array
(
    [0] => Bar
    [1] => Foo
)
Array
(
    [0] => Baz
    [1] => Bar
    [2] => Foo
)
````