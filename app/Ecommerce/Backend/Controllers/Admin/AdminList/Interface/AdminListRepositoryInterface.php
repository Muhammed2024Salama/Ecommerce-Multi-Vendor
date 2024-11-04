<?php

namespace Ecommerce\Backend\Controllers\Admin\AdminList\Interface;

use Ecommerce\Frontend\Models\User;

interface AdminListRepositoryInterface
{
    public function getUserById(int $id): User;
    public function updateUserStatus(User $user, string $status): void;
    public function deleteUser(User $user): void;
    public function getProductsByVendorId(int $vendorId): array;
    public function deleteVendorByUserId(int $userId): void;
}
