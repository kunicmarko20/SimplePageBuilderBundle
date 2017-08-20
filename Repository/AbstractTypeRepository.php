<?php

namespace KunicMarko\SimplePageBuilderBundle\Repository;

use Doctrine\ORM\EntityRepository;
use KunicMarko\SimplePageBuilderBundle\Entity\AbstractType;

class AbstractTypeRepository extends EntityRepository
{
    public function removeOrphans()
    {
        $entityManager = $this->getEntityManager();

        $queryBuilder = $entityManager->createQueryBuilder()
            ->select('at')
            ->from(AbstractType::class, 'at')
            ->leftJoin('at.pageBuilderHasType', 'pbht')
            ->where('pbht IS NULL');

        $results = $queryBuilder->getQuery()->getResult();

        foreach ($results as $result) {
            $entityManager->remove($result);
        }

        $entityManager->flush();
    }
}
