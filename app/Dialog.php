<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    public function messages () {
        return $this->hasMany(Message::class);
    }
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function getLastMessage () {
        if(!$this->messages->isEmpty()) {
            $query = $this->messages();
            $messages_count = $query->count();
            if ($messages_count >= 1) {
                $messages_count--;
            }
            $message = $query->limit(1)->skip($messages_count)->first();
            $html = '';
            if (!$message->images->isEmpty()) {
                $count = 0;
                foreach ($message->images as $image) {
                    $count++;
                }
                if ($count > 1) {
                    $html.=$count;
                }
                $html.='<i class="ti-image"></i>';
            }
            $html.=$message->content;
            return $message;
        }
    }//.....доделать
}
