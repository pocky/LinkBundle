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
use Black\Bundle\LinkBundle\Model\Category as BaseCategory;
use Black\Bundle\EngineBundle\Traits\ThingDocument;

/**
 * Category Document
 *
 * @ODM\MappedSuperclass()
 */
class Category extends BaseCategory
{
    use ThingDocument;
}