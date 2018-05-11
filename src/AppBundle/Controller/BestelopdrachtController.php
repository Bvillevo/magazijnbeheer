<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelopdracht;
use AppBundle\Form\Type\BestelopdrachtType;

class BestelopdrachtController extends Controller
{
/**
	 * @Route("/bestelopdracht/nieuw", name="bestelopdrachtNieuw")
	 */
	 public function nieuweBestelopdracht (Request $request){
		 $nieuweBestelopdracht = new Bestelopdracht ();
		 $form = $this->createForm(BestelopdrachtType::class, $nieuweBestelopdracht);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
				$em->persist($nieuweBestelopdracht);
			$em->flush();

    	return $this->redirect ($this->generateUrl("bestelopdrachtNieuw"));

		}
		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
 }
}
?>
