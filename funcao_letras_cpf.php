<?php
function testarSeTemLetras($cpf){
    $digito = str_split($cpf);
    foreach ($digito as $digitos) {
        if(ctype_alpha($digitos)){
            return true;
        }
    }
    return false;
}
