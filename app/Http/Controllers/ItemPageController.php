<?php

namespace App\Http\Controllers;
use App\Item;
use App\Comment;
use App\Answer;
use App\Review;
use App\User;
use App\BrowsingHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentAddRequest;
use App\Http\Requests\ReviewAddRequest;
class ItemPageController extends Controller
{
    public function itemPage ($itemId) {
	    if (Auth::check()) {
		    $user = User::where('id', Auth::id())->firstOrFail();
		    if ($user->browsingHistory->contains($itemId)) {
			    
			    $user->browsingHistory()->detach($itemId);
			    
		    }
		    
		    $user->browsingHistory()->attach($itemId);
		    
	   $user = User::where('id', Auth::id())->firstOrFail();
	   $reversed = $user->browsingHistory->reverse();
	    } else {
		    
		    
		    
		    $browsingHistory = session('browsingHistory');
		    if (is_null($browsingHistory)) {
			    session(['browsingHistory' => [$itemId]]);
		    } else {
			    if (in_array($itemId, $browsingHistory)) {
			    unset($browsingHistory[array_search($itemId, $browsingHistory)]);
				session()->put('browsingHistory', $browsingHistory);
			    }
			    session()->push('browsingHistory', $itemId);
		    }
		    $browsingHistory = session('browsingHistory');
		
		$items = Item::find($browsingHistory)->sortBy(function ($item) use ($browsingHistory) {
    return array_search($item->getKey(), $browsingHistory);
});	    
		

	    $reversed = $items->reverse();
	    }
	    
	    
	    
	    $item = Item::where('id', $itemId)->first();
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
