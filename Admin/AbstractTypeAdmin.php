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
use Sonata\AdminBundle\Route\RouteCollection;

class AbstractTypeAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $object = $this->getSubject();
        $object->generateFormField($formMapper);
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('list');
    }
}
