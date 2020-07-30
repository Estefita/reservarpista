<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomres')
            ->add('nomclub')
            ->add('descripcion')
            ->add('direccion')
            ->add('telefono')
            ->add('web')
            /* ->add('admin1code')
            ->add('admin2code')
            ->add('admin3code') */
            /* ->add('fechacreacion') */
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
