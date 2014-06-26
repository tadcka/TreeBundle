<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\NodeType\NodeTypeManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/26/14 10:27 PM
 */
class NodeTypeValidator extends ConstraintValidator
{
    /**
     * @var NodeTypeManager
     */
    private $nodeTypeManager;

    /**
     * Constructor.
     *
     * @param NodeTypeManager $nodeTypeManager
     */
    public function __construct(NodeTypeManager $nodeTypeManager)
    {
        $this->nodeTypeManager = $nodeTypeManager;
    }

    /**
     * Checks if the passed node type is valid.
     *
     * @param NodeInterface $node
     * @param Constraint $constraint
     */
    public function validate($node, Constraint $constraint)
    {
        if ($node->getType() && (false === $this->nodeTypeManager->isValid($node))) {
            $nodeTypeName = $node->getType();
            if (null !== $config = $this->nodeTypeManager->getConfig($node->getType())) {
                $nodeTypeName = $config->getName();
            }
            $this->context->addViolation($constraint->message, array('%node_type%' => $nodeTypeName));
        }
    }
}
