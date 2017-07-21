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
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * @param string $longName
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;
    }

    /**
     * @return mixed
     */
    public function getMiniName()
    {
        return $this->miniName;
    }

    /**
     * @param mixed $miniName
     */
    public function setMiniName($miniName)
    {
        $this->miniName = $miniName;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

}