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

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * Config repository.
 */
class CategoryRepository extends DocumentRepository
{
    private function getQueryBuilder()
    {
        return $this->createQueryBuilder();
    }
}