<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $category_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{

  static $rules = [
    'category_id' => 'required',
    'name' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['category_id', 'name'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function category()
  {
    return $this->hasOne(Category::class, 'id', 'category_id');
  }
}
