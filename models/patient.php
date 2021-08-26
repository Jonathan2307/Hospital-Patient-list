<?php

class Patients extends Database
{
    private $birthdate;
    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $id;


    public function returnID()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare('SELECT 
        id as id_Patient
        FROM
        `patients`
        ORDER BY id DESC LIMIT 0,1');
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
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
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('INSERT INTO `appointments` (idPatients, dateHour) VALUES ( :idPatient, :dateHour)');
        $req->bindValue(':idPatient', $idPatient, PDO::PARAM_INT);
        $req->bindValue(':dateHour', $dateHour, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * function to show user in pagination
     *
     * @param int $first
     * @param int $byPage
     * @return fetch
     */
    public function usersByPage($first, $byPage)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare('SELECT * 
        FROM `patients` 
        order by `id` 
        asc limit :first ,:byPage');
        $req->bindValue(':first', $first, PDO::PARAM_INT);
        $req->bindValue(':byPage', $byPage, PDO::PARAM_INT);
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }


    /**
     * function to count the users in dbh
     *
     * @return int 
     */
    public function totalUsers()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare('SELECT 
        COUNT(*) AS nb_patients 
        FROM `patients`');
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return (int)$fetch['nb_patients'];
    }


    /**
     * function that search in dbh the lastname starting by $string
     *
     * @param int $string
     * @return fetch of dbh
     */
    public function searchPatient($string)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('SELECT 
        *
        FROM
        hospitalE2N.patients
        WHERE
        lastname LIKE :string
        ORDER BY lastname ASC');
        $req->bindValue(':string', $string . '%', PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    public function deletePatient($id)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('DELETE FROM 
        hospitalE2N.patients 
        WHERE
            id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * function which show
     *
     * @param str $idPatient
     * @return SQL request
     */
    public function showAppointmentByPatient($idPatient)
    {
        $dbh =  $this->connectDatabase();
        $fetch = $dbh->query("SELECT 
        appointments.id as appointment_ID,
        appointments.dateHour as appointment_dateHour,
        appointments.idPatients as patient_ID,
        patients.firstname,
        patients.lastname 
        FROM hospitalE2N.appointments INNER JOIN  patients ON appointments.idPatients = patients.id where idPatients = {$idPatient};")->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * show full patient list from database
     *
     * @return SQL request
     */
    public function showPatient()
    {
        $dbh =  $this->connectDatabase();
        $fetch = $dbh->query('SELECT * FROM `patients`')->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * insert a new patient into dbh
     *
     * @param str $firstname
     * @param str $lastname
     * @param str $birthdate
     * @param str $phone
     * @param str $email
     * @return SQL
     */
    public function insertPatient($firstname, $lastname, $birthdate, $phone, $email)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('insert into patients (lastname,firstname,birthdate,phone,mail)values (:lastname, :firstname, :birthdate, :phone, :email)
        ');
        $req->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $req->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $req->bindValue(':phone', $phone, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * show a patient from dbh with it's id ref
     *
     * @param int $id
     * @return SQL
     */
    public function showPatientById($id)
    {
        $dbh =  $this->connectDatabase();
        $fetch = $dbh->query("select * from patients where id ={$id};")->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * function to update the patient data into dbh
     *
     * @param str $firstname
     * @param str $lastname
     * @param str $birthdate
     * @param str $phone
     * @param str $email
     * @param int $id
     * @return SQL
     */
    public function updatePatient($firstname, $lastname, $birthdate, $phone, $email, $id)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare("update patients set firstname = :firstname, lastname = :lastname, birthdate = :birthdate, phone = :phone, mail = :email where id = :id");

        $req->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $req->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $req->bindValue(':phone', $phone, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
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
}
