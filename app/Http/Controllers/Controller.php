<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


$post = [
    [
        [
        "id" => 1,
        "description" => "des",
        "image" => "image.png",
        "created_at" => "01-01-2022",
        ], 
        [
            "id" => 2,
            "description" => "des2",
            "image" => "image2.jpg",
            "created_at" => "02-01-2022",
        ],
        [
            "id" => 3,
            "description" => "des3",
            "image" => "image3.jpg",
            "created_at" => "03-01-2022",
        ]
    ],
    [
        [
        "id" => 4,
        "description" => "des4",
        "image" => "image4.png",
        "created_at" => "04-01-2022",
        ], 
        [
            "id" => 5,
            "description" => "des5",
            "image" => "image5.jpg",
            "created_at" => "05-01-2022",
        ]
    ]
];