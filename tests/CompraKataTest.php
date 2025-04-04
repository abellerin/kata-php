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
    public function addProductWithoutQuantityReturnsProductX1(): void
    {
        $result = $this->compra->convert("añadir pan");
        $this->assertEquals("pan x1", $result);
    }
    
    /**
    * @test
    */
    public function addProductTwoWithCapitalLetterReturnsProductX2(): void
    {
        $result = $this->compra->convert("añadir Leche 2");
        $this->assertEquals("leche x2", $result);
    }
    
    /**
    * @test
    */
    public function removeProductReturnsProductDoesNotExist(): void
    {
        $result = $this->compra->convert("eliminar arroz");
        $this->assertEquals("El producto seleccionado no existe", $result);
    }
    
    /**
    * @test
    */
    public function emptyReturnsAnEmptyString(): void
    {
        $result = $this->compra->convert("vaciar");
        $this->assertEquals("", $result);
    }
}