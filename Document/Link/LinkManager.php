<?php

/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\LinkBundle\Document\Link;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;

class LinkManager extends DocumentManager
{
    protected $dm;
    protected $repository;
    protected $class;
    protected $properties = array();

    /**
     * Constructor
     *
     * @param \Doctrine\ODM\MongoDB\DocumentManager $dm
     * @param \Doctrine\ODM\MongoDB\Configuration $class
     */
    public function __construct(DocumentManager $dm, $class)
    {
        $this->dm          = $dm;
        $this->repository  = $dm->getRepository($class);

        $metadata          = $dm->getClassMetadata($class);
        $this->class       = $metadata->name;
    }

    /**
     * Return the document manager
     *
     * @return \Doctrine\ODM\MongoDB\DocumentManager
     */
    public function getDocumentManager()
    {
        return $this->_dm;
    }

    public function persist($document)
    {
        if (!is_object($document)) {
            throw new \InvalidArgumentException(gettype($document));
        }

        $this->dm->persist($document);
    }

    public function flush()
    {
        $this->dm->flush();
    }

    public function remove($document)
    {
        if (!is_object($document)) {
            throw new \InvalidArgumentException(gettype($document));
        }

        $this->dm->remove($document);
    }

    public function getDocumentRepository()
    {
        return $this->repository;
    }

    /**
     * Create a new Config Object
     *
     * @return $config object
     */
    public function createLink()
    {
        $class  = $this->getClass();
        $config = new $class;

        return $config;
    }

    protected function getClass()
    {
        return $this->class;
    }
}