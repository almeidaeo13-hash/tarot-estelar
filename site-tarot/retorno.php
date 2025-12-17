<?php
/**
 * ARQUIVO: retorno.php
 * OBJETIVO: Identificar o produto comprado e redirecionar para o destaque correto.
 */

// 1. Iniciamos a variável como 'desconhecido' por segurança
$produto_identificado = 'desconhecido';

// 2. O PagSeguro envia o nome do produto no campo 'item_description_1'
if (isset($_POST['item_description_1'])) {
    // Pegamos o nome e transformamos em letras minúsculas para facilitar a busca
    $nome_item = mb_strtolower($_POST['item_description_1'], 'UTF-8');

    // 3. Verificamos se no nome do produto existe a palavra 'celta' ou 'tarot'
    if (strpos($nome_item, 'celta') !== false) {
        $produto_identificado = 'celta';
    } elseif (strpos($nome_item, 'tarot') !== false || strpos($nome_item, '3 cartas') !== false) {
        $produto_identificado = 'tarot';
    } elseif (strpos($nome_item, 'cigano') !== false) {
        $produto_identificado = 'cigano';
    }
}

// 4. Redirecionamos o cliente para o seu HTML enviando o parâmetro na URL
// Exemplo final da URL: https://www.tarotestelar.com.br/redireciona.html?produto=celta
$url_final = "https://www.tarotestelar.com.br/redireciona.html?produto=" . $produto_identificado;

header("Location: " . $url_final);
exit();
?>