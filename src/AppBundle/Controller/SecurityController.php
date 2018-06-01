<?php
// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request)
    {
          	$session = $request->getSession();

		    // get the login error if there is one
		    if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
		        $error = $request->attributes->get(
		            SecurityContextInterface::AUTHENTICATION_ERROR
		        );
		    } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
		        $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
		        $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
		    } else {
		        $error = null;
		    }

		    // last username entered by the user
		    $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

		    return $this->render(
		        'security/login.html.twig',
		        array(
		            // last username entered by the user
		            'last_username' => $lastUsername,
		            'error'         => $error,
		        )
		    );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
    }
}
?>