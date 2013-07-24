<?php
/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\LinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

use Black\Bundle\CommonBundle\Traits\ThingEntityTrait;
use Black\Bundle\LinkBundle\Model\Link as BaseLink;

/**
 * Category Document
 */
abstract class Link extends BaseLink
{
    use ThingEntityTrait;

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
