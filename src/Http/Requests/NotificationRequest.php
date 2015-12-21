<?php

namespace ffy\notifications\Http\Requests;

use App\Http\Requests\Request;
use ffy\notifications\Notification;

class NotificationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $notification = Notification::find($this->route()->parameter('id'));
        return $this->user()->id == $notification->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
