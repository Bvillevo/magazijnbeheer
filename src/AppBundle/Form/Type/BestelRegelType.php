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
class BestelRegelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
       // $builder
       //            ->add('artikelnr', EntityType::class, array (
       //               'class'=>'AppBundle:Artikel',
       //                'choice_label'=>'artikelnr'))
       //  ;
       // $builder
       //            ->add('Bestelling', EntityType::class, array (
       //               'class'=>'AppBundle:Bestelopdracht',
       //                'choice_label'=>'bestelordernummer'))
       //  ;
         $builder
                ->add('artikel', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
         $builder
                ->add('bestelling', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
                ->add('hoeveelheid', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        //zie
        //http://symfony.com/doc/current/forms.html#built-in-field-types
        //voor meer typen invoer

    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Bestelregel', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
