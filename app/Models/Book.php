<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'publisher',
        'publication_date',
        'pages_number'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    public function getBooks($filter = null)
    {
        $books = $this->with('category');
        if ($filter !== null) {
            if ($filter->title !== null && $filter->title !== '') {
                $books->where('title', 'like', $filter->title);
            }
            if ($filter->category !== null && $filter->category !== '') {
                $books->whereRelation('category', 'category_name', $filter->category);
            }
        }
        return $books->get();
    }

    public function addBook($request)
    {
        $category = Category::where('category_name', $request->category)->first();
        $book = Book::create([
            'category_id' => $category->id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_date' => $request->publication_date,
            'pages_number' => $request->pages_number
        ]);
        if (!$book) {
            return $book;
        }
        $imageModel = new Image;
        $image = $imageModel->addImage($request, $book);
        if (!$image) {
            return $image;
        }
        return $book;
    }

    public function editBook($request)
    {
        if ($request->hasFile('image')) {
            $modelImage = new Image();
            $image = $modelImage->updateImage($request, $this->id);
            if (!$image) {
                return $image;
            }
        }
        $category = Category::where('category_name', $request->category)->first();
        $new_book = $this->update([
            'category_id' => $category->id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_date' => $request->publication_date,
            'pages_number' => $request->pages_number
        ]);
        return $new_book;
    }

    public function deleteBook()
    {
        $image = new Image;
        $image->deleteImage($this->id);
        $this->delete();
        return $this;
    }
}
