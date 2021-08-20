<?php
require '../controllers/controller.php'
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
    <h1 class="text-center my-5">AJOUTER UN PATIENT</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <form class="col-4" method="post" action="ajout-patient.php">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control <?= $valid['firstname'] ?? null ?>" aria-label="firstname" id="firstname" aria-describedby="basic-addon1" name="firstname" value="<?= $firstname ?? '' ?> ">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['firstname'] ?? null  ?></span>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control <?= $valid['lastname'] ?? null ?>" aria-label="lastname" id="lastname" aria-describedby="basic-addon1" name="lastname" value="<?= $lastname ?? '' ?> ">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['lastname'] ?? null  ?></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                    <input class="form-control <?= $valid['email'] ?? null ?>" type="mail" name="email" id="email" value="<?= $email ?? '' ?> ">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['email'] ?? null ?></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Date de naissance</label>
                    <input class="form-control" type="date" name="birthdate" id="birthdate" value="<?= $birthdate ?? '' ?>">
                    <span class="fst-italic text-danger fs-6"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Numéro de téléphone</label>
                    <input class="form-control <?= $valid['phone'] ?? null ?>" type="text" name="phone" id="phone" value="">
                    <span class="fst-italic text-danger fs-6"><?= $errorArray['phone'] ?? null ?></span>
                </div>
                <div class="text-center mb-3">
                    <a href="../index.php">
                        <button type="button" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                            </svg>
                        </button>
                    </a>
                    <button type="submit" class="btn btn-success" name="add-patient">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </button>
                </div>
            </form>

            <span class="text-center mb-3"><?= $validationMessage ?? null ?></span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>