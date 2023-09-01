<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\User;

class ProjectsController extends Controller
{
    public function index()
     {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得 
            $user = \Auth::user();
            // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $projects = $user->feed_projects()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'projects' => $projects,
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->projects()->create([
            'content' => $request->content,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $project = \App\Models\Project::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $project->user_id) {
            $project->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
    
    /*public function index1()
     {
        // プロジェクト一覧を取得
        $projects1 = Project::all();         // 追加

        // メッセージ一覧ビューでそれを表示
        return view('projects.index1', [     // 追加
            'projects1' => $projects1,
        ]);                                 // 追加
    }
    */
    
    
}

