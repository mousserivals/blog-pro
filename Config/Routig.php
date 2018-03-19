<?php

namespace Config;

class Routig {

    public static function routes() {
        return [":sorti-entre-amis" =>
                    ["path" => "/blog/view/:slug",
                        "parameter" => ["slug" => "[\w]+"],
                        "controller" => "blog",
                        "action" => "index"
                    ],
            "au-cinema" =>
                ["path" => "/cinema",
                    "parameter" => "",
                    "controller" => "blog",
                    "action" => "cinema"
                ],
            "sorties-cinema-de-la-semaine/jour-07-3-2018" =>
                ["path" => "/cinema/:date",
                    "parameter" => "jour-^(0[1-9]|[1-2][0-9]|3[0-1])-([1-9]|1[0-2])-[0-9]{4}$/", "sorties-cinema-de-la-semaine/jour-07-3-2018",
                    "controller" => "blog",
                    "action" => "jour"
                ],
            "blogAdd" =>
            ["path" => "admin/blog/add",
                "parameter" => "",
                "controller" => "blog",
                "action" => "add"
            ],
            "blogupdate" =>
            ["path" => "admin/blog/update/:id",
                "parameter" => ["id" => "[\d]+"],
                "controller" => "",
                "action" => ""
            ],
            "admin/blog/1-20" =>
            ["path" => "admin/blog/:first-:last",
                "parameter" => ["first" => "[\d]+", "last" => "[\d]+"],
                "controller" => "blog",
                "action" => "index"
            ],
        ];
    }

}
