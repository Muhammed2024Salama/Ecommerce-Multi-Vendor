<?php

namespace Ecommerce\Backend\Controllers\Admin\FlashSale\Interface;

use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSale;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSaleItem;

interface FlashSaleRepositoryInterface
{
    public function getFlashSaleDate(): ?FlashSale;
    public function getApprovedProducts(): array;
    public function updateFlashSale(array $attributes): FlashSale;
    public function addProductToFlashSale(array $attributes): FlashSaleItem;
    public function updateFlashSaleItemStatus(int $id, bool $status, string $field): void;
    public function deleteFlashSaleItem(int $id): void;
}
