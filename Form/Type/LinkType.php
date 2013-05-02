<?php

/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\LinkBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinkType extends AbstractType
{
    private $class;

    /**
     * @param string $class The Link class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                    'label'         => 'link.admin.form.name'
                ))
            ->add('slug', 'text', array(
                    'label'         => 'link.admin.form.slug',
                    'required'      => false
                ))
            ->add('description', 'textarea', array(
                    'label'         => 'link.admin.form.description',
                    'required'      => false
                ))
            ->add('url', 'url', array(
                    'required'      => false,
                    'label'         => 'link.admin.form.url'
                ))
            ->add('image', 'file', array(
                    'label'         => 'engine.admin.person.form.image',
                    'required'      => false
                ))
            ->add('target', 'choices', array(

                ))
            ->add('comment', 'textarea', array(

                ))
            ->add('rating', 'choices', array(

                ))
            ->add('relation', 'text', array(

                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class'    => $this->class,
                'intention'     => 'link_form'
            ));
    }

    public function getName()
    {
        return 'black_link_link';
    }
}