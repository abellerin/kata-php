<?php

namespace Deg540\DockerPHPBoilerplate;

class CompraKata {
    private array $productos = [];

    public function procesarInstruccion(string $instruccion): string {
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

$lista = new ListaCompra();
echo $lista->procesarInstruccion("añadir pan");
echo "\n";
echo $lista->procesarInstruccion("añadir Pan 2");
echo "\n";
echo $lista->procesarInstruccion("añadir leche 2");
echo "\n";
echo $lista->procesarInstruccion("eliminar pan");
echo "\n";
echo $lista->procesarInstruccion("vaciar");
