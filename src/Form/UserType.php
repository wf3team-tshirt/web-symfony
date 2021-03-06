<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\User;
use App\Form\AddressType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array( 'label' => '* Utilisateur',
                                                  'required' => true,
                                                ))
            ->add('lastname', TextType::class, array( 'label' => '* Nom',
                                                  'required' => true,
                                                  ))
            ->add('firstname', TextType::class, array( 'label' => '* Prénom',
                                                  'required' => true,
                                                ))
            ->add('plainpassword', RepeatedType::class, array(
                                                'type' => PasswordType::class,
                                                'first_options' => array( 'label' => '* Mot de passe', 'required' => true ),
                                                'second_options' => array( 'label' => '* Confirmation du mot de passe', 'required' => true ),
                                                ))
            ->add('email', EmailType::class, array( 'label' => '* Email',
                                                    'required' => true,
                                                ))
            ->add('phone', TelType::class, array( 'label' => '* Téléphone',
                                                  'required' => true,
                                                ))
            // Formulaire AddressType
            ->add('addressBillingId', AddressType::class)

            // SUBMIT //
            ->add('submit', SubmitType::class, ['label'=>'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
