<?php

namespace Ecommerce\Backend\Controllers\Admin\CustomerList\Interface;

use Ecommerce\Frontend\Models\User;

interface CustomerListRepositoryInterface
{
    public function getUserById(int $id): User;
    public function updateUserStatus(User $user, string $status): void;
}
