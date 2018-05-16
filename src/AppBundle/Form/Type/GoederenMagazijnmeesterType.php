<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType; // deze zorgt ervoor dat je decimalen in kan vullen.
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//EntiteitType vervangen door b.v. KlantType
class GoederenMagazijnmeesterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('id', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('datum', DateType::class) //naam is b.v. een attribuut of variabele van klant
            ;
        $builder
                ->add('leverancier', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
                  ->add('Ordernummer', EntityType::class, array (
                     'class'=>'AppBundle:Bestelopdracht',
                      'choice_label'=>'bestelordernummer'))
                 ;
        $builder
                   ->add('Artikelnummer', EntityType::class, array (
                        'class'=>'AppBundle:Artikel',
                        'choice_label'=>'omschrijving'))
                          ;

        $builder
           ->add('omschrijving',TextType::class) //naam is b.v. een attribuut of variabele van klant
       ;
    //    $builder->add('CVA', 'text', array('label' => 'form.name','required' => false));
    //array ('label' => 'form.name','required' => false)
        $builder
            ->add('hoeveelheid', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('kwaliteit', TextType::class,array ('required' => false)) //naam is b.v. een attribuut of variabele van klant
        ;
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Goederen', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
