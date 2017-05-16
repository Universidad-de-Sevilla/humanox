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
     * @Column(type="string")
     * @var string
     */
    private $apellidos;

    /**
     * @Column(type="string", unique=TRUE)
     * @var EmailAddress
     */
    private $correo1;

    /**
     * @Column(type="string")
     * @var EmailAddress
     */
    private $correo2;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $creado;

    /**
     * @Column(name="dni_sin_letra", type="string")
     * @var string
     */
    private $dniSinLetra;

    /**
     * @Column(name="fecha_nacimiento", type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $fechaNacimiento;

    /**
     * @Column(type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $modificado;

    /**
     * @Column(type="string")
     * @var string
     */
    private $nif;

    /**
     * @Column(type="string")
     * @var string
     */
    private $nombre;

    /**
     * @Column(type="string")
     * @var string
     */
    private $organizacion;

    /**
     * @Column(type="string")
     * @var string
     */
    private $sexo;

    /**
     * @Column(name="telefono_trabajo", type="string")
     * @var string
     */
    private $telefonoTrabajo;

    /**
     * @Column(name="telefono_domicilio", type="string")
     * @var string
     */
    private $telefonoDomicilio;

    /**
     * @Column(name="telefono_movil", type="string")
     * @var string
     */
    private $telefonoMovil;

    /**
     * @Column(type="string")
     * @var string
     */
    private $usesrelacion;

    /**
     * @Column(type="string")
     * @var string
     */
    private $uvus;


    /**
     * @param array $data
     */
    function __construct($data)
    {
        $this->apellidos = $data['apellidos'];
        $this->correo1 = $data['correo1'];
        $this->creado = $data['creado'];
        $this->nombre = $data['nombre'];
        $this->sexo = $data['sexo'];
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
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return EmailAddress
     */
    public function getCorreo1()
    {
        return $this->correo1;
    }

    /**
     * @param EmailAddress $correo1
     */
    public function setCorreo1($correo1)
    {
        $this->correo1 = $correo1;
    }

    /**
     * @return EmailAddress
     */
    public function getCorreo2()
    {
        return $this->correo2;
    }

    /**
     * @param EmailAddress $correo2
     */
    public function setCorreo2($correo2)
    {
        $this->correo2 = $correo2;
    }

    /**
     * @return \DateTime
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * @param \DateTime $creado
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    }

    /**
     * @return string
     */
    public function getDniSinLetra()
    {
        return $this->dniSinLetra;
    }

    /**
     * @param string $dniSinLetra
     */
    public function setDniSinLetra($dniSinLetra)
    {
        $this->dniSinLetra = $dniSinLetra;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param \DateTime $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return \DateTime
     */
    public function getModificado()
    {
        return $this->modificado;
    }

    /**
     * @param \DateTime $modificado
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getOrganizacion()
    {
        return $this->organizacion;
    }

    /**
     * @param string $organizacion
     */
    public function setOrganizacion($organizacion)
    {
        $this->organizacion = $organizacion;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return string
     */
    public function getTelefonoTrabajo()
    {
        return $this->telefonoTrabajo;
    }

    /**
     * @param string $telefonoTrabajo
     */
    public function setTelefonoTrabajo($telefonoTrabajo)
    {
        $this->telefonoTrabajo = $telefonoTrabajo;
    }

    /**
     * @return string
     */
    public function getTelefonoDomicilio()
    {
        return $this->telefonoDomicilio;
    }

    /**
     * @param string $telefonoDomicilio
     */
    public function setTelefonoDomicilio($telefonoDomicilio)
    {
        $this->telefonoDomicilio = $telefonoDomicilio;
    }

    /**
     * @return string
     */
    public function getTelefonoMovil()
    {
        return $this->telefonoMovil;
    }

    /**
     * @param string $telefonoMovil
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;
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

