<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class FieldController extends Controller
{
    public function home(Request $request)
    {
        // フィルタリング
        $filters = $request->all();
        // フィールドを取得
        $query = Field::with('reviews')
            ->select('fields.id', 'fields.name', 'fields.post', 'fields.address', 'fields.image', 'fields.url');

            // フィールド名でフィルタリング
            if (!empty($filters['search'])) {
                $query->where('fields.name', 'like', '%' . $filters['search'] . '%');
            }

            // 都道府県でフィルタリング 
            if ( !empty($filters) ) {
                if ( !empty($filters['prefecture']) ) {
                    $query->whereIn('fields.address', $filters['prefecture']);
                }
            }
        // レビューが新しい順に並び替え
        $fields = $query->get()->sortByDesc(function($field) {
            return optional($field->reviews->sortByDesc('updated_at')->first())->updated_at;
        });

        // ビューにデータを渡す
        return view('home', compact('fields'));
    }

    public function show($id)
    {
        // フィールドIDが一致するフィールドを取得
        $fields = Field::with(['reviews.user', 'users'])
            ->where('id', $id)
            ->get();

        // ログインしているユーザーがレビューしているかどうか
        $is_reviewed = false;
            if (Auth::check()) {
                $is_reviewed = Review::where('user_id', Auth::id())->where('field_id', $id)->exists();
            }
            
        return view('fieldreview/detail', compact('fields', 'is_reviewed'));
    }

    public function create()
    {
        return view('fieldreview/create');
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'field_name' => 'required|max:255',
            'post' => 'required|max:10',
            'address' => 'required|max:255',
            'tel' => 'required|max:13',
            'url' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:2048',
            'detail' => 'required',
        ]);

        // 画像を取得
        $image = $request->file('image');

        // 画像をS3に保存
        $path = Storage::disk('s3')->putFile('fields', $image, 'public');

        // 画像のURLを取得
        $url = Storage::disk('s3')->url($path);

        Field::create([
            'name' => $request->field_name,
            'post' => $request->post,
            'address' => $request->address,
            'tel' => $request->tel,
            'url' => $request->url,
            'image' => $url,
            'detail' => $request->detail,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Session::flash('success', 'フィールドを登録しました');

        return redirect()->route('home');
    }

    public function edit($id)
    {
        // フィールドIDが一致するフィールドを取得
        $field = Field::find($id);

        return view('fieldreview/edit', compact('field'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'field_name' => 'required|max:255',
            'post' => 'required|max:10',
            'address' => 'required|max:255',
            'tel' => 'required|max:13',
            'url' => 'required|max:255',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'current_image' => 'required',
            'detail' => 'required',
        ]);

        $field = Field::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('fields', $image, 'public');
            $url = Storage::disk('s3')->url($path);
        } else {
            $url = $request->current_image;
        }

        Field::where('id', $id)->update([
            'name' => $request->field_name,
            'post' => $request->post,
            'address' => $request->address,
            'tel' => $request->tel,
            'url' => $request->url,
            'image' => $url,
            'detail' => $request->detail,
            'updated_at' => now(),
        ]);

        Session::flash('success', 'フィールドを更新しました');

        return redirect()->route('field.show', $id);
    }

    public function destroy($id)
    {
        // フィールドIDが一致するフィールドを取得
        $field = Field::find($id);

        // フィールドIDが一致するレビューを削除
        Review::where('field_id', $id)->delete();

        // フィールドを削除
        $field->delete();

        return redirect()->route('home');
    }

}

