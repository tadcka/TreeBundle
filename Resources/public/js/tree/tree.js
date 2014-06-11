$(document).ready(function() {
    $('#tadcka_jstree').jstree({
        "core" : {
            "animation" : 0,
            "check_callback" : true,
            "themes" : { "stripes" : true },
            'data' : {
                'url' : function (node) {
                    return node.id === '#' ?
                        Routing.generate('tadcka_tree_node_root', {rootId: $('#tadcka_jstree').data('root_id')}) : Routing.generate('tadcka_tree_node', {id: node.id });
                }
//                ,
//                'data' : function (node) {
//                    return { 'id' : node.id };
//                }
            }
        },
        "plugins" : [
            "contextmenu", "dnd", "search",
            "state", "types", "wholerow"
        ],
        "contextmenu": {
            "items": function ($node) {

                return {
                    "create": {
                        "label": "Create",
                        "action": function (obj) {
                            $.ajax({
                                url: Routing.generate('tadcka_tree_create_node', {id: $node.id}),
                                type: 'GET',
                                success: function ($response) {
                                    $('.tadcka_tree_edit_content').html($response);
                                }
                            });
                        }
                    },
                    "rename": {
                        "label": "Rename",
                        "action": function (obj) {
                            this.rename(obj);
                        }
                    },
                    "delete": {
                        "label": "Delete",
                        "action": function (obj) {
                            console.log('esu');
                            this.remove(obj);
                        }
                    }
                };
            }
        }
    })
    .bind("create.jstree", function (e, data) {
            console.log('Esassadasd');

    });
});
