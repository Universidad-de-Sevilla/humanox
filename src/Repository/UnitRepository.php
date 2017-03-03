<?php

namespace US\Humanox\Repository;

use Doctrine\ORM\EntityRepository;
use US\Humanox\Entity\Unit\Unit;

/**
 * Class UnitRepository
 */
class UnitRepository extends EntityRepository
{
    /**
     * @param array $criteria
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return Unit[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return parent::findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Guarda una unita en la base de datos
     * @param Unit $unit
     */
    public function save(Unit $unit)
    {
        parent::getEntityManager()->persist($unit);
        parent::getEntityManager()->flush();
    }

    /**
     * @param int $id
     * @param int|null $lockMode
     * @param int|null $lockVersion
     * @return Unit|null
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }


    /**
     * @param Unit $unit
     */
    public function delete(Unit $unit)
    {
        parent::getEntityManager()->remove($unit);
        parent::getEntityManager()->flush();
    }

    /**
     * Cuenta el número de unitas existente.
     *
     * @return integer Número total de unitas.
     */
    public function count()
    {
        $dql = 'SELECT COUNT(u.id) FROM US\Humanox\Entity\Unit\Unit u';
        $query = parent::getEntityManager()->createQuery($dql);
        return $query->getSingleScalarResult();
    }
}