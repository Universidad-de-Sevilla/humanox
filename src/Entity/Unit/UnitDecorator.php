<?php


namespace US\Humanox\Entity\Unit;

/**
 * Class UnitDecorator
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


}