<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleCollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
			'actions' => $this->getActions(),
			'id' => data_get($this, 'id'),
			'title' => data_get($this, 'title'),
			'content' => data_get($this, 'content'),
			'created_at' => data_get($this, 'created_at') ? data_get($this, 'created_at')->format('Y-m-d H:i:s') : '',
		];
    }

	private function getActions()
	{
		return [
			'edit_link' => route('article.edit', [ 'article' => data_get($this, 'id')]),
			'delete_link' => route('article.destroy', [ 'article' => data_get($this, 'id')])
		];
	}
}
