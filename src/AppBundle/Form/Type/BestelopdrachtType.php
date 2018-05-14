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

//EntiteitType vervangen door b.v. KlantType
class BestelopdrachtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('leverancier', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('bestelordernummer', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
            ;
      //  $builder
      //          ->add('artikelnr', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
      //  ;
      $builder
          ->add('artikelnr', EntityType::class, array (
            'class'=>'AppBundle:Artikel',
            'choice_label'=>'omschrijving',)
          );

        $builder
                ->add('hoeveelheid', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
           ->add('bestelregels', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
       ;
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Bestelopdracht', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
