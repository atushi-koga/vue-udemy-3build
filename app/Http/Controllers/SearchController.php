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
                'image_path' => '',
            ],
            [
                'id' => 2,
                'name' => 'cat2',
                'price' => 200,
                'image_path' => '',
            ],
        ],
        'dog' => [
            [
                'id' => 3,
                'name' => 'dog1',
                'price' => 1100,
                'image_path' => '',
            ],
            [
                'id' => 4,
                'name' => 'dog2',
                'price' => 1200,
                'image_path' => '',
            ],
            [
                'id' => 5,
                'name' => 'dog3',
                'price' => 1300,
                'image_path' => '',
            ],
        ],
        'flower' => [
            [
                'id' => 6,
                'name' => 'flower1',
                'price' => 100,
                'image_path' => '',
            ],
            [
                'id' => 7,
                'name' => 'flower2',
                'price' => 200,
                'image_path' => '',
            ],
            [
                'id' => 8,
                'name' => 'flower3',
                'price' => 300,
                'image_path' => '',
            ],
            [
                'id' => 9,
                'name' => 'flower4',
                'price' => 400,
                'image_path' => '',
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
