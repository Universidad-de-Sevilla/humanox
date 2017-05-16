<?php

namespace US\Humanox\Repository;


use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\EntityRepository;
use US\Humanox\Entity\Person\Person;

/**
 * Class PersonRepository
 */
class PersonRepository extends EntityRepository
{
    /**
     * @param array $criteria
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return Person[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return parent::findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Guarda una persona en la base de datos
     * @param Person $person
     */
    public function save(Person $person)
    {
        parent::getEntityManager()->persist($person);
        parent::getEntityManager()->flush();
    }

    /**
     * @param int $id
     * @param int|null $lockMode
     * @param int|null $lockVersion
     * @return Person|null
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }


    /**
     * @param Person $person
     */
    public function delete(Person $person)
    {
        parent::getEntityManager()->remove($person);
        parent::getEntityManager()->flush();
    }

    /**
     * Cuenta el número de personas existente.
     *
     * @return integer Número total de personas.
     */
    public function count()
    {
        $dql = 'SELECT COUNT(p.id) FROM US\Humanox\Entity\Person\Person p';
        $query = parent::getEntityManager()->createQuery($dql);
        return $query->getSingleScalarResult();
    }

    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('email', new Assert\NotBlank());

    }
}