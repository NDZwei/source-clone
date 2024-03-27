<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdministrativeUnitResource extends JsonResource
{
    protected $getChildren;

    public function __construct($resource, $getChildren = false)
    {
        parent::__construct($resource);
        $this->getChildren = $getChildren;
    }

    public function toArray($request)
    {
        if ($this->getChildren) {
            return [
                'id' => $this->id,
                'code' => $this->code,
                'name' => $this->name,
                'level' => $this->level,
                'children' => $this->children ? AdministrativeUnitResource::collection($this->children) : [],
            ];
        } else {
            return [
                'id' => $this->id,
                'code' => $this->code,
                'name' => $this->name,
                'level' => $this->level,
                'parent_id' => $this->parent?->id,
                'parent' => $this->parent ? new AdministrativeUnitResource($this->parent, false) : null,
            ];
        }
    }
}
