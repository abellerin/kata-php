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
    public function addPanReturnsPanX1(): void
    {
        $result = $this->compra->convert("añadir pan");
        $this->assertEquals("pan x1", $result);
    }
    
    /**
    * @test
    */
    public function addPanTwoReturnsPanX2(): void
    {
        $result = $this->compra->convert("añadir Pan 2");
        $this->assertEquals("pan x2", $result);
    }
    
    /**
    * @test
    */
    public function addLecheTwoReturnsLecheX2(): void
    {
        $result = $this->compra->convert("añadir leche 2");
        $this->assertEquals("leche x2", $result);
    }
    
    /**
    * @test
    */
    public function removePanReturnsNoPan(): void
    {
        $result = $this->compra->convert("eliminar pan");
        $this->assertEquals("El producto seleccionado no existe", $result);
    }
    
    /**
    * @test
    */
    public function emptyReturns(): void
    {
        $result = $this->compra->convert("vaciar");
        $this->assertEquals("", $result);
    }
    

}