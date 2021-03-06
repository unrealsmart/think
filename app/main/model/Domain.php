<?php

namespace app\main\model;

use think\Model;

/**
 * @mixin think\Model
 */
class Domain extends Model
{
    protected $table = 'domain';

    public function searchFsAttr($query, $value, $data)
    {
        $exclude_fields = [];
        foreach ($query->getFieldsType() as $k => $v) {
            if (in_array($k, ['id', 'status']) || $v === 'timestamp') {
                $exclude_fields[] = $k;
            }
        }

        $expression = [];
        foreach (exclude_search_fields($query, $exclude_fields) as $name) {
            $expression[] = [$name, 'like', '%' . $value . '%'];
        }

        $query->whereOr($expression);
    }

    public function searchNameAttr($query, $value, $data)
    {
        $query->where('name', $value);
    }

    public function searchTitleAttr($query, $value, $data)
    {
        $query->where('title', $value);
    }

    public function searchDescriptionAttr($query, $value, $data)
    {
        $query->where('description', $value);
    }

    public function searchStatusAttr($query, $value, $data)
    {
        $query->where('status', $value);
    }
}
