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
class ItemPageController extends Controller
{
    public function itemPage ($itemId) {
        $reversed = [];
	    if (Auth::check()) {
		    $user = User::where('id', Auth::id())->firstOrFail();
		    if (!is_null($user->browsingHistory()) && $user->browsingHistory->contains($itemId)) {
                $reversed = $user->browsingHistory->reverse();
			    $user->browsingHistory()->detach($itemId);
		    }

		    $user->browsingHistory()->attach($itemId);

	    } else {
		    $browsingHistory = session('browsingHistory');


		    if (is_null($browsingHistory)) {
			    session(['browsingHistory' => [$itemId]]);

		    } else {

                $items = Item::find($browsingHistory)->sortBy(function ($item) use ($browsingHistory) {
                    return array_search($item->getKey(), $browsingHistory);
                });
                $reversed = $items->reverse();

			    if (in_array($itemId, $browsingHistory)) {
			    unset($browsingHistory[array_search($itemId, $browsingHistory)]);
				session()->put('browsingHistory', $browsingHistory);
			    }
			    session()->push('browsingHistory', $itemId);
		    }


	    }



	    $item = Item::where('id', $itemId)->firstOrFail();

        if (Auth::check()) {

            $cart = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail()->items;



            $likes = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail()->items;




            $item->setAttribute('in_cart', $cart->contains($itemId));

            $item->setAttribute('is_liked', $likes->contains($itemId));


            foreach($reversed as $i) {

                    $i->setAttribute('in_cart', $cart->contains($i->id));

                    $i->setAttribute('is_liked', $likes->contains($i->id));
            }

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



            foreach($reversed as $i) {

                    $i->setAttribute('in_cart', !is_null($cartList) && in_array($i->id, $cartList));

                    $i->setAttribute('is_liked', !is_null($likesList) && in_array($i->id, $likesList));
            }

        }




	    if (!is_null($item)) {
	    return view('item', compact('item', 'reversed'));
    } else {
	    echo('404');
    }
    }

    public function commentAdd (CommentAddRequest $request, $itemId) {


	    if ($request->commentid == 0) {
	    $comment = new Comment;
	    $comment->item_id = $itemId;
	    $comment->user_id = Auth::id();
	    $comment->message = $request->message;
	    $comment->save();
	    } else {
		    $answer = new Answer;
		    $answer->comment_id = $request->commentid;
		    $answer->user_id = Auth::id();
		    $answer->content = $request->message;
		    $answer->save();
	    }

	    return redirect()->route('item', $itemId);
    }

    public function reviewAdd (ReviewAddRequest $request, $itemId) {

	    $review = new Review;
	    $review->item_id = $itemId;
	    $review->user_id = Auth::id();
	    $review->content = $request->message;
	    $review->rating = $request->rating;
	    $review->save();

	    return redirect()->route('item', $itemId);
    }
}
