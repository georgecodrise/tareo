<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExampleController extends Controller
{
    private $posts;

    public function __construct()
    {
        $posts = [
            (object) [
                'uuid' => Str::uuid(),
                'id' => 1,
                'title' => 'Post 1',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'status' => 'published',
            ],
            (object) [
                'uuid' => Str::uuid(),
                'id' => 2,
                'title' => 'Post 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'status' => 'draft',
            ],
            (object) [
                'uuid' => Str::uuid(),
                'id' => 3,
                'title' => 'Post 3',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'status' => 'published',
            ],
            (object) [
                'uuid' => Str::uuid(),
                'id' => 4,
                'title' => 'Post 4',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'status' => 'draft',
            ],
            (object) [
                'uuid' => Str::uuid(),
                'id' => 5,
                'title' => 'Post 5',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'status' => 'published',
            ],
        ];

        $this->posts = $posts;
    }

    public function index(): JsonResponse
    {
        $posts = $this->posts;

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => [
                'posts' => $posts
            ]
        ], 200);
    }
}
