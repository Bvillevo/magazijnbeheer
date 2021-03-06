<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType; // deze zorgt ervoor dat je decimalen in kan vullen.
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
//EntiteitType vervangen door b.v. KlantType
class RegistratieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('gebruikersnaam', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('voornaam', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('achternaam', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('wachtwoord', PasswordType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder->add('role', ChoiceType::class, array(
    'choices' => array(
        'Rollen' => array(
            'Inkoper' => 'ROLE_INKOPER',
            'Verkoper' => 'ROLE_VERKOPER',
            'Magazijnmeester' => 'ROLE_MAGAZIJNMEESTER',
            'Expeditie' => 'ROLE_EXPEDITIE',
            'Monteur' => 'ROLE_MONTEUR',
            'Financiën' => 'ROLE_FINANCIEN',

        ),

    ),
));

    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\User', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
