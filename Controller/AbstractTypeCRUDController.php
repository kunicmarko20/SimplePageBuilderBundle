<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/28/17
 * Time: 13:55
 */

namespace KunicMarko\SimplePageBuilderBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Sonata\AdminBundle\Controller\CRUDController;

class AbstractTypeCRUDController extends CRUDController
{

    /**
     *
     * Instead to show list of this kind of entities after update go to parent Blog entity
     * Redirect the user depend on this choice.
     *
     * @param object $object
     *
     * @return RedirectResponse
     */
    protected function redirectTo($object)
    {
        $pageBuilder = $object->getPageBuilderHasType()->getPageBuilder();


        $url = $this->generateUrl(
            'admin_kunicmarko_simplepagebuilder_pagebuilder_edit',
            array('id' => $pageBuilder->getId())
        );

        return new RedirectResponse($url);
    }
}