<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 7/23/14 11:28 PM
 */
class TadckaTreeEvents
{
    const NODE_PRE_CREATE = 'tadcka_tree.node.pre_create';

    const NODE_CREATE_SUCCESS = 'tadcka_tree.node.create.success';

    const NODE_EDIT_SUCCESS = 'tadcka_tree.node.edit.success';

    const NODE_DELETE_SUCCESS = 'tadcka_tree.node.delete.success';
}
