<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/20/17
 * Time: 11:05.
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

    /**
     * {@inheritdoc}
     */
    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if (in_array($action, ['tree', 'show', 'edit', 'delete', 'list', 'batch'])) {
            $list['create'] = [
                'template' => 'SimplePageBuilderBundle:Button:abstract_type_create_button.html.twig',
            ];
        }

        return $list;
    }
}
