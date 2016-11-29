<?php
/**
 * Portus Project - Entity/Person.php
 *
 * Developed by Juanan Ruiz <juanan@us.es>
 * Created 10/5/16 - 21:57
 */

namespace US\Portus\Entity\Person;

/**
 * @Entity 
 **/
class Person
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;
    /**
     * @Column(type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    protected $birthDate;
    /**
     * @Column(type="string")
     * @var string
     */
    private $firstName;
    /**
     * @Column(type="string")
     * @var string
     */
    private $lastName;
    /**
     * @Column(type="string", unique=TRUE)
     * @var EmailAddress
     */
    private $email;
    /**
     * @ManyToOne(targetEntity="Gender")
     * @var Gender
     */
    private $gender;
    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $startDate;
    /**
     * @Column(type="datetime", nullable=TRUE)
     * @var \DateTime
     */
    private $endDate;

    /**
     * @param array $data
     */
    function __construct($data)
    {
        $this->email = $data['email'];
        $this->firstName = $data['firstName'];
        $this->gender = $data['gender'];
        $this->lastName = $data['lastName'];
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return Gender gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param Gender $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = new EmailAddress($email);
    }

}

