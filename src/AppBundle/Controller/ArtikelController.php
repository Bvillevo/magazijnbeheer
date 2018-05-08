<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;

class ArtikelController extends Controller
{
/**
	 * @Route("/artikel/nieuw", name="artikelNieuw")
	 */
	 public function nieuweArtikel (Request $request){
		 $nieuweArtikel = new Artikel ();
		 $form = $this->createForm(ArtikelType::class, $nieuweArtikel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweArtikel);
			$em->flush();

    	return $this->redirect ($this->generateUrl("artikelNieuw"));

		}
return new Response($this->render('form.html.twig', array('form' => $form->createView())));
 }
}
?>
