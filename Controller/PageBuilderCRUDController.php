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

class PageBuilderCRUDController extends CRUDController
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
        $request = $this->getRequest();

        $url = $this->generateUrl(
            'sonata_admin_dashboard'
        );

        if (null !== $request->get('btn_update_and_edit')) {
            $url = $this->admin->generateObjectUrl('edit', $object);
        }
        return new RedirectResponse($url);
    }
}
