<?php

namespace Database\Seeders;
use App\Models\RolesModel;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolesModel::create(
            [
                'id'=> 1,
                'role_name' => 'Owner',
            ]);
        RolesModel::create(
            [
                'id'=> 2,
                'role_name' => 'Designer',
            ]);
        RolesModel::create(
            [
                'id'=>3,
                'role_name' => 'Production',
            ]);
        RolesModel::create(
            [
                'id'=> 4,
                'role_name' => 'Purchase',
            ]);
        RolesModel::create(
            [
                'id'=>5,
                'role_name' => 'Store',
            ]);
        RolesModel::create(
            [
                'id'=> 6,
                'role_name' => 'PO',
            ]);
        RolesModel::create(
            [
                'id'=> 7,
                'role_name' => 'HR',
            ]);
            RolesModel::create(
                [
                    'id'=> 111,
                    'role_name' => 'Super',
                ]);
    }
}
