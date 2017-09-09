<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/20/17
 * Time: 09:30.
 */

namespace KunicMarko\SimplePageBuilderBundle\EventListener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use KunicMarko\SimplePageBuilderBundle\Entity\AbstractType;

class DiscriminatorMapListener
{
    /**
     * List of types defined in config file.
     *
     * @var array
     */
    protected $types;

    public function __construct(array $types)
    {
        $this->types = $types;
    }

    /**
     * Updates discrimantor map with new types.
     *
     * @param LoadClassMetadataEventArgs $event
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $event)
    {
        $metadata = $event->getClassMetadata();
        $class = $metadata->getReflectionClass();

        if ($class === null || $class->getName() !== AbstractType::class) {
            return;
        }

        $metadata->setDiscriminatorMap($this->types);
    }
}
