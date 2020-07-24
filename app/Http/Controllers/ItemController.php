<?php

namespace App\Http\Controllers;
use App\Item;
use App\Comment;
use App\Answer;
use App\Review;
use App\User;
use App\Order;
use App\BrowsingHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentAddRequest;
use App\Http\Requests\ReviewAddRequest;
class ItemController extends Controller
{
    public function item (Item $item) {
	    if (Auth::check()) {
		    $user = Auth::user();
		    if (!is_null($user->browsingHistory()) && $user->browsingHistory->contains($item->id)) {
			    $user->browsingHistory()->detach($item->id);
		    }
		    $user->browsingHistory()->attach($item->id);
	    } else {
		    $browsingHistory = session('browsingHistory');
		    if (is_null($browsingHistory)) {
			    session(['browsingHistory' => [$item->id]]);
		    } else {
                if (in_array($item->id, $browsingHistory)) {
                    unset($browsingHistory[array_search($item->id, $browsingHistory)]);
                    session()->put('browsingHistory', $browsingHistory);
                }
                session()->push('browsingHistory', $item->id);
            }
	    }
        if (Auth::check()) {
            $cart = Auth::user()->cart->items;
            $likes = Auth::user()->likes->items;

            $item->setAttribute('in_cart', $cart->contains($item->id));
            $item->setAttribute('is_liked', $likes->contains($item->id));
        } else {
            $cartList = session('cartList');
            $likesList = session('likesList');

//            if (!is_null($cartList) && in_array($itemId, $cartList)) {
//                $inCart = true;
//            } else {
//                $inCart = false;
//            }

            $item->setAttribute('in_cart', !is_null($cartList) && in_array($item->id, $cartList));
            $item->setAttribute('is_liked', !is_null($likesList) && in_array($item->id, $likesList));


        }
        return view('basic.store.item', compact('item'));
    }

    public function commentAdd (CommentAddRequest $request, $itemId) {
        if (!is_null($request->message)) {
            if ($request->commentid == 0) {
                $comment = new Comment;
                $comment->item_id = $itemId;
                $comment->user_id = Auth::id();
                $comment->content = $request->message;
                $comment->save();
            } else {
                $answer = new Answer;
                $answer->comment_id = $request->commentid;
                $answer->user_id = Auth::id();
                $answer->content = $request->message;
                $answer->save();
            }
        }
	    return redirect()->back();
    }


    public function reviewAdd (ReviewAddRequest $request, $itemId) {
        if ($request->rating <= 5 && $request->rating >= 1 && !is_null($request->message)) {
            $review = new Review;
            $review->item_id = $itemId;
            $review->user_id = Auth::id();
            $review->content = $request->message;
            $review->rating = $request->rating;
            $review->save();
        }
	    return redirect()->back();
    }


//---------------------подгрузка------------

    public function moreComments (Request $request, $itemId) {
        if ($request->ajax() && $request->commentId) {
            $params = [];
            $params[] = ['id', '>=', $request->commentId];
            if ($request->userId) {
                $params[] = ['user_id', '=', $request->userId];
                $comments = Comment::where($params)->limit(10)->get();
                return view('layouts.user.comments.comments', compact('comments'));
            } else {
                $params[] = ['item_id', '=', $itemId];
                $comments = Comment::where($params)->limit(6)->get();
                return view('layouts.store.comments.comments', compact('comments'));
            }
        }
    }

    public function moreAnswers (Request $request, $itemId) {
        if ($request->ajax() && $request->commentId && $request->answerId) {
            $commentId = $request->commentId;
            $params = [];
            $params[] = ['comment_id', '=', $request->commentId];
            $params[] = ['id', '>=', $request->answerId];
            $answers = Answer::where($params)->limit(4)->get();
            return view('layouts.store.comments.answers', compact('answers', 'commentId'));
        }
    }

    public function moreReviews (Request $request, $itemId) {
        if ($request->ajax() && $request->reviewId) {
            $params = [];
            $params[] = ['id', '>=', $request->reviewId];
            if ($request->userId) {
                $params[] = ['user_id', '=', $request->userId];
                $reviews = Review::where($params)->limit(8)->get();
                return view('layouts.user.comments.reviews', compact('reviews'));
            } else {
                $params[] = ['item_id', '=', $itemId];
                $reviews = Review::where($params)->limit(5)->get();
                return view('layouts.store.comments.reviews', compact('reviews'));
            }
        }
    }

}
