<?php

namespace US\Humanox\Entity\Survey;

/**
 * Class QuestionOption
 * @Entity
 * @Table(name="SurveyQuestionOption"
 */
class QuestionOption
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="text")
     * @var string
     */
    private $text;

    /**
     * @ManyToOne(targetEntity="Question", inversedBy="options")
     * @var Question
     */
    private $question;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $upDate;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $endDate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param Question $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return \DateTime
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

    /**
     * @param \DateTime $upDate
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;
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



}