<?php

namespace US\Humanox\Entity\Survey;


/**
 * @Entity
 * @Table(name="SurveyQuestion"
 */
class Question
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
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