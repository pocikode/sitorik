<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateUniqueSlugTrait
{
    public static function bootGenerateUniqueSlugTrait(): void
    {
        static::saving(function ($model) {
            $slug = $model->slug;
            $model->slug = $model->generateUniqueSlug($slug);
        });
    }

    public function generateUniqueSlug(string $slug): string
    {
        // Check if the slug already has a number at the end
        $originalSlug = $slug;
        $slugNumber = null;
        if (preg_match('/-(\d+)$/', $slug, $matches)) {
            $slugNumber = $matches[1];
            $slug = Str::replaceLast("-$slugNumber", '', $slug);
        }

        // Check if the modified slug already exists in the table
        $existingSlugs = $this->getExistingSlugs($slug, $originalSlug);

        if (!in_array($slug, $existingSlugs)) {
            // Slug is unique, no need to append numbers
            return $slug;
        }

        // Increment the number until a unique slug is found
        $i = $slugNumber ? ($slugNumber + 1) : 1;

        while (true) {
            $newSlug = $slug . '-' . $i;

            if (!in_array($newSlug, $existingSlugs)) {
                // Unique slug found
                return $newSlug;
            }

            $i++;
        }
    }

    private function getExistingSlugs(string $slug, string $originalSlug): array
    {
        return $this->newQuery()
            ->where(function ($query) use ($slug, $originalSlug) {
                $query->where('slug', 'LIKE', $slug . '%')
                    ->orWhere('slug', 'LIKE', $originalSlug . '%');
            })
            ->where('id', '!=', $this->id ?? null) // Exclude the current model's ID
            ->pluck('slug')
            ->toArray();
    }
}
