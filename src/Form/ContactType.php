<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, ['label' => 'Votre Nom et Prénom'
            ])
            ->add('email', EmailType::class, ['label' => 'Votre Email'
            ])
            ->add('message', TextareaType::class, ['label' => 'Vos Questions' ,
                'attr' => ['rows' => 7],
            ])
            ->add('submit', submitType::class, ['label' => 'Envoyez vos questions'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
