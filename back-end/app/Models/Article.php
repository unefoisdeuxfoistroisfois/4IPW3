<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Table imposée par l'énoncé
    protected $table = 't_article';

    //Clé primaire article
    protected $primaryKey = 'id_art';

    //Pas de created_at / updated_at dans cette base
    public $timestamps = false;

    //un article appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class, 'fk_category_art', 'id_cat');
    }
}
