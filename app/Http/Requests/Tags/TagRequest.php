<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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

    /**
     * Handler tags from tags-add form
     * @param Request $request
     * @return Collection
     */
    public function getTags(Request $request): Collection
    {

        $tagsArray = array_map(function ($item) {
            return Str::of($item)->trim()->ucfirst();
        }, $request->post('tags'));

        return collect($tagsArray)->reject(function($name) {
            return empty($name); // вычищаем пустые элементы из коллекции
        });
    }
}
