<?php
function testeTamCpf($cpf){
    if(strlen($cpf) < 11 || strlen($cpf) > 11){
        return true;
    }
    return false;
}

?>