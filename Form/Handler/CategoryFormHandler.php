<?php

/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\LinkBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Black\Bundle\LinkBundle\Model\Category\CategoryInterface;

class CategoryFormHandler
{
    protected $request;
    protected $form;
    protected $factory;
    protected $session;
    protected $manager;

    public function __construct(FormInterface $form, Request $request, SessionInterface $session, ManagerRegistry $manager)
    {
        $this->form     = $form;
        $this->request  = $request;
        $this->session  = $session;
        $this->manager  = $manager->getManager();
    }

    public function process(CategoryInterface $category)
    {
        $this->form->setData($category);

        if ('POST' === $this->request->getMethod()) {

            $this->form->bind($this->request);

            if ($this->form->isValid()) {

                $this->setFlash('success', $category->getName() . ' was successfully updated!');

                return true;
            } else {
                $this->setFlash('failure', 'The form is not valid');
            }
        }
    }

    public function getForm()
    {
        return $this->form;
    }

    protected function setFlash($name, $msg)
    {
        return $this->session->getFlashBag()->add($name, $msg);
    }
}