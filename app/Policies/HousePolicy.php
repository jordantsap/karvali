<?php

namespace App\Policies;

use App\Models\House;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HousePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, House $house): bool
    {
        return $this->owns($user, $house);
    }

    public function create(User $user): bool
    {
        return $user->companies()->rentalCompanies()->exists();
    }

    public function update(User $user, House $house): bool
    {
        return $this->owns($user, $house);
    }

    public function delete(User $user, House $house): bool
    {
        return $this->owns($user, $house);
    }

    private function owns(User $user, House $house): bool
    {
        return (int) $house->company->user_id === (int) $user->id;
    }
}
