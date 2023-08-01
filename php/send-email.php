<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Função para limpar e validar os dados enviados pelo formulário
    function limpar_dados($dados) {
        $dados = trim($dados);
        $dados = stripslashes($dados);
        $dados = htmlspecialchars($dados);
        return $dados;
    }

    // Recupera os dados enviados pelo formulário e limpa-os
    $nome = limpar_dados($_POST["nome"]);
    $email = limpar_dados($_POST["email"]);
    $mensagem = limpar_dados($_POST["mensagem"]);

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($mensagem)) {
        header("Location: formulario_contato.html?erro=campos_vazios");
        exit;
    }

    // Verifica se o e-mail é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: formulario_contato.html?erro=email_invalido");
        exit;
    }

    // Resposta automática
    $assunto = "Obrigado por entrar em conctato, $nome!";
    $mensagem_auto = "Olá $nome,\n\nObrigado por entrar em contato conosco! Recebemos a seguinte mensagem:\n\n";
    $mensagem_auto .= "$mensagem\n\n";
    $mensagem_auto .= "Em breve iremos responder.\n\nAtenciosamente,\nManuel Designer";

    // Cabeçalhos para a resposta automática
    $cabecalhos = "From: oi@manueldesigner.ao"; // Substitua pelo e-mail da sua empresa

    // Envie a resposta automática
    mail($email, $assunto, $mensagem_auto, $cabecalhos);

    // Exemplo de redirecionamento para uma página de agradecimento (opcional)
    header("Location: obrigado.html");
    exit;
}
?>
