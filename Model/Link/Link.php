<?php
/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\LinkBundle\Model\Link;

abstract class Link implements LinkInterface
{
    protected $target;
    protected $comment;
    protected $rating;
    protected $image;
    protected $path;
    protected $relation;

    /**
     * {@inheritdoc}
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * {@inheritdoc}
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * {@inheritdoc}
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRelation()
    {
        return $this->relation;
    }
}