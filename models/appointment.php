<?php

Class Appointment extends Database {
    private $id;
    private $dateHour;
    private $idPatient;

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
}