<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginationCollection extends ResourceCollection
{
    public function __construct($resource, $resourceClass = null) {
        $this->collects = $resourceClass;
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'list' => $this->collection,
            'pagination' => [
                'page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'total_page' => $this->lastPage(),
            ],
        ];

        return parent::toArray($request);
    }
}
