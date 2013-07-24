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
use Black\Bundle\LinkBundle\Model\Category as BaseCategory;

/**
 * Category Entity
 */
abstract class Category extends BaseCategory
{
    use ThingEntityTrait;
}
