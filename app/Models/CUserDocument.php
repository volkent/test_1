<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CUserDocument extends Pivot
{
    // Укажите имя таблицы, если оно отличается от имени модели в единственном числе и нижнем регистре
    protected $table = 'c_users_documents';

    // Укажите первичный ключ, если он отличается от 'id'
    protected $primaryKey = ['user_id', 'document_id'];

    // Укажите, следует ли первичный ключ автоинкрементировать, если это не так, установите значение false
    public $incrementing = false;

    // Укажите столбцы, которые можно массово заполнять
    protected $fillable = [];

    // Укажите столбцы, которые должны быть скрыты при преобразовании модели в массив или JSON
    protected $hidden = [];

    // Укажите столбцы, которые должны быть преобразованы в дату при преобразовании модели в массив или JSON
    protected $dates = [];

    // Укажите столбцы, которые должны быть преобразованы в дату-время при преобразовании модели в массив или JSON
    protected $dateFormat = '';
}
