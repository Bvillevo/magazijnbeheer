<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, AuthorizationCheckerInterface $authorizationChecker)
    {
        if ($authorizationChecker->isGranted(new Expression('"ROLE_INKOPER" in roles')))
        {
            return $this->redirectToRoute('homepageInkoper');
        }
        else if ($authorizationChecker->isGranted(new Expression('"ROLE_MAGAZIJNMEESTER" in roles')))
        {
            return $this->redirectToRoute('homepageMagazijnmeester');
        }
        else if ($authorizationChecker->isGranted(new Expression('"ROLE_VERKOPER" in roles')))
        {
            return $this->redirectToRoute('homgepageVerkoper');
        }
        else if ($authorizationChecker->isGranted(new Expression('"ROLE_ADMIN" in roles')))
        {
            return $this->redirectToRoute('homepageAdmin');
        }
        else
        {
            return $this->render('default/index.html.twig');
        }

        
}
