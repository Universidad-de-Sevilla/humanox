<?php


namespace US\Humanox\Entity\Issue;

/**
 * Class Journal
 * @Entity
 */
class Journal
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