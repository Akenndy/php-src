--TEST--
Float type should not allow invalid types as default
--FILE--
<?php

function test(float $arg = true)
{
    var_dump($arg);
}

test();

?>
--EXPECTF--
Fatal error: Cannot use true as default value for parameter $arg of type float in %s on line %d
