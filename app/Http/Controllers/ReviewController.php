<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $restrictedWords = config('restricted_words.words');

        $request->validate([
            'comment' => ['required', 'string', function($attribute, $value, $fail) use ($restrictedWords) {
                foreach ($restrictedWords as $word) {
                    if (strpos($value, $word) !== false) {
                        return $fail('不適切な言葉が含まれています。');
                    }
                }
            }],
        ]);

        $post = $request->all();
        
        Review::insert([
            'field_id' => $id,
            'user_id' => auth()->id(),
            'rating' => $post['rating'],
            'comment' => $post['comment'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::flash('success', '口コミを投稿しました');

        return redirect()->route('field.show', $id);
    }

    public function update(Request $request, $id)
    {
        $restrictedWords = config('restricted_words.words');

        $request->validate([
            'comment' => ['required', 'string', function($attribute, $value, $fail) use ($restrictedWords) {
                foreach ($restrictedWords as $word) {
                    if (strpos($value, $word) !== false) {
                        return $fail('不適切な言葉が含まれています。');
                    }
                }
            }],
        ]);

        $post = $request->all();

        $review = Review::where('field_id', $id)->where('user_id', auth()->id())->first();

        if ($review) {
            $review->update([
                'rating' => $post['rating'],
                'comment' => $post['comment'],
                'updated_at' => now(),
            ]);
        } else {
            Session::flash('error', '更新するレビューが見つかりません');
            return redirect()->back();
        }

        Session::flash('success', '口コミを更新しました');

        return redirect()->route('field.show', $id);
    }
}
