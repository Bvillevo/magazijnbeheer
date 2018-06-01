<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Form\Type\RegistratieType;

class RegistratieController extends Controller
{
     /**
		 * @Route("/admin/registratie", name="registratie")
		 */
	   public function registratie (Request $request){
		 $nieuweGebruiker = new User ();
		 $form = $this->createForm(RegistratieType::class, $nieuweGebruiker);

		 $form->handleRequest($request);
		 if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweGebruiker);
			$em->flush();
    	return $this->redirect ($this->generateUrl("registratie"));

		}
		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
    }
 			/**
 				 * @Route("admin/alle/gebruikers", name="allegebruikers")
 				 */

 				//functie show alle gebruikers
 			public function alleGebruikers (Request $request){
 				$users = $this->getDoctrine()->GetRepository("AppBundle:User")->findAll();


        return new Response($this->renderView ('Registratie/registratie.html.twig', array ('users'=>$users)));
      }
}
?>
