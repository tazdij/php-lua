--TEST--
test basic print() functionality
--SKIPIF--
<?php
if (!extension_loaded("lua")) print "skip lua extension missing";
?>
--FILE--
<?php
$lua = new Lua();

$lua->eval(<<<CODE
print (2+2)
CODE
);

$lua->eval(<<<CODE
x = 3
print (x)
CODE
);

$lua->eval(<<<CODE
print ("str")
CODE
);

$lua->eval(<<<CODE
x = "test\0test"
print (x)
CODE
);

$lua->eval(<<<CODE
print (nil)
CODE
);

$lua->eval(<<<CODE
print (nosuchvar)
CODE
);

$lua->eval(<<<CODE
print (true)
CODE
);

$lua->eval(<<<CODE
print (false)
CODE
);

$lua->eval(<<<CODE
foo = function () print("hello") end 
print (foo)
CODE
);

$lua->eval(<<<CODE
x = true
print (x)
CODE
);

?>
--EXPECTF--
43strtest test1LuaClosure Object
 (
 )
1
