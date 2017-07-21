<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/20/17
 * Time: 11:05
 */

namespace KunicMarko\SimplePageBuilderBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class AbstractTypeAdmin extends AbstractAdmin
{
    /** @var  array */
    private $types;

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $object = $this->getSubject();
        $object->generateFormField($formMapper);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubClasses(array $subClasses)
    {
        $newSubClasses = array_merge($subClasses, $this->getTypes());
        parent::setSubClasses($newSubClasses);
    }

    public function setTypes(array $types)
    {
        $this->types = $types;
    }
    public function getTypes()
    {
        return $this->types;
    }
}
