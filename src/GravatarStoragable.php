<?php

namespace Andriymiz\Gravatar;

use Illuminate\Support\Facades\Storage;

class GravatarStoragable extends Gravatar
{
    /**
     * TODO: Add getting url from local stored file
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getStoragableImageSrc();
    }

    /**
     * 
     * @return string 
     */
    private function getFileName(): string
    {
        return strtr(config('gravatar.storage.file_name'), [
            '{size}' => $this->size,
            '{hash}' => $this->hash,
            '{ext}' => $this->ext,
        ]);
    }

    /**
     * 
     * @return string 
     */
    private function getStoragableImageSrc(): string
    {
        $disk = Storage::disk(config('gravatar.storage.disk_name'));
        $fileName = $this->getFileName();
        if (! $disk->exists($fileName)) {
            $this->storeImage($this->getGravatarImageSrc(), $fileName);
        }

        return $disk->url($fileName);
    }

    /**
     * @return void
     */
    private function storeImage($src, $name): void
    {
        $disk = Storage::disk(config('gravatar.storage.disk_name'));
        $contents = file_get_contents($src);
        $disk->put($name, $contents);
    }
}