<?php

namespace App\Form;

use App\Entity\Review;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('nickname', TextType::class,['label' =>'Votre Pseudo'])
            ->add('content',TextType::class,['label' =>'Votre Commentaire'])
            ->add('grade',  ChoiceType::class,[
                'label' => 'Votre note',
                'choices' => [
                    '1' =>  1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5 ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
