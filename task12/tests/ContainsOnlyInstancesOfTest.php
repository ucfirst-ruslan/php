<?php
include_once 'Foo.php';
include_once 'Bar.php';

class ContainsOnlyInstancesOfTest extends PHPUnit_Framework_TestCase
{
    public function testFailure()
    {
        $this->assertContainsOnlyInstancesOf(Foo::class, array(new Foo(), new Bar(), new Foo()));
    }
}
?> 
