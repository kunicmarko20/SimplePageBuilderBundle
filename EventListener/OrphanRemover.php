<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 8/19/17
 * Time: 9:42 PM
 */

namespace KunicMarko\SimplePageBuilderBundle\EventListener;

use Doctrine\ORM\EntityManager;
use KunicMarko\SimplePageBuilderBundle\Entity\AbstractType;
use Sonata\AdminBundle\Event\PersistenceEvent;

class OrphanRemover
{
    private $abstractTypeRepository;

    public function __construct(EntityManager $entityManager)
    {
        $this->abstractTypeRepository = $entityManager->getRepository(AbstractType::class);
    }

    /**
     * @param PersistenceEvent $event
     */
    public function onPersistUpdateRemove(PersistenceEvent $event)
    {
        $object = $event->getObject();
        if (!$object instanceof AbstractType) {
            $this->abstractTypeRepository->removeOrphans();
        }
    }
}
