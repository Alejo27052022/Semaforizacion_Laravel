<?php

namespace App\Providers\Validators;

use Illuminate\Support\Facades\Validator;

class CedulaValidator
{
    public function boot()
    {
        Validator::extend('ecuadorian_id', function ($attribute, $value, $parameters, $validator) {
            $cedula = str_split($value);
            $total = 0;
            $d = array(10, 9, 8, 7, 6, 5, 4, 3, 2);
            for ($i = 0; $i < 9; $i++) {
                $total += $d[$i] * $cedula[$i];
            }
            $mod = $total % 11;
            if ($mod == 0 || $mod == 1) {
                $mod = 0;
            } else {
                $mod = 11 - $mod;
            }
            if ($mod == $cedula[9]) {
                return true;
            } else {
                return false;
            }
        });
    }
}
