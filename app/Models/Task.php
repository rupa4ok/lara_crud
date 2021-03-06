<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereUpdatedAt($value)
 */
class Task extends Model
{
    public function tasks()
    {
        return $this->belongsTo('App\Models\Task');
    }
    
    public static function getReffer()
    {
        $url = explode("/",$_SERVER["HTTP_REFERER"]);
        return $url['4'];
    }
}
