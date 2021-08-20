<?php

require '../models/database.php';
require '../models/patient.php';
require '../models/appointment.php';

$regexMail = '/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/';
$regexName = '/^[a-zA-Z]+$/';
$regexTel = '/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/';
$regexDate = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/';

//instance for liste-patient.php from dbh
$patientListObj = new Patients();

//check for ajout-patient.php
if (isset($_POST['add-patient'])) {
    //error management
    $errorArray = array(); //for dbh insert
    $valid = array(); //for frontend BS
    $firstname = trim(htmlspecialchars($_POST['firstname']));
    $lastname = trim(htmlspecialchars($_POST['lastname']));
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $email = trim(htmlspecialchars($_POST['email']));

    //regex check
    //firstname check
    if (!preg_match($regexName, $firstname)) {
        $errorArray['firstname'] = 'Erreur de format de prenom : chiffre ou champs vide non pris en charge';
        $valid['firstname'] = 'is-invalid ';
    } else {
        $valid['firstname'] = 'is-valid';
    };

    //lastname check
    if (!preg_match($regexName, $lastname)) {
        $errorArray['lastname'] = 'Erreur de format de nom : chiffre ou champs vide non pris en charge';
        $valid['lastname'] = 'is-invalid ';
    } else {
        $valid['lastname'] = 'is-valid';
    };

    //email check
    if (!preg_match($regexMail, $email)) {
        $errorArray['email'] = 'Erreur de format mail : exemple@exemple.fr';
        $valid['email'] = 'is-invalid ';
    } else {
        $valid['email'] = 'is-valid';
    };

    //phone check
    if (!preg_match($regexTel, $phone)) {
        $errorArray['phone'] = 'Erreur de format de téléphone : +33 ou 0123456789';
        $valid['phone'] = 'is-invalid ';
    } else {
        $valid['phone'] = 'is-valid';
    };

    //valid form 
    //push in dbh
    if (empty($errorArray)) {
        $patientObj = new Patients();
        $allPatientsArray = $patientObj->insertPatient($firstname, $lastname, $birthdate, $phone, $email);
        $validationMessage = 'Votre inscription est validée';
    }
};

//check for update-profil-patient.php
if (isset($_POST['update-patient'])) {
    $errorArray = array(); //for dbh insert
    $valid = array(); //for frontend BS
    $firstname = trim(htmlspecialchars($_POST['firstname']));
    $lastname = trim(htmlspecialchars($_POST['lastname']));
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $email = trim(htmlspecialchars($_POST['email']));
    $id = trim(htmlspecialchars($_POST['update-patient']));

    //regex check
    //firstname check
    if (!preg_match($regexName, $firstname)) {
        $errorArray['firstname'] = 'Erreur de format de prenom : chiffre ou champs vide non pris en charge';
        $valid['firstname'] = 'is-invalid ';
    } else {
        $valid['firstname'] = 'is-valid';
    };

    //lastname check
    if (!preg_match($regexName, $lastname)) {
        $errorArray['lastname'] = 'Erreur de format de nom : chiffre ou champs vide non pris en charge';
        $valid['lastname'] = 'is-invalid ';
    } else {
        $valid['lastname'] = 'is-valid';
    };

    //email check
    if (!preg_match($regexMail, $email)) {
        $errorArray['email'] = 'Erreur de format mail : exemple@exemple.fr';
        $valid['email'] = 'is-invalid ';
    } else {
        $valid['email'] = 'is-valid';
    };

    //phone check
    if (!preg_match($regexTel, $phone)) {
        $errorArray['phone'] = 'Erreur de format de téléphone : +33 ou 0123456789';
        $valid['phone'] = 'is-invalid ';
    } else {
        $valid['phone'] = 'is-valid';
    };

    //push in dbh
    // var_dump($errorArray);
    if (empty($errorArray)) {
        $patientObj = new Patients();
        $updatePatient = $patientObj->updatePatient($firstname, $lastname, $birthdate, $phone, $email, $id);
        $validationUpdateMessage = 'Votre modification est validée';
        $patientObj = new Patients;
        $updatePatient = $patientObj->showPatientById($id);
    }
}

//check for profil-patient.php
if (isset($_POST['update-request'])) {
    $errorArray = array(); //for dbh insert
    $valid = array(); //for frontend BS

    $patientObj = new Patients;
    $updatePatient = $patientObj->showPatientById($_POST['update-request']);
}
