<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Model;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 2/26/14 12:44 AM
 */
interface TreeInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return TreeInterface
     */
    public function setSlug($slug);

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get createdAt.
     *
     * @return \Datetime
     */
    public function getCreatedAt();

    /**
     * Set updatedAt.
     *
     * @param \Datetime $updatedAt
     *
     * @return TreeInterface
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Get updatedAt.
     *
     * @return \Datetime
     */
    public function getUpdatedAt();

    /**
     * Set translations.
     *
     * @param array|TreeTranslationInterface[] $translations
     *
     * @return TreeInterface
     */
    public function setTranslations($translations);

    /**
     * Get translations.
     *
     * @return array|TreeTranslationInterface[]
     */
    public function getTranslations();

    /**
     * Get translation.
     *
     * @param $lang
     *
     * @return null|TreeTranslationInterface
     */
    public function getTranslation($lang);

    /**
     * Add translation.
     *
     * @param TreeTranslationInterface $translation
     */
    public function addTranslation(TreeTranslationInterface $translation);

    /**
     * Remove translation.
     *
     * @param TreeTranslationInterface $translation
     */
    public function removeTranslation(TreeTranslationInterface $translation);
}
