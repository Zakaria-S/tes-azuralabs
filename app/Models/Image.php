<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'book_id',
        'name'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function addImage($request, $book)
    {
        $image = $request->file('image');
        $book_id = $book->id;
        $image_upload_path = $image->store('books', 'public');
        $imageData = Image::create([
            'name' => basename($image_upload_path),
            'book_id' => $book_id
        ]);

        return $imageData;
    }

    public function updateImage($request, $book_id)
    {
        $image = $request->file('image');
        $old_image = Image::where('book_id', $book_id);
        $image_upload_path = $image->store('books', 'public');

        $new_image = $old_image->update([
            'name' => basename($image_upload_path)
        ]);
        Storage::delete('public/books/' . $old_image->first()->name);

        return $new_image;
    }

    public function deleteImage($book_id)
    {
        $image = Image::where('book_id', $book_id)->first();
        Storage::delete('public/books/' . $image->name);
        $image->delete();
        return $image;
    }
}
