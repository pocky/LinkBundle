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

use Doctrine\ORM\EntityRepository;

/**
 * Config repository.
 */
class CategoryRepository extends EntityRepository
{
    protected function getQueryBuilder($alias = 'c')
    {
        return $this->createQueryBuilder($alias);
    }
}