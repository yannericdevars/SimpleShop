<?php

namespace DW\CommentsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('isActive')
            ->add('date_publish')
            ->add('date_depublish')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DW\CommentsBundle\Entity\Subject'
        ));
    }

    public function getName()
    {
        return 'dw_commentsbundle_subjecttype';
    }
}
