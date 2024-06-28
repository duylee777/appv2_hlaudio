<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Product;
use Spatie\Searchable\ModelSearchAspect;

class CommentController extends Controller
{
    public function getAllComment(){
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        return view('admin.comment', compact('comments'));
    }

    public function store(Request $request, $post_id, $comment_id, $is_post)
    {
        $newComment = [
            'comment_id' => $comment_id,
            'user_id' => auth()->user()->id,
            'type_id' => $post_id,
            'is_post' => $is_post,
            'body' => $request->comment,
            'status' => true
        ];
        Comment::create($newComment);
        return response('Bình luận thành công',200);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->body = $request->body;
        $comment->save();
        return response('Đã sửa', 200);
    }

    public function hideComment($id)
    {
        $comment = Comment::find($id);
        
        if ($comment->status) {
            $comment->status = false;
        }
        else{
            $comment->status = true;
        }
        $comment->save();
        return response('Xóa thành công', 200);
    }

    public function destroy( $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response('Xóa thành công', 200);
    }
}
