<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const ITEM = [
        'cat' => [
            [
                'id' => 1,
                'name' => 'cat1',
                'price' => 100,
                'image_path' => '/images/cat1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'cat2',
                'price' => 200,
                'image_path' => '/images/cat2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'cat3',
                'price' => 200,
                'image_path' => '/images/cat3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'cat4',
                'price' => 200,
                'image_path' => '/images/cat4.jpg',
            ],
            [
                'id' => 5,
                'name' => 'cat5',
                'price' => 200,
                'image_path' => '/images/cat5.jpg',
            ],
            [
                'id' => 6,
                'name' => 'cat6',
                'price' => 200,
                'image_path' => '/images/cat6.jpg',
            ],
            [
                'id' => 7,
                'name' => 'cat7',
                'price' => 200,
                'image_path' => '/images/cat7.jpg',
            ],
            [
                'id' => 8,
                'name' => 'cat8',
                'price' => 200,
                'image_path' => '/images/cat8.jpg',
            ],
            [
                'id' => 9,
                'name' => 'cat9',
                'price' => 200,
                'image_path' => '/images/cat9.jpg',
            ],
            [
                'id' => 10,
                'name' => 'cat10',
                'price' => 200,
                'image_path' => '/images/cat10.jpg',
            ],
            [
                'id' => 11,
                'name' => 'cat11',
                'price' => 200,
                'image_path' => '/images/cat11.jpg',
            ],
        ],
        'dog' => [
            [
                'id' => 12,
                'name' => 'dog1',
                'price' => 1100,
                'image_path' => '/images/dog1.jpg',
            ],
            [
                'id' => 13,
                'name' => 'dog2',
                'price' => 1200,
                'image_path' => '/images/dog2.jpg',
            ],
            [
                'id' => 14,
                'name' => 'dog3',
                'price' => 1300,
                'image_path' => '/images/dog3.jpg',
            ],
        ],
        'flower' => [
            [
                'id' => 15,
                'name' => 'flower1',
                'price' => 100,
                'image_path' => '/images/flower1.jpg',
            ],
            [
                'id' => 16,
                'name' => 'flower2',
                'price' => 200,
                'image_path' => '/images/flower2.jpg',
            ],
            [
                'id' => 17,
                'name' => 'flower3',
                'price' => 300,
                'image_path' => '/images/flower3.jpg',
            ],
            [
                'id' => 18,
                'name' => 'flower4',
                'price' => 400,
                'image_path' => '/images/flower4.jpg',
            ],
        ],
    ];


    public function search(Request $request)
    {
        $searchWord = $request->input('word');
        $result = self::ITEM[$searchWord] ?? [];

        return json_encode($result);
    }
}
