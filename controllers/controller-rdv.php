<?php

//liste-rendez-vous.php controls
$list = $patientListObj->showPatient();
$appointmentListObj = new Appointment();
$appointmentListAll = $appointmentListObj->showAppointment();
if(isset($_POST['btn-show-appointment'])) {
    $appointmentObj = new Appointment();
    $detailAppointmentArray = $appointmentObj->showAppointmentById($_POST['btn-show-appointment']);
}
if(isset($_POST['delete-appointment'])) {
    $appointmentObj = new Appointment();
    $deleteAppointment = $appointmentObj->deleteAppointment($_POST['delete-appointment']);
    header('Location: ./liste-rendez-vous.php');
}

//ajout-rendez-vous.php controls
if (isset($_POST['appointment']) && $_POST['idPatient'] > 0) {
    $newAppointment = new Appointment();
    $newAppointment->pushAppointment($_POST['idPatient'], $_POST['dateHour']);   
} 

//update-rendez-vous.php controller
if (isset($_POST['update-rdv'])) {
    $dateHour = $_POST['dateHour'];
    $id = $_POST['update-rdv'];
    $updateAppointment = $appointmentListObj->updateAppointment($dateHour, $id);
} 

//rendez-vous.php controls
if(isset($_POST['update-rdv-request'])) {
    $appointmentObj = new Appointment();
    $detailAppointmentArray = $appointmentObj->showAppointmentById($_POST['update-rdv-request']);

    //adapt date format
    $explode = explode(' ', $detailAppointmentArray['dateHour']);
    $newDateHour = $explode[0] . 'T' . $explode[1];
}

