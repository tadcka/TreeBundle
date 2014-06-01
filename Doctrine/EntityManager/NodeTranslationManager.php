<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Doctrine\EntityManager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Tadcka\Bundle\TreeBundle\Model\NodeTranslationInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeTranslationManager as BaseNodeTranslationManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/1/14 8:08 PM
 */
class NodeTranslationManager extends BaseNodeTranslationManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * Constructor.
     *
     * @param EntityManager $em
     * @param string $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($class);
        $this->class = $em->getClassMetadata($class)->name;
    }

    /**
     * {@inheritdoc}
     */
    public function add(NodeTranslationInterface $translation, $save = false)
    {
        $this->em->persist($translation);

        if ($save) {
            $this->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function delete(NodeTranslationInterface $translation, $save = false)
    {
        $this->em->remove($translation);

        if ($save) {
            $this->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->em->clear($this->class);
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->class;
    }
}
