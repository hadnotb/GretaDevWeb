<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,['label' => 
            'Saisissez votre Email'])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'mapped'=> false,
                'invalid_message' => 'La confirmation du mot de passe est incorrecte',
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation du mot de passe'),
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 8,
                    'minMessage' => 'Le mot de passe doit comporter au moins 8 caractères']),
                ],))
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ;
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            // "allow_extra_fields" => true
        ]);
    }
}
