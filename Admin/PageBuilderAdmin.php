<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/20/17
 * Time: 13:05
 */

namespace KunicMarko\SimplePageBuilderBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class PageBuilderAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('pageBuilderHasType', 'sonata_type_collection', [
                'by_reference' => false
            ], [
                    'edit' => 'inline',
                    'inline' => 'table',
                    'allow_delete' => true,
                    'sortable' => 'position',
                ]);
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('list');
    }
}
