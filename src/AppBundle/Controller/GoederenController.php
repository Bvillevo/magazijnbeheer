<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Goederen;
use AppBundle\Form\Type\GoederenMagazijnmeesterType;
use AppBundle\Form\Type\GoederenInkoperType;

class GoederenController extends Controller
{
		 /**
		 * @Route("/goederen/nieuw", name="goederenNieuw")
		 */
		 // functie om nieuwe goederen te maken
	 public function nieuweGoederen (Request $request){
		 $nieuweGoederen = new Goederen ();
		 $form = $this->createForm(GoederenMagazijnmeesterType::class, $nieuweGoederen);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweGoederen);
			$em->flush();
    	return $this->redirect ($this->generateUrl("goederenNieuw"));

		}
		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
}
/**
	 * @Route("/inkoper/alle/goederen/", name="alleInkopergoederen")
	 */
	 // functie om alle goederen op te halen voor de rol inkoper
public function allegoederenInkoper (Request $request){
	$goederen = $this->getDoctrine()->GetRepository("AppBundle:Goederen")->findBy([], ['datum' => 'DESC']);

	return new Response($this->renderView ('Goederen/goederen.html.twig', array ('goederen'=>$goederen)));
}
/**
	 * @Route("/magazijnmeester/alle/goederen/", name="allegoederenMagazijnmeester")
	 */
	 // functie alle goederen ophalen voor magazijnmeester
public function allegoederenMagazijnmeester (Request $request){
	$goederen = $this->getDoctrine()->GetRepository("AppBundle:Goederen")->findBy([], ['datum' => 'DESC']);

	return new Response($this->renderView ('Goederen/goederen.html.twig', array ('goederen'=>$goederen)));
}
}
?>
