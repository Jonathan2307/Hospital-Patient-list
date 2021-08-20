<?php
require '../controllers/controller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>LH Hospital</title>
</head>

<body class="background">

    <h1 class="text-center my-5">MODIFIER PATIENT</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <form class="col-4" method="post" action="">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control <?= $valid['firstname'] ?? null ?>" aria-label="firstname" id="firstname" aria-describedby="basic-addon1" name="firstname" value="<?= $updatePatient['firstname'] ?> ">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['firstname'] ?? null  ?></span>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control <?= $valid['lastname'] ?? null ?>" aria-label="lastname" id="lastname" aria-describedby="basic-addon1" name="lastname" value="<?= $updatePatient['lastname'] ?> ">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['lastname'] ?? null  ?></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Date de naissance</label>
                    <input class="form-control " type="date" name="birthdate" id="birthdate" value="<?= $updatePatient['birthdate'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Numéro de téléphone</label>
                    <input class="form-control <?= $valid['phone'] ?? null ?>" type="text" name="phone" id="phone" value="<?= $updatePatient['phone'] ?>">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['phone'] ?? null ?></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                    <input class="form-control <?= $valid['email'] ?? null ?>" type="mail" name="email" id="email" value="<?= $updatePatient['mail'] ?> ">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['email'] ?? null ?></span>
                </div>
                <div class="text-center mb-3">
                    <button type="submit" name="update-patient" value="<?= $updatePatient['id'] ?> " class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                        </svg>
                    </button>
                    <a href="./liste-patient.php">
                        <button type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                                <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                            </svg>
                        </button>
                    </a>
                </div>
            </form>
            <span class="text-center mb-3"><?= $validationUpdateMessage ?? null ?></span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>