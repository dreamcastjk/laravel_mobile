<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string|null $image
 * @property float $price *
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at *
 * @property int $new
 * @property int $hit
 * @property int $recommend
 * @property-read \App\Category $category *
 * @property-read mixed $price_for_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereHit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRecommend($value)
 */
class Product extends Model
{
    protected $guarded = ['id'];

    const LABEL_HIT = 'hit';
    const LABEL_NEW = 'new';
    const LABEL_RECOMMEND = 'recommend';

    public static $label_fields = [
        self::LABEL_HIT,
        self::LABEL_NEW,
        self::LABEL_RECOMMEND,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return float|int
     */
    function getPriceForCountAttribute()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    /**
     * @return bool
     */
    function isHit()
    {
        return $this->hit === 1;
    }

    /**
     * @return bool
     */
    function isNew()
    {
        return $this->new === 1;
    }

    /**
     * @return bool
     */
    function isRecommend()
    {
        return $this->recommend === 1;
    }
}
