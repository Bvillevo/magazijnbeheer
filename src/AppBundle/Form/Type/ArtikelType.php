<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType; // deze zorgt ervoor dat je decimalen in kan vullen.

//EntiteitType vervangen door b.v. KlantType
class ArtikelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('artikelnr', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('omschrijving', TextType::class) //naam is b.v. een attribuut of variabele van klant
            ;
        $builder
                ->add('TechnischeSpecificaties', TextType::class,array ('required' => false)) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
                ->add('magazijnlocatie', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
           ->add('inkoopprijs', MoneyType::class) //naam is b.v. een attribuut of variabele van klant
       ;

    //    $builder->add('Inkoopprijs', MoneyType::class, array(
  //    'divisor' => 100,))
///;
        $builder
           ->add('CVA',IntegerType::class,array ('required' => false) ) //naam is b.v. een attribuut of variabele van klant
       ;
    //    $builder->add('CVA', 'text', array('label' => 'form.name','required' => false));
    //array ('label' => 'form.name','required' => false)
        $builder
            ->add('minimumVoorraad', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('voorraadInAantal', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('bestelserie', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Artikel', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
