## Configure the TadckaTreeBundle

```yml
tadcka_tree:
    db_driver: orm
    class:
        model:
            tree: Tadcka\Bundle\AcmeBundle\Entity\Tree
            node: Tadcka\Bundle\AcmeBundle\Entity\TreeNode
            node_translation: Tadcka\Bundle\AcmeBundle\Entity\TreeNodeTranslation
```