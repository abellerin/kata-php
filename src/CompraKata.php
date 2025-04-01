<?php

namespace Deg540\DockerPHPBoilerplate;

class CompraKata {
    private array $productos = [];

    public function convert(string $instruccion): string {
        $partes = explode(' ', strtolower(trim($instruccion)));
        $accion = $partes[0];

        switch ($accion) {
            case 'añadir':
                if (count($partes) < 2) return $this->formatearLista();
                $nombre = $partes[1];
                $cantidad = isset($partes[2]) && is_numeric($partes[2]) ? (int)$partes[2] : 1;
                $this->productos[$nombre] = ($this->productos[$nombre] ?? 0) + $cantidad;
                break;

            case 'eliminar':
                if (count($partes) < 2) return $this->formatearLista();
                $nombre = $partes[1];
                if (!isset($this->productos[$nombre])) {
                    return "El producto seleccionado no existe";
                }
                unset($this->productos[$nombre]);
                break;

            case 'vaciar':
                $this->productos = [];
                break;
        }

        return $this->formatearLista();
    }

    private function formatearLista(): string {
        if (empty($this->productos)) return "";
        ksort($this->productos, SORT_NATURAL | SORT_FLAG_CASE);
        $items = array_map(fn($nombre, $cantidad) => "$nombre x$cantidad", array_keys($this->productos), $this->productos);
        return implode(", ", $items);
    }
}


// Ejemplo de flujo: cómo se irían agregando los productos de forma acumulativa, es decir,
// si se añade el mismo producto varias veces, se suman las cantidades
// y si se elimina, se eliminan las cantidades acumuladas
$lista = new CompraKata();
echo $lista->convert("añadir pan"); // "pan x1"
echo "\n";
echo $lista->convert("añadir leche 2"); // "leche x2, pan x1"
echo "\n";
echo $lista->convert("añadir Pan 2"); // "leche x2, pan x3"
echo "\n";
echo $lista->convert("eliminar arroz"); // "El producto seleccionado no existe"
echo "\n";
echo $lista->convert("eliminar pan"); // "leche x2"
echo "\n";
echo $lista->convert("vaciar"); // ""