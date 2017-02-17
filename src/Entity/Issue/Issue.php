<?php

namespace US\Humanox\Entity\Issue;

/**
 * Class Issue
 * @Entity
 **/
class Issue
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @Column(type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $endDate;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $startDate;


}