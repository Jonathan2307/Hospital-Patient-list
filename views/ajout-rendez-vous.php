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
    <title>LH HOSPITAL</title>
</head>

<body>
    <h1>Prise de rendez-vous</h1>
    <form action="" method="post">
        <select name="idPatient">
            <option value="">Liste des patients</option>
            <?php
            foreach ($list as $listDetails) { ?>
                <option value="<?= $listDetails['id']; ?>"><?= $listDetails['firstname'] . ' ' . $listDetails['lastname']; ?></option>
            <?php } ?>
        </select>
        <label for="datetime-local">Date</label>
        <input type="datetime-local" name="dateHour" value="" min="2021-08-20T09:00" max="2021-12-31T16:00">
        <button type="submit" name="appointment">Valider</button>
    </form>
</body>

</html>