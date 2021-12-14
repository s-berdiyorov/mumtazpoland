<?php

namespace App\Models\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImage
{
    /**
     * Upload file and generate file name
     *
     * @param UploadedFile|null $image
     * @return void
     */
    public function setImageAttribute(UploadedFile|null $image): void
    {
        if (!$image) return;

        $this->deleteImage();
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();

        $this->attributes[$this->getImageAttributeName()] = $filename;
        $image->storeAs($this->getImagePath(), $filename, 'public');

    }

    /**
     * Get image path as attribute
     *
     * @return string
     */
    public function getImagePathAttribute(): string
    {
        if ($this->getAttribute('image')) {
            return '/storage' . $this->getImagePath() . $this->getAttribute('image');
        }

        return '/images/default-product.jpg';
    }

    /**
     * Delete unnecessary files
     *
     * @return void
     */
    public function deleteImage(): void
    {
        if (!is_null($this->getAttribute('image'))) {
            Storage::disk('public')->delete($this->getImagePath() . $this->getAttribute('image'));
        }
    }

    /**
     * Get image path to upload
     *
     * @return string
     */
    public function getImagePath(): string
    {
        return '/uploads/' . $this->getTable() . '/';
    }

    /**
     * Get image attribute name
     *
     * @return string
     */
    public function getImageAttributeName(): string
    {
        return $this->imageAttribute ?? 'image';
    }
}
