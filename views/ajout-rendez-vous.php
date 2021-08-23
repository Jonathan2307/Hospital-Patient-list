<?php
require '../controllers/controller.php';
require '../controllers/controller-rdv.php';
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
    <h1>Prise de rendez-vous</h1>
    <div>
        <form action="" method="post">
            <select name="idPatient">
                <option value="">Liste des patients</option>
                <?php
                foreach ($list as $listDetails) : ?>
                    <option class="form-label" value="<?= $listDetails['id']; ?>"><?= $listDetails['firstname'] . ' ' . $listDetails['lastname']; ?></option>
                <?php endforeach; ?>
            </select>
            <div>
                <label for="datetime-local" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" name="dateHour" value="" min="2021-08-20T09:00" max="2021-12-31T16:00">
            </div>
            <button type="submit" class="btn btn-success" name="appointment">Valider</button>
        </form>
    </div>
    <a href="../index.php" class="text-decoration-none">
        <button type="button" class="btn btn-warning mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
            </svg> Accueil
        </button>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>