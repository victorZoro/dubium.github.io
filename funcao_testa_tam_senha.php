<?php 
function testeTamSenha($senha){
    if(strlen($senha) < 14 || strlen($senha) > 14){
        return true;
    }
    return false;
}
?>