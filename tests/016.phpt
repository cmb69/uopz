--TEST--
uopz_flags
--SKIPIF--
<?php include("skipif.inc") ?>
--FILE--
<?php
class Foo {
	public function method() {}
}

$flags = uopz_flags(Foo::class, "method", PHP_INT_MAX);
var_dump((bool) (uopz_flags(
	Foo::class, "method", $flags | ZEND_ACC_PRIVATE) & ZEND_ACC_PRIVATE));
var_dump((bool) (uopz_flags(Foo::class, "method", PHP_INT_MAX) & ZEND_ACC_PRIVATE));
?>
--EXPECT--
bool(false)
bool(true)
