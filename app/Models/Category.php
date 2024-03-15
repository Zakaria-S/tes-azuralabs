<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'category_name'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function addCategory($request)
    {
        $category = Category::create([
            'category_name' => $request->category_name
        ]);
        return $category;
    }

    public function updateCategory($request)
    {
        $category = $this->update([
            'category_name' => $request->category_name
        ]);
        return $category;
    }

    public function deleteCategory()
    {
        $books = $this->books;
        foreach ($books as $book) {
            $book->deleteBook();
        }
        return $this->delete();
    }
}
