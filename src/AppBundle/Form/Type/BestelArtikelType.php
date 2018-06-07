<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

//EntiteitType vervangen door b.v. KlantType
class BestelArtikelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('omschrijving', EntityType::class, array (
             'class'=>'AppBundle:Artikel',
              'choice_label'=>'omschrijving'))
         ;
         $builder
           ->add('bestellingid', EntityType::class, array (
              'class'=>'AppBundle:Bestelopdracht',
               'choice_label'=>'leverancier'))
          ;
          $builder
                      ->add('ontvangstdatum', DateType::class) //naam is b.v. een attribuut of variabele van klant
          ;
         $builder
             ->add('hoeveelheid', IntegerType::class)
             ;


    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Bestelregel', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
