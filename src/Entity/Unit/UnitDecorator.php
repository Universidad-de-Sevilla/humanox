<?php

namespace US\Humanox\Entity\Unit;

/**
 * @Entity
 * @Table(name="AB_entidades_decoradores")
 */
class UnitDecorator
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(name="codigo", type="string")
     * @var  string
     */
    private $code;
    /**
     * @Column(name="fecha_baja", type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $endDate;

    /**
     * @Column(name="nombre", type="string")
     * @var  string
     */
    private $name;

    /**
     * @Column(name="observaciones", type="text")
     * @var string
     */
    private $notes;

    /**
     * @Column(name="fecha_alta", type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $startDate;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->code = $data['code'];
        $this->endDate = $data['endDate'];
        $this->name = $data['name'];
        $this->notes = $data['notes'];
        $this->startDate = $data['startDate'];
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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