<?php
$target_dir = "../../anexos/";
$timestamp = time();
$newFileName = $target_dir .$timestamp.'.'. pathinfo($_FILES["inputFile"]["name"] ,PATHINFO_EXTENSION); //get the file extension and append it to the new file name
$fileName = $timestamp.'.'.pathinfo($_FILES["inputFile"]["name"] ,PATHINFO_EXTENSION);
$uploadOk = 1;
$fileType = pathinfo($_FILES["inputFile"]["name"] ,PATHINFO_EXTENSION);
// Check if file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["inputFile"]["tmp_name"]);
    if($check !== false) {
        echo json_encode(array('erro' => true, 'description' => 'Erro. Arquivo é uma imagem: '.$check["mime"]));
        exit;
        $uploadOk = 1;
    } else {
        echo json_encode(array('erro' => true, 'description' => 'Erro. Este arquivo não é uma imagem.'));
        exit;
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($newFileName)) {
    echo json_encode(array('erro' => true, 'description' => 'Erro de Conflito. Já existe um arquivo com este mesmo nome - Contate o Desenvolvedor.'));
    exit;
    $uploadOk = 0;
}
// Check file size
if ($_FILES["inputFile"]["size"] > 500000) {
    echo json_encode(array('erro' => true, 'description' => 'O arquivo enviado é muito grande. Máximo de 2mb.'));
    exit;
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
&& $fileType != "gif" ) {
    echo json_encode(array('erro' => true, 'description' => 'Somente JPG, JPEG, PNG e GIF são aceitos.'));
exit;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo json_encode(array('erro' => true, 'description' => 'Erro desconhecido - Contate o Desenvolvedor'));
    exit;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["inputFile"]["tmp_name"],  $newFileName)) {
        echo json_encode(array('erro' => false, 'description' => 'Arquivo enviado com sucesso', 'fileName' => $fileName));
        exit;

    } else {
        echo json_encode(array('erro' => true, 'description' => 'Erro desconhecido - Contate o Desenvolvedor'));
        exit;
    }
}
?>