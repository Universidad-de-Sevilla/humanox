<?php

namespace US\Humanox\Entity\Unit;

/**
 * Class Unit
 * @Entity
 * @Table (name="AB_entidades")
 **/
class Unit
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(name="fecha_baja", type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $endDate;

    /**
     * @Column(name="nombre_largo", type="string")
     * @var  string
     */
    private $longName;

    /**
     * @Column(name="nombre_mini", type="string")
     * @var  string
     */
    private $miniName;

    /**
     * @Column(name="observaciones", type="text")
     * @var string
     */
    private $notes;

    /**
     * @Column(name="nombre_corto", type="string")
     * @var  string
     */
    private $shortName;

    /**
     * @Column(name="fecha_alta", type="datetime")
     * @var \DateTime
     */
    private $startDate;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->endDate = $data['endDate'];
        $this->longName = $data['longName'];
        $this->miniName = $data['miniName'];
        $this->notes = $data['notes'];
        $this->shortName = $data['shortName'];
        $this->startDate = $data['startDate'];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}