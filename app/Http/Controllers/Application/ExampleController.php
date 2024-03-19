<?php

namespace App\Http\Controllers\Application;

use App\Exports\Example\ExampleExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Example\ExampleRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

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

    public function index(): View
    {
        $posts = $this->posts;

        return view('application.example.index', compact('posts'));
    }

    public function store(ExampleRequest $request): void
    {
        $post = (object) [
            'id' => count($this->posts) + 1,
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ];

        array_push($this->posts, $post);
    }

    public function upload(Request $request): void
    {
        $request->validate([
            'files' => 'required|max:2048',
        ]);

        $files = $request->file('files');

        $folder = 'TEST/';

        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $hashName = $file->hashName();
            $size = $file->getSize();
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();

            $path_store = $folder . $hashName;

            Storage::disk('do')->put($path_store, file_get_contents($file));
        }
    }

    public function exportExcel(): object {
        return Excel::download(new ExampleExport($this->posts), 'example.xlsx');
    }

    public function exportPdf(): object {
        $pdf = Pdf::loadView('application.example.export.pdf.example', [
            'posts' => $this->posts,
        ]);

        return $pdf->stream('example.pdf');
    }

    public function permissions(): string
    {
        if (auth()->user()->can('example')) {
            return 'You have permission';
        } else {
            return 'You do not have permission';
        }
    }
}
