$(document).ready(function () {
    $('#tadcka_jstree').jstree({
        "core": {
            "animation": 0,
            "check_callback": true,
            "themes": { "stripes": true },
            'data': {
                'url': function (node) {
                    return node.id === '#' ?
                        Routing.generate('tadcka_tree_node_root', {rootId: $('#tadcka_jstree').data('root_id')}) : Routing.generate('tadcka_tree_node', {id: node.id });
                }
            }
        },
        "plugins": [
            "contextmenu", "dnd", "search",
            "state", "types", "wholerow"
        ],
        "contextmenu": {
            "items": function ($node) {

                return {
                    "create": {
                        "label": "Create",
                        "action": function (obj) {
                            var $content = $('.tadcka_tree_edit_content');

                            $.ajax({
                                url: Routing.generate('tadcka_tree_create_node', {id: $node.id}),
                                type: 'GET',
                                success: function ($response) {
                                    $content.html($response);
                                    tadckaTreeNodeCreateEdit();
                                },
                                error: function (request, status, error) {
                                    $content.html(request.responseText);
                                }
                            });
                        }
                    },
                    "rename": {
                        "label": "Edit",
                        "action": function (obj) {
                            var $content = $('.tadcka_tree_edit_content');

                            $.ajax({
                                url: Routing.generate('tadcka_tree_edit_node', {id: $node.id}),
                                type: 'GET',
                                success: function ($response) {
                                    $content.html($response);
                                    tadckaTreeNodeCreateEdit();
                                },
                                error: function (request, status, error) {
                                    $content.html(request.responseText);
                                }
                            });
                        }
                    },
                    "delete": {
                        "label": "Delete",
                        "action": function (obj) {
                            var $content = $('.tadcka_tree_edit_content');

                            $.ajax({
                                url: Routing.generate('tadcka_tree_delete_node', {id: $node.id}),
                                type: 'GET',
                                success: function ($response) {
                                    $content.html($response);

                                    $('a#tadcka-tree-node-delete-confirm').click(function (e) {
                                        e.preventDefault();
                                        var $button = $(this);
                                        $.ajax({
                                            url: $button.attr('href'),
                                            type: 'DELETE',
                                            success: function ($response) {
                                                $content.html($response);
                                            },
                                            error: function (request, status, error) {
                                                $content.html(request.responseText);
                                            }
                                        });
                                    });

                                    $('a#tadcka-tree-node-delete-cancel').click(function () {
                                        $content.html('');
                                    });
                                },
                                error: function (request, status, error) {
                                    $content.html(request.responseText);
                                }
                            });
                        }
                    }
                };
            }
        }
    });
});

function tadckaTreeNodeCreateEdit() {
    $('button#tadcka_node_submit').click(function (e) {
        e.preventDefault();

        var $form = $(this).closest('form');

        var $content = $('.tadcka_tree_edit_content');
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            success: function ($response) {
                $content.html($response);
                tadckaTreeNodeCreateEdit();
            },
            error: function (request, status, error) {
                $content.html(request.responseText);
            }
        });
    });
}
