<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/20/17
 * Time: 13:01
 */

namespace KunicMarko\SimplePageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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

    public function getId()
    {
        return $this->id;
    }


    /**
     * @ORM\OneToOne(targetEntity="AbstractType", inversedBy="pageBuilder")
     */
    private $type;

    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
