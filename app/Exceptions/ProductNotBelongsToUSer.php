<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUSer extends Exception
{
    //
    public function render()
    {
        return ['Error' => 'Product Not Belongs To User'];
    }
}
