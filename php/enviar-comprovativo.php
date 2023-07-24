<?php
  //Variáveis
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $file = $_POST['comprovativo'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Campo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Comprovativo: </b>$file</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "deopmdecastro@gmail.com";
  $assunto = "Comprovativo de Pagamento - Ebook Como Ter PIX em Angola";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);
  
  echo "<meta http-equiv='refresh' content='10;URL=../contato.html'>";
?>