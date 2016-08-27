<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table;
    protected $fillable = [
        'sequence',
        'name',
        'url'
    ];

    /**
     * 取得連結列表
     * @param int $limit
     * @return mixed
     */
    public static function getLinkList($limit = 5)
    {
        return self::orderBy('sequence', 'asc')->limit($limit)->get();
    }

}
