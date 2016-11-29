<?php
namespace US\Portus\Repository;

use Doctrine\ORM\EntityRepository;
use US\Portus\Entity\Person\Gender;

/**
 * Class PersonRepository
 */
class GenderRepository extends EntityRepository
{
    /**
     * @param array $criteria
     * @param array $orderBy
     * @param int|$limit
     * @param int|null $offset
     * @return Gender[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return parent::findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @param Gender $gender
     */
    public function save(Gender $gender)
    {
        parent::getEntityManager()->persist($gender);
        parent::getEntityManager()->flush();
    }

    /**
     * @param mixed $id
     * @param int|null $lockMode
     * @param int|null $lockVersion
     * @return Gender|null
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }


    /**
     * @param Gender $gender
     */
    public function delete(Gender $gender)
    {
        parent::getEntityManager()->remove($gender);
        parent::getEntityManager()->flush();
    }

    /**
     * @return integer
     */
    public function count()
    {
        $dql = 'SELECT COUNT(g.id) FROM US\Portus\Entity\Person\Gender g';
        $query = parent::getEntityManager()->createQuery($dql);
        return $query->getSingleScalarResult();
    }
}