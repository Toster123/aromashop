<?php

namespace App\Http\Controllers;

use App\Dialog;
use App\Http\Requests\ProfileEditRequest;
use App\messageImage;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{

    protected $availibleImageExtentions = ['jpeg', 'png', 'jpg', ''];

    public function userProfile ($userId) {
$user = User::find($userId);
if (Auth::id() === $user->id && !is_null($user)) {
$user->setAttribute('auth', true);
}
        return view('profile', compact('user'));

}

public function saveChanges (Request $request, $userId) {
//dd($request->photo->getClientOriginalExtension());
//dd(in_array($photo->getClientOriginalExtension(), $this->availibleImageExtentions));

    $user = Auth::user();
    if($request->name) {
        $user->name = $request->name;
    }

if ($request->photo || in_array($request->photo->getClientOriginalExtension(), $this->availibleImageExtentions)) {
    if ($user->photo_href) {
        Storage::delete($user->photo_href);
    }
    $file = $request->photo;
    $hash = Str::random(15);
    $ext = $file->getClientOriginalExtension();
    $path = 'users/' . $hash . '.' .$ext;
    $image = Image::make($file)
        ->resize(500, 500)
        ->save('storage/' . $path);

$user->photo_href = $path;
$user->save();



}

    return redirect()->route('profile', $user->id);

}

public function chat ($userId) {
        $user = User::find($userId);
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
return view('chat', compact('messages'));
}

public function moreMessages (Request $request) {
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
            return view('layouts.messages', compact('messages'));
        }
}
    public function moreMessagesForAdmin (Request $request) {
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
            return view('layouts.adminMessages', compact('messages'));
        }
    }


public function adminChat () {
        $dialogs = Dialog::where('seen', false)->get();
        return view('chatAdmin', compact('dialogs'));
}

public function getDialog (Request $request) {
    $dialog = Dialog::find($request->dialogId);
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
        return view('layouts.dialog', compact('messages'));
    }
}

public function sendMessageFromAdmin (Request $request) {

    $message = new Message();
    if ($request->message) {
        $message->content = $request->message;
    }
    $message->dialog_id = $request->dialogId;
    $message->from_the_user = false;
    $message->save();
    //event
foreach ($request->photos as $photo) {
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

    return view('layouts.outgoingMessagePhotos', compact('message'));
}
//foreach по фоткам, возвращаем оутгоинг фотос, передаем в евент вьюшку нового сообщения



public function sendMessageFromUser (Request $request) {


    $message = new Message();
    if ($request->message) {
        $message->content = $request->message;
    }
    $message->dialog_id = $request->dialogId;
    $message->save();
    //event
    foreach ($request->photos as $photo) {
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

    return view('layouts.outgoingMessagePhotos', compact('message'));
}

}
