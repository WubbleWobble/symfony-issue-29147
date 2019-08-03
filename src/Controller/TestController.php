<?php

namespace App\Controller;

use App\Form\Type\TestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function test(Request $request)
    {
        $form = $this->createForm(TestType::class);

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->handleRequest($request);
        }

        // N.B. Simply doing this does *not* trigger the problem...
        // $form->get('date')->addError(new FormError('This is a form error'));

        return [
            'form' => $form->createView(),
        ];
    }
}