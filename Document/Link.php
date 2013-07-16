<?php
/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\LinkBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Black\Bundle\EngineBundle\Traits\ThingDocumentTrait;
use Black\Bundle\LinkBundle\Model\Link as BaseLink;

/**
 * Category Document
 *
 * @ODM\MappedSuperclass()
 */
abstract class Link extends BaseLink
{
    use ThingDocumentTrait;

    /**
     * @ODM\String
     */
    protected $target;

    /**
     * @ODM\String
     */
    protected $comment;

    /**
     * @ODM\String
     */
    protected $rating;

    /**
     * @ODM\String
     * @Assert\Image(maxSize="2M")
     */
    protected $image;

    /**
     * @ODM\String
     */
    protected $path;

    /**
     * @ODM\String
     */
    protected $relation;
}
