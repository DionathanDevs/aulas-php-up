<?php 

function validar_livro($livro){
    
    if (isset($livro['title']) && isset($livro['autor'])) {
        
        if (is_numeric($livro['price']) && is_numeric($livro['quant']) && $livro['price'] >= 0.01 && $livro['quant'] > 0) {
           return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

function calcularValorTotalEstoque($livro){
    
   return $livro['price'] * $livro['quant'];
}

?>