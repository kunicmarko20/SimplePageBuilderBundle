<?php

namespace KunicMarko\SimplePageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * PageBuilder
 *
 * @ORM\Entity()
 * @ORM\Table(name="simple_page_builder_type")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 *
 */
abstract class AbstractType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="PageBuilderHasType", mappedBy="type", cascade={"persist","remove"})
     **/
    private $pageBuilderHasType;

    public function getPageBuilderHasType()
    {
        return $this->pageBuilderHasType;
    }

    /**
     * @param mixed $pageBuilderHasType
     */
    public function setPageBuilderHasType($pageBuilderHasType)
    {
        $this->pageBuilderHasType = $pageBuilderHasType;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get template file used in frontend
     * @return string
     */
    public function getTemplate() {
        return '';
    }

    /**
     * * Create form field for sonata create/edit form
     * @param FormMapper $formMapper
     * @return void
     */
    abstract public function generateFormField(FormMapper $formMapper);

    /**
     * Returns value of specific type
     * @return mixed
     */
    abstract public function getValue();

    public function __toString()
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }
}
