<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterGridThree\Interface;


use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Models\FooterGridThree;
use Ecommerce\Backend\Controllers\Admin\FooterGridTwo\Models\FooterTitle;

interface FooterGridThreeRepositoryInterface
{
    public function getFooterTitle(): ?FooterTitle;
    public function createFooter(array $data): FooterGridThree;
    public function findFooterById(string $id): ?FooterGridThree;
    public function updateFooter(string $id, array $data): FooterGridThree;
    public function deleteFooter(string $id): void;
    public function changeFooterStatus(string $id, bool $status): void;
    public function changeFooterTitle(array $data): FooterTitle;
}
