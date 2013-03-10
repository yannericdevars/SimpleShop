<?php

namespace DW\CommentsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('isActive')
            ->add('date_create')
            ->add('subject')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DW\CommentsBundle\Entity\Response'
        ));
    }

    public function getName()
    {
        return 'dw_commentsbundle_responsetype';
    }
}
