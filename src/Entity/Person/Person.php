<?php

namespace US\Humanox\Entity\Person;

/**
 * Class Person
 * @Entity
 * @Table(name="AA_personas")
 **/
class Person
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(name="apellidos", type="string")
     * @var string
     */
    private $lastName;

    /**
     * @Column(name="correo1", type="string", unique=TRUE)
     * @var EmailAddress
     */
    private $email1;

    /**
     * @Column(name="correo2", type="string")
     * @var EmailAddress
     */
    private $email2;

    /**
     * @Column(name="creado", type="datetime")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Column(name="dni_sin_letra", type="string")
     * @var string
     */
    private $dni;

    /**
     * @Column(name="fecha_nacimiento", type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @Column(name="modificado", type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $modifiedAt;

    /**
     * @Column(name="nif", type="string")
     * @var string
     */
    private $nif;

    /**
     * @Column(name="nombre", type="string")
     * @var string
     */
    private $firstName;

    /**
     * @Column(name="organizacion", type="string")
     * @var string
     */
    private $organization;

    /**
     * @Column(name="sexo", type="string")
     * @var string
     */
    private $gender;

    /**
     * @Column(name="telefono_trabajo", type="string")
     * @var string
     */
    private $phoneWork;

    /**
     * @Column(name="telefono_domicilio", type="string")
     * @var string
     */
    private $phoneHome;

    /**
     * @Column(name="telefono_movil", type="string")
     * @var string
     */
    private $phoneCell;

    /**
     * @Column(name="usesrelacion", type="string")
     * @var string
     */
    private $usesrelacion;

    /**
     * @Column(name="uvus", type="string")
     * @var string
     */
    private $uvus;


    /**
     * @param array $data
     */
    function __construct($data)
    {
        foreach ($data as $field => $value) {
            $this->$field = $value;
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail1()
    {
        return $this->email1;
    }

    /**
     * @param EmailAddress $email1
     */
    public function setEmail1($email1)
    {
        $this->email1 = $email1;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * @param EmailAddress $email2
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param \DateTime $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param string $nif
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getPhoneWork()
    {
        return $this->phoneWork;
    }

    /**
     * @param string $phoneWork
     */
    public function setPhoneWork($phoneWork)
    {
        $this->phoneWork = $phoneWork;
    }

    /**
     * @return string
     */
    public function getPhoneHome()
    {
        return $this->phoneHome;
    }

    /**
     * @param string $phoneHome
     */
    public function setPhoneHome($phoneHome)
    {
        $this->phoneHome = $phoneHome;
    }

    /**
     * @return string
     */
    public function getPhoneCell()
    {
        return $this->phoneCell;
    }

    /**
     * @param string $phoneCell
     */
    public function setPhoneCell($phoneCell)
    {
        $this->phoneCell = $phoneCell;
    }

    /**
     * @return string
     */
    public function getUsesrelacion()
    {
        return $this->usesrelacion;
    }

    /**
     * @param string $usesrelacion
     */
    public function setUsesrelacion($usesrelacion)
    {
        $this->usesrelacion = $usesrelacion;
    }

    /**
     * @return string
     */
    public function getUvus()
    {
        return $this->uvus;
    }

    /**
     * @param string $uvus
     */
    public function setUvus($uvus)
    {
        $this->uvus = $uvus;
    }

}

