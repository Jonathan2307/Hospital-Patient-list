<?php

$list = $patientListObj->showPatient();

if (isset($_POST['appointment']) && $_POST['idPatient'] > 0) {
    var_dump($_POST['idPatient']);
    var_dump($_POST['dateHour']);
    $newAppointment = new Appointment();
    $newAppointment->pushAppointment($_POST['idPatient'], $_POST['dateHour']);
    
} 