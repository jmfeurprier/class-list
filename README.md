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

print_r($resolver->resolve($foo));
print_r($resolver->resolve($bar));
print_r($resolver->resolve($baz));
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

print_r($resolver->resolve(Foo::class));
print_r($resolver->resolve(Bar::class));
print_r($resolver->resolve(Baz::class));
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