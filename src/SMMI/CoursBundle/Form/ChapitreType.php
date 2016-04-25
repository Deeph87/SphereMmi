<?php

namespace SMMI\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use SMMI\QuizzBundle\Form\QuizzType;
use SMMI\QuizzBundle\Form\QuestionsType;
use SMMI\QuizzBundle\Form\ReponsesType;

class ChapitreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',     'text')
            ->add('content',   'textarea')
            /*->add('quizz',   new QuizzType())
            ->add('questions', new QuestionsType())
            ->add('reponses', new ReponsesType)*/
            /*->add('quizz', CollectionType::class, array(
                'entry_type'     => new QuizzType()
                //'allow_add'      => true,
                //'allow_delete'   => true
            ))*/
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SMMI\CoursBundle\Entity\Chapitre'
        ));
    }

    public function getName()
    {
        return 'smmi_coursbundle_chapitre';
    }
}
