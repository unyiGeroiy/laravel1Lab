<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonRequest;
use App\Models\Season;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::orderBy('premiere_date')->get();

        return view('seasons.index', compact('seasons'));
    }

    public function create()
    {
        return view('seasons.form', ['season' => new Season]);
    }

    public function store(SeasonRequest $request)
    {
        $data = $request->validated();
        $data['image_path'] = $this->saveImage($request->file('image'));

        Season::create($data);

        return redirect()->route('seasons.index');
    }

    public function show(Season $season)
    {
        return view('seasons.show', compact('season'));
    }

    public function edit(Season $season)
    {
        return view('seasons.form', compact('season'));
    }

    public function update(SeasonRequest $request, Season $season)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $this->deleteImage($season->image_path);
            $data['image_path'] = $this->saveImage($request->file('image'));
        }

        $season->update($data);

        return redirect()->route('seasons.index');
    }

    public function destroy(Season $season)
    {
        $season->delete();

        return redirect()->route('seasons.index');
    }

    private function saveImage(UploadedFile $file): string
    {
        $path = 'seasons/' . Str::uuid() . '.jpg';

        $image = ImageManager::gd()
            ->read($file->getRealPath())
            ->scaleDown(width: 600);

        Storage::disk('public')->put($path, (string) $image->toJpeg(85));

        return $path;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'seasons/')) {
            Storage::disk('public')->delete($path);
        }
    }
}