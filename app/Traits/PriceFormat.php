<?php

namespace App\Traits;

trait PriceFormat{

    public function formatPriceToDatabase($price)
    {
        return str_replace(['.', ',', ' ', 'R$'], ['', '.', '', ''], $price);
    }
}