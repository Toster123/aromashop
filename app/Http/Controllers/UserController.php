<?php

namespace App\Http\Controllers;

use App\Dialog;
use App\Events\NewMessage;
use App\Item;
use App\messageImage;
use App\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{

    protected $availibleImageExtentions = ['png', 'jpg'];

    //-----------------------------profile-----------------------

    public function userProfile(User $user)
    {
             $user->setAttribute('auth', Auth::id() == $user->id && !is_null($user));
            return view('user.profile', compact('user'));
    }


    public function saveChanges(Request $request, User $user)
    {
        try {
            $user = Auth::user();
            if ($request->name && $user->name !== $request->name) {
                $user->name = $request->name;
            }

            if ($request->photo && in_array($request->photo->getClientOriginalExtension(), $this->availibleImageExtentions)) {
                $file = $request->photo;
                $hash = Str::random(15);
                $ext = $file->getClientOriginalExtension();
                $path = 'users/' . $hash . '.' . $ext;
                $image = Image::make($file)
                    ->resize(500, 500)
                    ->save('storage/' . $path);
                if ($user->photo_href !== 'errors/user_no_photo.png') {
                    Storage::delete($user->photo_href);
                }
                $user->photo_href = $path;
                $user->save();
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {

        }
    }

    //------------------------------cart--------------------

    public function cart () {

        if (Auth::check()) {
            $order = Auth::user()->cart;

            return view('user.cart', compact('order'));
        } else {
            $items = [];
            $cartList = session('cartList');
            if (!is_null($cartList)) {
                $counts = array_count_values($cartList);
                $cartList = array_unique($cartList);

                $items = Item::whereIn('id', $cartList)->get();

                foreach ($items as $item) {
                    if (isset($counts[$item->id])) {
                        $item->setAttribute('count', $counts[$item->id]);
                    }
                }
            }
            return view('user.cart', compact('items'));

        }

    }


    public function cartAdd (Request $request) {
        $itemId = $request->itemId;
        if (Auth::check()) {
            $order = Auth::user()->cart;
            if ($order->items->contains($itemId)) {
                $pivot = $order->items()->where('item_id', $itemId)->first()->pivot;
                $pivot->count++;
                $pivot->update();
            } else {
                $order->items()->attach($itemId);
            }
        } else {
            $cartList = session('cartList');
            if (is_null($cartList)) {
                session(['cartList' => [$itemId]]);
            } else {
                session()->push('cartList', $itemId);
            }
        }
        return response()->json(true);
    }


    public function cartRemove (Request $request) {
        $itemId = $request->itemId;
        if (Auth::check()) {
            $order = Auth::user()->cart;
            if ($order->items->contains($itemId)) {
                $pivot = $order->items()->where('item_id', $itemId)->first()->pivot;
                if ($pivot->count < 2) {
                    $order->items()->detach($itemId);
                } else {
                    $pivot->count--;
                    $pivot->update();
                }

            } else {
                return response()->json(false);
            }
        } else {
            $cartList = session('cartList');
            if (!is_null($cartList)) {
                $array = session()->pull('cartList',[]);
                unset($array[array_search($itemId, $array)]);
                session()->put('cartList',$array);
            } else {
                return response()->json(false);
            }
        }
    }


    public function cartRemoveWithoutCount (Request $request) {
        $itemId = $request->itemId;
        if (Auth::check()) {
            $order = Auth::user()->cart;
            if (!$order->items->contains($itemId)) {
                return response()->json(false);
            }
            $order->items()->detach($itemId);

        } else {
            $cartList = session('cartList');
            if (!is_null($cartList)) {
                $array = session()->pull('cartList',[]);
                $counts = array_count_values($array);
                if (isset($counts[$itemId])) {
                    for($i = 0; $i < $counts[$itemId]; $i++) {
                        unset($array[array_search($itemId, $array)]);
                    }
                }
                session()->put('cartList',$array);
            } else {
                return response()->json(false);
            }
        }
        return response()->json(true);
    }

    //------------------------------likes-------------------

    public function likes () {
        $likes = [];
        if (Auth::check()) {
            $likes = Auth::user()->likes->items;
        } else {
            $likesList = session('likesList');
            if (!is_null($likesList)) {
                $likes = Item::whereIn('id', $likesList)->get();
            }
        }
        return view('user.likes', compact('likes'));
    }

    public function likesAdd (Request $request) {
        $itemId = $request->itemId;
        if (Auth::check()) {
            $order = Auth::user()->likes;

            if (!$order->items->contains($itemId)) {
                $order->items()->attach($itemId);
            } else {
                return response()->json(false);
            }
        } else {
            $likesList = session('likesList');

            if (is_null($likesList)) {

                session(['likesList' => [$itemId]]);

            } elseif (!in_array($itemId, $likesList)) {
                    session()->push('likesList', $itemId);
            }
        }
        return response()->json(true);
    }

    public function likesRemove (Request $request) {
        $itemId = $request->itemId;
        if (Auth::check()) {
            $order = Auth::user()->likes;
            if ($order->items->contains($itemId)) {
                $order->items()->detach($itemId);
            } else {
                return response()->json(false);
            }
        } else {
            $likesList = session('likesList');
            if (!is_null($likesList)) {
                unset($likesList[array_search($itemId, $likesList)]);
                session()->put('likesList', $likesList);
            } else {
                return response()->json(false);
            }
        }
        return response()->json(true);
    }

    //------------------------------chat--------------------

    public function chat(User $user)
    {
        $messages = [];
        if (!$user->dialog->messages->isEmpty()) {
        $query = $user->dialog->messages();//Message::query()->where('dialog_id', $userId);
        $messages_count = $query->count();
        if ($messages_count > 15) {
            $messages_count -= 15;
        } else {
            $messages_count = 0;
        }
        $messages = $query->limit(15)->skip($messages_count)->get();
        if ($messages_count == 0) {
            $messages->first()->setAttribute('last', true);
        }
    }
        return view('user.chat.chat', compact('messages'));
    }

    public function moreMessages(Request $request)
    {
        if ($request->message) {
            $dialog = Auth::user()->dialog;
            $query = $dialog->messages()->where('id', '<', $request->message);
            $messages_count = $query->count();
            if ($messages_count > 15) {
                $messages_count -= 15;
            } else {
                $messages_count = 0;
            }
            $messages = $query->limit(15)->skip($messages_count)->get();
            if ($messages_count == 0) {
                $messages->first()->setAttribute('last', true);
            }
            return view('layouts.chat.messages', compact('messages'));
        }
    }

    public function moreMessagesForAdmin(Request $request)
    {
        if ($request->message && $request->dialogId) {
            $dialog = Dialog::find($request->dialogId);
            $query = $dialog->messages()->where('id', '<', $request->message);
            $messages_count = $query->count();
            if ($messages_count > 15) {
                $messages_count -= 15;
            } else {
                $messages_count = 0;
            }
            $messages = $query->limit(15)->skip($messages_count)->get();
            if ($messages_count == 0) {
                $messages->first()->setAttribute('last', true);
            }
            return view('layouts.admin.chat.messages', compact('messages'));
        }
    }


    public function adminChat()
    {
        $dialogs = Dialog::where('seen', false)->get();
        return view('admin.chat.chat', compact('dialogs'));
    }

    public function getDialog(Request $request)
    {
        if ($request->dialogId) {
            $dialog = Dialog::find($request->dialogId);/*
            $dialog->seen = true;
            $dialog->save();*/
            $messages = [];
            if (!$dialog->messages->isEmpty()) {
                $query = $dialog->messages();
                $messages_count = $query->count();
                if ($messages_count > 15) {
                    $messages_count -= 15;
                } else {
                    $messages_count = 0;
                }
                $messages = $query->limit(15)->skip($messages_count)->get();
                if ($messages_count == 0) {
                    $messages->first()->setAttribute('last', true);
                }
            }
            return view('layouts.admin.chat.messagesHistory', compact('messages'));
        }
    }

    public function getDialogs () {
        $dialogs = Dialog::where('seen', false)->get();
        return view('layouts.admin.chat.dialogs', compact('dialogs'));
    }

    public function sendMessageFromAdmin(Request $request)
    {
        if ($request->dialogId && ($request->message || $request->photos)) {
            $message = new Message();
            if ($request->message) {
                $message->content = $request->message;
            }
            $message->dialog_id = $request->dialogId;
            $message->from_the_user = false;
            $message->user_id = Auth::id();
            $message->save();
            $countOfImages = 0;
            if ($request->photos) {
                foreach ($request->photos as $photo) {
                    $countOfImages++;
                    if (in_array($photo->getClientOriginalExtension(), $this->availibleImageExtentions)) {
                        $image = new messageImage();
                        $image->message_id = $message->id;

                        $hash = Str::random(15);
                        $ext = $photo->getClientOriginalExtension();
                        $path = 'messages/' . $hash . '.' . $ext;

                        $img = Image::make($photo)
                            ->resize(500, 500)
                            ->save('storage/' . $path);

                        $image->img_href = $path;
                        $image->save();
                    }
                }
            }

            NewMessage::dispatch(json_encode([
                'recipient' => Dialog::where('id', $request->dialogId)->first()->user->id,
                'type' => 'adminMessage',
                'user_id' => Auth::id(),
                'message' => $request->message,
                'dialog_id' => $request->dialogId,
                'count_of_images' => $countOfImages,
                'outgoingMessageHTML' => view('layouts.chat.outgoingMessage', compact('message'))->render(),
                'messageHTML' => view('layouts.chat.incomingMessage', compact('message'))->render()
            ]));

            return json_encode(['images' => view('layouts.chat.outgoingMessagePhotos', compact('message'))->render(), 'date' => $message->user->name . ' ' . date_format($message->created_at, 'H:i d.m.Y')]);
        }
    }

    public function sendMessageFromUser(Request $request)
    {
        if ($request->message || $request->photos) {
            $dialog = Auth::user()->dialog;
            $dialog->seen = $request->seen == 'true' ? true : false;
            $dialog->save();

            $message = new Message();
            if ($request->message) {
                $message->content = $request->message;
            }
            $message->dialog_id = $dialog->id;
            $message->user_id = Auth::id();
            $message->save();
            $countOfImages = 0;
            if ($request->photos) {
                foreach ($request->photos as $photo) {
                    if (in_array($photo->getClientOriginalExtension(), $this->availibleImageExtentions)) {
                        $countOfImages++;
                        $image = new messageImage();
                        $image->message_id = $message->id;

                        $hash = Str::random(15);
                        $ext = $photo->getClientOriginalExtension();
                        $path = 'messages/' . $hash . '.' . $ext;

                        $img = Image::make($photo)
                            ->resize(500, 500)
                            ->save('storage/' . $path);

                        $image->img_href = $path;
                        $image->save();
                    }
                }
            }
            NewMessage::dispatch(json_encode([
                'recipient' => 'support',
                'type' => 'userMessage',
                'seen' => $request->seen == 'true' ? true : false,
                'dialog_id' => $dialog->id,
                'message' => $message->content,
                'count_of_images' => $countOfImages,
                'messageHTML' => view('layouts.chat.incomingMessage', compact('message'))->render(),
                'dialogHTML' => view('layouts.admin.chat.dialog', compact('dialog'))->render()
            ]));

            return json_encode(['images' => view('layouts.chat.outgoingMessagePhotos', compact('message'))->render(), 'date' => $message->user->name . ' ' . date_format($message->created_at, 'H:i d.m.Y')]);
        }
    }

    public function searchTerm (Request $request) {
        $search = $request->get('term');
            $result = User::select('name')
                ->where('name', 'LIKE', '%'.$search.'%')
                ->limit(15)
                ->pluck('name');

            return response()->json($result);
        }

        public function searchDialogs (Request $request) {

        $search = $request->get('term');
            $dialogs = Dialog::whereHas('user', function ($user) use ($search) {
                $user->where('name', 'LIKE', '%'.$search.'%');
            })->get();

            return view('layouts.admin.chat.dialogs', compact('dialogs'));
        }
}
