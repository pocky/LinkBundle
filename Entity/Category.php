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

use Black\Bundle\EngineBundle\Traits\ThingEntityTrait;
use Black\Bundle\LinkBundle\Model\Category as BaseCategory;

/**
 * Category Entity
 *
 * @ORM\Entity()
 */
class Category extends BaseCategory
{
    use ThingEntityTrait;
}
