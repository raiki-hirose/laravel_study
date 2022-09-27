<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Archive;
use App\Http\Requests\CreateArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function showCreateForm(Folder $folder)
    {
        return view('archives/create', ['folder' => $folder]);
    }

    public function create(Folder $folder, CreateArchive $request)
    {
        $archive = new Archive();
        $archive->title = $request->title;
        $archive->period = $request->period;
        $archive->success_level = $request->success_level;

        $folder->archives()->save($archive);

        return redirect()->route('tasks.index', [
            'folder' => $folder
        ]);
    }

    public function showDeletePage(Folder $folder, Archive $archive)
    {
        $this->delete($folder, $archive);

        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }

    public function delete(Folder $folder, Archive $archive): void
    {
        $this->checkRelation($folder, $archive);

        Archive::destroy('archive_id', $archive->id);
    }

    private function checkRelation(Folder $folder, Archive $archive)
    {
        if ($folder->id !== $archive->folder_id) {
            abort(404);
        }
    }
}
