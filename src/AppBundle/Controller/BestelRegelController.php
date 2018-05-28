<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelregel;
use AppBundle\Form\Type\BestelRegelType;

class BestelRegelController extends Controller
{
	
	/**
	 * @Route("inkoper/bestelregel/nieuw/", name="bestelregel")
	 */
	 public function nieuweBestelRegel (Request $request){
		 $nieuweBestelRegel = new Bestelregel ();
		 $form = $this->createForm(BestelRegelType::class, $nieuweBestelRegel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweBestelRegel);
			$em->flush();

    	return $this->redirect ($this->generateUrl("bestelregel"));

		}
		return new Response($this->renderView ('form.html.twig', array('form' => $form->createView())));
	}
}
?>
