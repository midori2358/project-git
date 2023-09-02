<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;

class MyprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでmyprofile/にアクセスされた場合の「一覧表示処理」 index: showの補助ページ
    public function index()
    {
            $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得 
            $user = \Auth::user();
            // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $myprofiles = $user->myprofile()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'myprofiles' => $myprofiles,
                'user' => $user,
            ];
        }
        
        // ビューでそれらを表示
        return view('myprofiles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでmyprofile/createにアクセスされた場合の「新規登録画面表示処理」 create: 新規作成用のフォームページ
    public function create()
    {
         $myprofile = new Profile;

        // プロフィール作成ビューを表示
        return view('myprofiles.create', [
            'myprofile' => $myprofile,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // postでmyprofile/にアクセスされた場合の「新規登録処理」（新規登録画面を表示するためのものではありません）
    public function store(Request $request)
    {
         // バリデーション
        $request->validate([
            'from' =>  'required|max:255',
            'skill' => 'required|max:255',
        ]);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->myprofile()->create([
            'birth' => $request->birth,
            'from' => $request->from,
            'skill' => $request->skill,
        ]);
        
        // 前のURLへリダイレクトさせる
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」 
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $myprofile = Profile::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は投稿を編集
         if (\Auth::id() === $myprofile->user_id) {


        // メッセージ詳細ビューでそれを表示
        return view('myprofiles.show', [
            'myprofile' => $myprofile,
        ]);
         }
           // トップページへリダイレクトさせる
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」  edit: 更新用のフォームページ
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $myprofile = Profile::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は投稿を編集
         if (\Auth::id() === $myprofile->user_id) {

        // メッセージ編集ビューでそれを表示
        return view('myprofiles.edit', [
            'myprofile' => $myprofile,
        ]);
         }
          // トップページへリダイレクトさせる
        return redirect()->route('myprofile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'from' => 'required|max:255',  
            'skill' => 'required|max:255',
        ]);
        
        // idの値でメッセージを検索して取得
        $myprofile = Profile::findOrFail($id);
        // メッセージを更新
        $myprofile->birth = $request->birth;
        $myprofile->from = $request->from;
        $myprofile->skill = $request->skill;
        $myprofile->save();

        // トップページへリダイレクトさせる
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $myprofile = Profile::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は投稿を削除
         if (\Auth::id() === $myprofile->user_id) {
        // メッセージを削除
        $myprofile->delete();

        // トップページへリダイレクトさせる
        return back();
         }
    }
}
