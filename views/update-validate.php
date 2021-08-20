<?php
require '../controllers/controller.php';

var_dump($_POST);
var_dump($errorArray);
?>
<span class="text-center mb-3"><?= $validationUpdateMessage ?? null ?></span>