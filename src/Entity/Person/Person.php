<?php

namespace US\Humanox\Entity\Person;

/**
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
     * @Column(type="string")
     * @var string
     */
    private $dni_sin_letra;

    /**
     * @Column(type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $fecha_nacimiento;

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
     * @Column(type="string")
     * @var string
     */
    private $telefono_trabajo;

    /**
     * @Column(type="string")
     * @var string
     */
    private $telefono_domicilio;

    /**
     * @Column(type="string")
     * @var string
     */
    private $telefono_movil;

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
        return $this->dni_sin_letra;
    }

    /**
     * @param string $dni_sin_letra
     */
    public function setDniSinLetra($dni_sin_letra)
    {
        $this->dni_sin_letra = $dni_sin_letra;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param \DateTime $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
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
        return $this->telefono_trabajo;
    }

    /**
     * @param string $telefono_trabajo
     */
    public function setTelefonoTrabajo($telefono_trabajo)
    {
        $this->telefono_trabajo = $telefono_trabajo;
    }

    /**
     * @return string
     */
    public function getTelefonoDomicilio()
    {
        return $this->telefono_domicilio;
    }

    /**
     * @param string $telefono_domicilio
     */
    public function setTelefonoDomicilio($telefono_domicilio)
    {
        $this->telefono_domicilio = $telefono_domicilio;
    }

    /**
     * @return string
     */
    public function getTelefonoMovil()
    {
        return $this->telefono_movil;
    }

    /**
     * @param string $telefono_movil
     */
    public function setTelefonoMovil($telefono_movil)
    {
        $this->telefono_movil = $telefono_movil;
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

