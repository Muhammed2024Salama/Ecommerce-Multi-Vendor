<?php

namespace Ecommerce\Backend\Controllers\Admin\CustomerList\Repository;

use Ecommerce\Backend\Controllers\Admin\CustomerList\Interface\CustomerListRepositoryInterface;
use Ecommerce\Frontend\Models\User;

class CustomerListRepository implements CustomerListRepositoryInterface
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
}
