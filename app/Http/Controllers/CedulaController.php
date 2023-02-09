<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CedulaController extends Controller
{
    public function validateCedula($cedula)
    {
        if (strlen($cedula) != 10) {
            return false;
        }

        $d = 0;
        for ($i = 0; $i < 9; $i++) {
            $d += ($cedula[$i] * (2 - ($i % 2)));
        }

        if ((10 - ($d % 10)) % 10 != $cedula[9]) {
            return false;
        }

        return true;
    }
}
