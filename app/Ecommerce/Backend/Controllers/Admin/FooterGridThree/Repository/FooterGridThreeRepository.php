<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterGridThree\Repository;

use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Interface\FooterGridThreeRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Models\FooterGridThree;
use Ecommerce\Backend\Controllers\Admin\FooterGridTwo\Models\FooterTitle;
use Illuminate\Support\Facades\Cache;

class FooterGridThreeRepository implements FooterGridThreeRepositoryInterface
{
    public function getFooterTitle(): ?FooterTitle
    {
        return FooterTitle::first();
    }

    public function createFooter(array $data): FooterGridThree
    {
        $footer = new FooterGridThree();
        $footer->fill($data);
        $footer->save();

        Cache::forget('footer_grid_three');

        return $footer;
    }

    public function findFooterById(string $id): ?FooterGridThree
    {
        return FooterGridThree::findOrFail($id);
    }

    public function updateFooter(string $id, array $data): FooterGridThree
    {
        $footer = FooterGridThree::findOrFail($id);
        $footer->fill($data);
        $footer->save();

        Cache::forget('footer_grid_three');

        return $footer;
    }

    public function deleteFooter(string $id): void
    {
        $footer = FooterGridThree::findOrFail($id);
        $footer->delete();

        Cache::forget('footer_grid_three');
    }

    public function changeFooterStatus(string $id, bool $status): void
    {
        $footer = FooterGridThree::findOrFail($id);
        $footer->status = $status ? 1 : 0;
        $footer->save();

        Cache::forget('footer_grid_three');
    }

    public function changeFooterTitle(array $data): FooterTitle
    {
        $footerTitle = FooterTitle::updateOrCreate(
            ['id' => 1],
            ['footer_grid_three_title' => $data['title']]
        );

        return $footerTitle;
    }
}
