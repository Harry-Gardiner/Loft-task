<?php;

use PHPUnit\Framework\TestCase;
use App\Bananas;

class BananasTest extends TestCase
{

    private $banana;

    public function setUp() : void
    {
        parent::setUp();
        $this->banana = new Bananas();
    }


    public function testsame(): void
    {
        $this->assertSame("Hello World", $this->banana->getHello());
    }
}