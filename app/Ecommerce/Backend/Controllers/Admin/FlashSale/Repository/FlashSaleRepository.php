<?php

namespace Ecommerce\Backend\Controllers\Admin\FlashSale\Repository;

use Ecommerce\Backend\Controllers\Admin\FlashSale\Interface\FlashSaleRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSale;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSaleItem;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;

class FlashSaleRepository implements FlashSaleRepositoryInterface
{
    public function getFlashSaleDate(): ?FlashSale
    {
        return FlashSale::first();
    }

    public function getApprovedProducts(): array
    {
        return Product::where('is_approved', 1)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
    }

    public function updateFlashSale(array $attributes): FlashSale
    {
        return FlashSale::updateOrCreate(['id' => 1], $attributes);
    }

    public function addProductToFlashSale(array $attributes): FlashSaleItem
    {
        return FlashSaleItem::create($attributes);
    }

    public function updateFlashSaleItemStatus(int $id, bool $status, string $field): void
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem->$field = $status ? 1 : 0;
        $flashSaleItem->save();
    }

    public function deleteFlashSaleItem(int $id): void
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem->delete();
    }
}
