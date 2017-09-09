<?php
/**
 * Created by PhpStorm.
 * User: Marko Kunic
 * Date: 7/28/17
 * Time: 13:55.
 */

namespace KunicMarko\SimplePageBuilderBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as BaseCRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CRUDController extends BaseCRUDController
{
    /**
     * Because we removed list, redirect to dashboard if user even comes to this part.
     *
     * @param object $object
     *
     * @return RedirectResponse
     */
    protected function redirectTo($object)
    {
        $request = $this->getRequest();

        if ($request->getMethod() === 'DELETE') {
            $url = $this->generateUrl('sonata_admin_dashboard');

            return new RedirectResponse($url);
        }

        return parent::redirectTo($object);
    }
}
