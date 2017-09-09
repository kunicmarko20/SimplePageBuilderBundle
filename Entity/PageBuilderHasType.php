<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/28/17
 * Time: 10:02.
 */

namespace KunicMarko\SimplePageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageBuilder.
 *
 * @ORM\Entity()
 * @ORM\Table(name="simple_page_builder_has_type")
 */
class PageBuilderHasType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="PageBuilder", inversedBy="pageBuilderHasType")
     */
    private $pageBuilder;

    /**
     * @ORM\OneToOne(targetEntity="AbstractType", inversedBy="pageBuilderHasType", orphanRemoval=true)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPageBuilder()
    {
        return $this->pageBuilder;
    }

    /**
     * @param mixed $pageBuilder
     */
    public function setPageBuilder($pageBuilder)
    {
        $this->pageBuilder = $pageBuilder;
    }
}
