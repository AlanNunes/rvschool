<?php
$target_dir = "../../avatars/";
$timestamp = time();
$newFileName = $target_dir .$timestamp.'.'. pathinfo($_FILES["image"]["name"] ,PATHINFO_EXTENSION); //get the file extension and append it to the new file name
$fileName = $timestamp.'.'.pathinfo($_FILES["image"]["name"] ,PATHINFO_EXTENSION);
$uploadOk = 1;
$imageFileType = pathinfo($_FILES["image"]["name"] ,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo json_encode(array('erro' => true, 'description' => 'Erro. Arquivo é uma imagem: '.$check["mime"]));
        exit;
        $uploadOk = 1;
    } else {
        echo json_encode(array('erro' => true, 'description' => 'Erro. Este arquivo não é uma imagem.'));
        exit;
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($newFileName)) {
    echo json_encode(array('erro' => true, 'description' => 'Erro de Conflito. Já existe uma imagem com este mesmo nome - Contate o Desenvolvedor.'));
    exit;
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 2000000) {
    echo json_encode(array('erro' => true, 'description' => 'A imagem enviada é muito grande. Máximo de 5mb.'));
    exit;
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
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
    if (move_uploaded_file($_FILES["image"]["tmp_name"],  $newFileName)) {
        echo json_encode(array('erro' => false, 'description' => 'Imagem enviada com sucesso', 'imageName' => $fileName));
        exit;

    } else {
        echo json_encode(array('erro' => true, 'description' => 'Erro desconhecido - O problema pode ter ocorrido por ter excedido o limite de tamanho da imagem.'));
        exit;
    }
}
?>
