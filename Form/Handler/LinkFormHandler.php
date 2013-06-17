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
use Black\Bundle\LinkBundle\Model\LinkInterface;

class LinkFormHandler
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

    public function process(LinkInterface $link)
    {
        $this->form->setData($link);

        if ('POST' === $this->request->getMethod()) {

            $this->form->bind($this->request);

            if ($this->form->isValid()) {

                $this->setFlash('success', 'success.link.admin.link.edit');

                return true;
            } else {
                $this->setFlash('error', 'error.link.admin.link.form.not.valid');
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