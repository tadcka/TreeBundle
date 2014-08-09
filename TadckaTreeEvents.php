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
    /**
     * Tree node pre create event.
     */
    const NODE_PRE_CREATE = 'tadcka_tree.node.pre_create';

    /**
     * Tree node create success event.
     */
    const NODE_CREATE_SUCCESS = 'tadcka_tree.node.create.success';

    /**
     * Tree node edit success event.
     */
    const NODE_EDIT_SUCCESS = 'tadcka_tree.node.edit.success';

    /**
     * Tree node pre delete event.
     */
    const NODE_PRE_DELETE = 'tadcka_tree.node.pre_delete';

    /**
     * Tree node delete success event.
     */
    const NODE_DELETE_SUCCESS = 'tadcka_tree.node.delete.success';
}
