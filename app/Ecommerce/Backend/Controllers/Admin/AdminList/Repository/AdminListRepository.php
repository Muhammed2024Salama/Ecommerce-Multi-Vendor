<?php

namespace Ecommerce\Backend\Controllers\Admin\AdminList\Repository;


use Ecommerce\Backend\Controllers\Admin\AdminList\Interface\AdminListRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Vendor\Models\Vendor;
use Ecommerce\Frontend\Models\User;

class AdminListRepository implements AdminListRepositoryInterface
{
    public function getUserById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function updateUserStatus(User $user, string $status): void
    {
        $user->status = $status == 'true' ? 'active' : 'inactive';
        $user->save();
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }

    public function getProductsByVendorId(int $vendorId): array
    {
        return Product::where('vendor_id', $vendorId)->get()->toArray();
    }

    public function deleteVendorByUserId(int $userId): void
    {
        Vendor::where('user_id', $userId)->delete();
    }
}
