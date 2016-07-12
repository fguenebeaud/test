<?php
namespace Potogan\TestBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserConferenceType
 * @package Potogan\TestBundle\Entity
 */
class UserConferenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                'text',
                array(
                    'label' => 'Pseudonyme',
                    'required' => true,
                )
            )
            ->add(
                'firstname',
                'text',
                array(
                    'label' => 'Prénom',
                    'required' => true,
                )
            )
            ->add(
                'lastname',
                'text',
                array(
                    'label' => 'Nom',
                    'required' => true,
                )
            )
            ->add(
                'mobile',
                'text',
                array(
                    'label' => 'Téléphone Mobile',
                    'required' => false,
                    'attr' => array(
                        'placeholder' => '+33 x xx xx xx xx',
                    ),
                )
            )
            ->add(
                'email',
                'text',
                array(
                    'label' => 'eMail',
                    'required' => true,
                )
            )
            ->add(
                'twitter',
                'text',
                array(
                    'label' => 'Twitter',
                    'required' => false,
                )
            )
            ->add(
                'facebook',
                'text',
                array(
                    'label' => 'Facebook',
                    'required' => false,
                )
            )
            ->add('avatar', FileType::class, array('label' => 'Avatar du profil', 'required' => false));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Potogan\TestBundle\Entity\UserConference',
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'user_conference';
    }
}
