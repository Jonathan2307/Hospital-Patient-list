<?php

$list = $patientListObj->showPatient();
$appointmentListObj = new Appointment();
$appointmentListAll = $appointmentListObj->showAppointment();

if (isset($_POST['appointment']) && $_POST['idPatient'] > 0) {
    $newAppointment = new Appointment();
    $newAppointment->pushAppointment($_POST['idPatient'], $_POST['dateHour']);
    
} 

if (isset($_POST['update-rdv'])) {
    $dateHour = $_POST['dateHour'];
    $id = $_POST['update-rdv'];
    $updateAppointment = $appointmentListObj->updateAppointment($dateHour, $id);

}

if(isset($_POST['btn-show-appointment'])) {
    $appointmentObj = new Appointment();
    $detailAppointmentArray = $appointmentObj->showAppointmentById($_POST['btn-show-appointment']);

}

if(isset($_POST['update-rdv-request'])) {
    $appointmentObj = new Appointment();
    $detailAppointmentArray = $appointmentObj->showAppointmentById($_POST['update-rdv-request']);

    $explode = explode(' ', $detailAppointmentArray['dateHour']);
    $newDateHour = $explode[0] . 'T' . $explode[1];
}
