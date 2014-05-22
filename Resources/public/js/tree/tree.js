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
//        "types" : {
//            "#" : {
//                "max_children" : 1,
//                "max_depth" : 4,
//                "valid_children" : ["root"]
//            },
//            "root" : {
//                "icon" : "/static/3.0.0-beta10/assets/images/tree_icon.png",
//                "valid_children" : ["default"]
//            },
//            "default" : {
//                "valid_children" : ["default","file"]
//            },
//            "file" : {
//                "icon" : "glyphicon glyphicon-file",
//                "valid_children" : []
//            }
//        },
        "plugins" : [
            "contextmenu", "dnd", "search",
            "state", "types", "wholerow"
        ]
    });
});
