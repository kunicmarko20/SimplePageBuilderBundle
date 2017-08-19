<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/20/17
 * Time: 13:01
 */

namespace KunicMarko\SimplePageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PageBuilder
 *
 * @ORM\Entity()
 * @ORM\Table(name="simple_page_builder")
 *
 */
class PageBuilder
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
     * @ORM\OneToMany(
     *     targetEntity="PageBuilderHasType",
     *     mappedBy="pageBuilder",
     *     cascade={"persist","remove"},
     *     orphanRemoval=true
     * )
     * @ORM\OrderBy(value={"position" = "ASC"})
     **/
    private $pageBuilderHasType;

    public function __construct()
    {
        $this->pageBuilderHasType = new ArrayCollection();
    }

    public function addPageBuilderHasType(PageBuilderHasType $pb)
    {
        $pb->setPageBuilder($this);
        $this->pageBuilderHasType->add($pb) ;
    }

    public function removePageBuilderHasType(PageBuilderHasType $pb)
    {
        $this->pageBuilderHasType->removeElement($pb);
    }

    public function getPageBuilderHasType()
    {
        return $this->pageBuilderHasType;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
