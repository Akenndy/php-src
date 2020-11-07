--TEST--
Test that initialized initonly properties can't be modified after cloning
--FILE--
<?php

class Foo
{
    initonly public int $property1;
    initonly public string $property2 = "";
}

$foo = new Foo();
$foo->property1 = 1;
$bar = clone $foo;

try {
    $bar->property1 = 2;
} catch (Error $exception) {
    echo $exception->getMessage() . "\n";
}

try {
    $bar->property2 = "Baz";
} catch (Error $exception) {
    echo $exception->getMessage() . "\n";
}

try {
    $var = &$foo->property2;
} catch (Error $exception) {
    echo $exception->getMessage() . "\n";
}

?>
--EXPECT--
Cannot modify initonly property Foo::$property1 after initialization
Cannot modify initonly property Foo::$property2 after initialization
Cannot acquire reference to initonly property Foo::$property2
