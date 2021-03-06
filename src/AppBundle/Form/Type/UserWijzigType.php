<?php
// src/AppBundle/Form/Type/UserType.php
namespace AppBundle\Form\Type;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserWijzigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('voornaam', TextType::class,array ('required' => false))
            // ->add('achternaam', TextType::class,array ('required' => false))
            // ->add('username', TextType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password')
            ))
        //     ->add('roles', ChoiceType::class, [
        //         'multiple' => true,
        //         'expanded' => true, // render check-boxes
        //         'choices' => [
        //              'Admin' => 'ROLE_ADMIN',
        //              'Inkoper' => 'ROLE_INKOPER',
        //              'Magazijnmeester' => 'ROLE_MAGAZIJNMEESTER',
        //              'Expeditie' => 'ROLE_EXPEDITIE',
        //              'Monteur' => 'ROLE_MONTEUR',
        //              'Financiën' => 'ROLE_FIANCIEN',
        //              'Verkoper' => 'ROLE_VERKOPER',
        //             ],
        //         ])
         ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}
