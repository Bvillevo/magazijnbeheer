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
            ->add('email', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('wachtwoord', PasswordType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('rol', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Gebruiker', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
