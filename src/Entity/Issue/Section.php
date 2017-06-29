<?php

namespace US\Humanox\Entity\Issue;

/**
 * Class Section
 * @Entity
 */
class Section
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}