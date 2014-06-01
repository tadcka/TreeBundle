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
use Tadcka\Bundle\TreeBundle\Model\TreeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManager as BaseTreeManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:28 PM
 */
class TreeManager extends BaseTreeManager
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
     * @param EntityManager     $em
     * @param string            $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em         = $em;
        $this->repository = $em->getRepository($class);
        $this->class      = $em->getClassMetadata($class)->name;
    }

    /**
     * {@inheritdoc}
     */
    public function findTreeByRootId($rootId)
    {
        return $this->repository->findOneBy(array('rootId' => $rootId));
    }

    /**
     * {@inheritdoc}
     */
    public function findTreeBySlug($slug)
    {
        return $this->repository->findOneBy(array('slug' => $slug));
    }

    /**
     * {@inheritdoc}
     */
    public function findManyTreeBySlugs(array $slugs)
    {
        return $this->repository->findBy(array('slug' => $slugs));
    }

    /**
     * {@inheritdoc}
     */
    public function findManyTrees($offset = null, $limit = null)
    {
        $qb = $this->repository->createQueryBuilder('t');

        if (null !== $offset) {
            $qb->setFirstResult($offset);
        }

        if (null !== $limit) {
            $qb->getMaxResults($limit);
        }

        $qb->select('t');

        return $qb->getQuery()->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        $qb = $this->repository->createQueryBuilder('t');

        $qb->select('COUNT(t)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * {@inheritdoc}
     */
    public function add(TreeInterface $tree, $save = false)
    {
        $this->em->persist($tree);
        if (true === $save) {
            $this->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function delete(TreeInterface $tree, $save = false)
    {
        $this->em->remove($tree);
        if (true === $save) {
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
