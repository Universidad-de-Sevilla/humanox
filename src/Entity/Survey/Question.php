<?php

namespace US\Humanox\Entity\Survey;

/**
 * Class Question
 * @Entity
 * @Table(name="SurveyQuestion"
 */
class Question
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @OneToMany(targetEntity="QuestionOption", mappedBy="question")
     * @var QuestionOption[]
     */
    private $options;

    /**
     * @Column(type="text")
     * @var string
     */
    private $wording;

    /**
     * @ManyToOne(targetEntity="QuestionType")
     * @var QuestionType
     */
    private $type;



}