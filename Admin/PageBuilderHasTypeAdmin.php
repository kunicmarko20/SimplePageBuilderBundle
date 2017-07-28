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

class PageBuilderHasTypeAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $entity = $this->getSubject();
        $formMapper
            ->add('type', 'sonata_type_model_list', [
                'btn_list' => false,
                'btn_delete' => false,
                'btn_add' => $entity !== null && $entity->getType() === null ? 'Add' : 'Edit'
            ])
            ->add('position', HiddenType::class, array(
                'attr' => array("hidden" => true)
            ))
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('list');
    }
}
