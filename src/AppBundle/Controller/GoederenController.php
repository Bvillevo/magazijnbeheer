<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Goederen;
use AppBundle\Form\Type\GoederenMagazijnmeesterType;

class GoederenController extends Controller
{
/**
		 * @Route("/goederen/nieuw", name="goederenNieuw")
		 */
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
		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
}
}
?>
