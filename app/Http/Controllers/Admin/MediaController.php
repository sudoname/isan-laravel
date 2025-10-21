<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of all media files.
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder', '');
        $disk = 'public';

        // Get all directories in the public storage
        $directories = Storage::disk($disk)->directories($folder);

        // Get all files in the current folder
        $files = Storage::disk($disk)->files($folder);

        // Filter only images
        $images = array_filter($files, function($file) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
        });

        // Get file details
        $mediaFiles = [];
        foreach ($images as $file) {
            $mediaFiles[] = [
                'path' => $file,
                'url' => Storage::disk($disk)->url($file),
                'name' => basename($file),
                'size' => Storage::disk($disk)->size($file),
                'lastModified' => Storage::disk($disk)->lastModified($file),
            ];
        }

        // Sort by last modified (newest first)
        usort($mediaFiles, function($a, $b) {
            return $b['lastModified'] - $a['lastModified'];
        });

        return view('admin.media.index', compact('mediaFiles', 'directories', 'folder'));
    }

    /**
     * Upload new media files.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'required|image|mimes:jpeg,jpg,png,gif,webp,svg|max:10240', // 10MB max
            'folder' => 'nullable|string'
        ]);

        $folder = $request->get('folder', 'media');
        $uploadedFiles = [];

        foreach ($request->file('files') as $file) {
            $path = $file->store($folder, 'public');
            $uploadedFiles[] = [
                'path' => $path,
                'url' => Storage::disk('public')->url($path),
                'name' => basename($path),
            ];
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => count($uploadedFiles) . ' file(s) uploaded successfully!',
                'files' => $uploadedFiles
            ]);
        }

        return redirect()->route('admin.media.index', ['folder' => $folder])
            ->with('success', count($uploadedFiles) . ' file(s) uploaded successfully!');
    }

    /**
     * Delete a media file.
     */
    public function destroy(Request $request)
    {
        $path = $request->get('path');

        if (!$path) {
            return response()->json([
                'success' => false,
                'message' => 'File path is required'
            ], 400);
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'File deleted successfully!'
                ]);
            }

            return redirect()->route('admin.media.index')
                ->with('success', 'File deleted successfully!');
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'File not found'
            ], 404);
        }

        return redirect()->route('admin.media.index')
            ->with('error', 'File not found!');
    }
}
