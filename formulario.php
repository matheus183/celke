

<HTML>
<HEAD>
<TITLE>Comentários</TITLE>
</HEAD>
<BODY>
<h2>Comentários Enviados pelos Usuários</h3>
<?php
$link=mysqli_connect("localhost","root","");
$banco=mysqli_select_db($link,"bdcomentarios");
?>

<form name="form" method="post" action="#">
    Nome:
    <input type=text name=nome>
    <br><br>E-Mail:
    <input type=text name=email>
    <br><br>Mensagem:<br>
    <textarea name=comentario></textarea>
    <br><br>
    <input type=submit value=Enviar>
    <input type=reset value=Limpar>
</form>
<hr>

<?php

$nome=$_POST['nome'];
$email=$_POST['email'];
$data = date("Y/m/d");           
$comentario=$_POST['comentario']; 
if(strlen($_POST['nome'])) #insere somente se no form foi escrito o nome
{
    $insert = mysqli_query($link, "INSERT INTO tbcomentario(nome,email,data,comentario) 
    values('$nome','$email','$data','$comentario')");
}
$sql = "SELECT * FROM tbcomentario ORDER BY id desc";
$executar=mysqli_query($link, $sql);
while( $exibir = mysqli_fetch_array($executar)){
    echo $exibir['data'];
    echo "</br>";
    echo $exibir['nome'];
    echo "</br>";
    echo $exibir['email'];
    echo "</br>";
    echo $exibir['comentario'];
    echo "</br><hr>";
}
?>
</BODY>
</HTML>