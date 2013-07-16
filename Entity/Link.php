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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Black\Bundle\EngineBundle\Traits\ThingDocumentTrait;
use Black\Bundle\LinkBundle\Model\Link as BaseLink;

/**
 * Category Document
 *
 * @ORM\Entity()
 */
class Link extends BaseLink
{
    use ThingDocumentTrait;

    /**
     * @ORM\Column(name="target", type="string", nullable=true)
     */
    protected $target;

    /**
     * @ORM\Column(name="comment", type="string", nullable=true)
     */
    protected $comment;

    /**
     * @ORM\Column(name="rating", type="string", nullable=true)
     */
    protected $rating;

    /**
     * @ORM\Column(name="image", type="string", nullable=true)
     * @Assert\Image(maxSize="2M")
     */
    protected $image;

    /**
     * @ORM\Column(name="path", type="string", nullable=true)
     */
    protected $path;

    /**
     * @ORM\Column(name="relation", type="string", nullable=true)
     */
    protected $relation;
}
