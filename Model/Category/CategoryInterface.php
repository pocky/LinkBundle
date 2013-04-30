<?php
/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\LinkBundle\Model\Category;

interface CategoryInterface
{
    /**
     * @param $name
     *
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getSlug();

    /**
     * @param $description
     *
     * @return mixed
     */
    public function setDescription($description);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param $url
     *
     * @return mixed
     */
    public function setUrl($url);

    /**
     * @return mixed
     */
    public function getUrl();

    /**
     * @param \DateTime $createdAt
     *
     * @return mixed
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @param \DateTime $updatedAt
     *
     * @return mixed
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * @return mixed
     */
    public function getUpdatedAt();
}