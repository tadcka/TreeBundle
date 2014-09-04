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
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManager as BaseNodeManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 11:08 PM
 */
class NodeManager extends BaseNodeManager
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
    public function findNode($nodeId)
    {
        return $this->repository->find($nodeId);
    }

    /**
     * {@inheritdoc}
     */
    public function findRoot($rootId)
    {
        return $this->repository->findOneBy(array('root' => $rootId));
    }

    /**
     * {@inheritdoc}
     */
    public function findNodesByType($type)
    {
        return $this->repository->findBy(array('type' => $type));
    }

    /**
     * {@inheritdoc}
     */
    public function findRoots(array $rootIds)
    {
        $qb = $this->repository->createQueryBuilder('n');

        $qb->innerJoin('n.translations', 'trans');

        $qb->where($qb->expr()->in('n.root', ':root_ids'))
            ->setParameter('root_ids', $rootIds);

        $qb->select('n, trans');

        return $qb->getQuery()->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findExistingNodeTypes($root)
    {
        $qb = $this->repository->createQueryBuilder('n');

        $qb->andWhere($qb->expr()->eq('n.root', ':root'))
            ->setParameter('root', $root);
        $qb->andWhere($qb->expr()->isNotNull('n.type'));

        $qb->select('DISTINCT n.type');

        $result = array();
        foreach ($qb->getQuery()->getResult() as $row) {
            $result[] = $row['type'];
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function add(NodeInterface $node, $save = false)
    {
        $this->em->persist($node);
        if (true === $save) {
            $this->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function delete(NodeInterface $node, $save = false)
    {
        $this->recursiveDelete($node);
//        if (true === $save) {
//            $this->save();
//        }
    }

    /**
     * Recursive delete node children.
     *
     * @param NodeInterface $node
     */
    private function recursiveDelete(NodeInterface $node)
    {
        foreach ($node->getChildren() as $child) {
            $this->recursiveDelete($child);
        }
        $this->repository->removeFromTree($node);
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
