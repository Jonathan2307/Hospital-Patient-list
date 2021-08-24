<?php

class Appointment extends Database
{
    private $id;
    private $dateHour;
    private $idPatient;

    /**
     * function which allow to delete an appointment from dbh
     *
     * @param str $id
     * @return SQL request
     */
    public function deleteAppointment($id)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('DELETE FROM 
        hospitalE2N.appointments 
        WHERE
            id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * update the appointment in dbh
     *
     * @param str $dateHour
     * @param str $id
     * @return fetch
     */
    public function updateAppointment($dateHour, $id)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('UPDATE appointments 
        SET 
            dateHour = :dateHour
        WHERE
            id = :id');
        $req->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
    }


    /**
     * function showing current appointments from dbh
     *
     * @param str $id
     * @return fetch of dbh
     */
    public function showAppointmentById($idAppointment)
    {
        $dbh =  $this->connectDatabase();
        $fetch = $dbh->query("SELECT 
        appointments.id,
        appointments.dateHour,
        appointments.idPatients,
        patients.firstname,
        patients.lastname 
        FROM hospitalE2N.appointments INNER JOIN  patients ON appointments.idPatients = patients.id where appointments.id = {$idAppointment};")->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }


    /**
     * pushing appointment into database
     *
     * @param int $idPatient
     * @param str $dateHour
     * @return void
     */
    public function pushAppointment($idPatient, $dateHour)
    {
        $idPatient = intval($_POST['idPatient']);
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('INSERT INTO `appointments` (idPatients, dateHour) VALUES ( :idPatient, :dateHour)');
        $req->bindValue(':idPatient', $idPatient, PDO::PARAM_INT);
        $req->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $req->execute();
    }
    /**
     * show appointments with patients details
     *
     * @return array fetch
     */
    public function showAppointment()
    {
        $dbh =  $this->connectDatabase();
        $fetch = $dbh->query(' SELECT appointments.id, appointments.dateHour, appointments.idPatients, patients.firstname, patients.lastname FROM hospitalE2N.appointments inner join patients on appointments.idPatients = patients.id')->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of dateHour
     */
    public function getDateHour()
    {
        return $this->dateHour;
    }

    /**
     * Set the value of dateHour
     *
     * @return  self
     */
    public function setDateHour($dateHour)
    {
        $this->dateHour = $dateHour;

        return $this;
    }

    /**
     * Get the value of idPatient
     */
    public function getIdPatient()
    {
        return $this->idPatient;
    }

    /**
     * Set the value of idPatient
     *
     * @return  self
     */
    public function setIdPatient($idPatient)
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    /**
     * Get the value of idAppointment
     */
    public function getIdAppointment()
    {
        return $this->idAppointment;
    }

    /**
     * Set the value of idAppointment
     *
     * @return  self
     */
    public function setIdAppointment($idAppointment)
    {
        $this->idAppointment = $idAppointment;

        return $this;
    }
}
