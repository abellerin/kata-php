<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\CompraKata;

class CompraKataTest extends TestCase
{
    private CompraKata $compra;

    protected function setUp(): void
    {
        parent::setUp();

        $this->compra = new CompraKata();
    }

    /**
    * @test
    */
    public function anadirPanReturnsPanX1(): void
    {
        $result = $this->compra->convert("añadir pan");
        $this->assertEquals("pan x1", $result);
    }

}