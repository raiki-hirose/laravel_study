<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;

        // ★ ユーザーに紐づけて保存
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    public function showDeleteForm(int $id)
    {
        $folder = Folder::find($id);

        return view('folders/delete', [
            'id' => $folder->id,
        ]);
    }

    public function delete(int $id)
    {
        $folder = Folder::find($id);
        Task::where('folder_id', $id)->truncate();
        Folder::destroy('id', $id);

        return redirect()->route('home');
    }

    public function showRefreshForm()
    {
        return view('folders/refresh');
    }

    public function refresh()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Task::truncate();
        Folder::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::reguard();

        return redirect()->route('home');
    }
}
