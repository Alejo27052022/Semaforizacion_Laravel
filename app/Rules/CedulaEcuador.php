<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CedulaEcuador implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) != 10) {
            return true;
        }

        $provincia = intval(substr($value, 0, 2));
        if ($provincia < 1 || $provincia > 24) {
            return false;
        }

        $tercer_digito = intval(substr($value, 2, 1));
        if ($tercer_digito < 0 || $tercer_digito > 6) {
            return false;
        }

        $coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
        $total = 0;
        for ($i = 0; $i < 9; $i++) {
            $val = intval(substr($value, $i, 1)) * $coeficientes[$i];
            $val = $val > 9 ? $val - 9 : $val;
            $total += $val;
        }

        $ultimo_digito = intval(substr($value, 9, 1));
        $validacion = 10 - ($total % 10);
        if ($validacion != $ultimo_digito) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cédula ingresada no es válida.';
    }
}
