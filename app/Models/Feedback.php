<?php

namespace App\Models;

use App\Traits\ModelHelperTrait;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use ModelHelperTrait;

    protected $table = 'feedback';

    protected $fillable = ['name', 'phone', 'email', 'company', 'message', 'type', 'status', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'name' => 'string|required',
            'phone' => 'required_without:email',
            'email' => 'required_without:phone',
            'company' => 'string|nullable',
            'message' => 'string|nullable',
            'type' => 'integer|nullable',
            'status' => 'integer|nullable',
            'created_at' => 'date|nullable',
            'updated_at' => 'date|nullable',

        ];
    }

    // attributes
    public function getStatusUIAttribute()
    {
        switch ($this->status) {
            case 0:
                return '<span class="btn-status btn-status-success">новый заявка</span>';
            case 1:
                return '<span class="btn-status btn-status-warning">прочитано</span>';
            default:
                return '';
        }
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::created(function ($model) {
            $phone = preg_replace('~[^0-9]+~', '', $model->phone);

            $apiToken = '';
            $chatId = '';

            if (!empty($apiToken) && !empty($chatId)) {
                $url = "https://api.telegram.org/bot$apiToken/sendMessage";

                $text = "<strong>zim-zim.uz Обратный связь</strong> \n Имя: {$model->name} \n Телефон: <a href='tel:$phone'>{$model->phone}</a> \n Сообщение: {$model->message} \n";

                $headers = [
                    'Accept' => 'application/json',
                ];

                $json = [
                    'chat_id' => $chatId,
                    'parse_mode' => 'html',
                    'disable_notification' => false,
                    'text' => $text
                ];

                $client = new Client(['http_errors' => false]);

                $client->post($url, [
                    'headers' => $headers,
                    'json' => $json
                ]);
            }
        });
    }
}
