<?php

use App\Privilege;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_privilege')->insert([
            // Admin
            // warning-type
            [
                'privilege_id' => Privilege::where('name', 'index-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // warning
            [
                'privilege_id' => Privilege::where('name', 'index-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // sub-comment
            [
                'privilege_id' => Privilege::where('name', 'index-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // star
            [
                'privilege_id' => Privilege::where('name', 'index-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // signinout
            [
                'privilege_id' => Privilege::where('name', 'index-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // seen
            [
                'privilege_id' => Privilege::where('name', 'index-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // provider
            [
                'privilege_id' => Privilege::where('name', 'index-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // post
            [
                'privilege_id' => Privilege::where('name', 'index-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // phone
            [
                'privilege_id' => Privilege::where('name', 'index-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // payment-method
            [
                'privilege_id' => Privilege::where('name', 'index-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // payment
            [
                'privilege_id' => Privilege::where('name', 'index-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // order-detail
            [
                'privilege_id' => Privilege::where('name', 'index-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // order
            [
                'privilege_id' => Privilege::where('name', 'index-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // newsletter
            [
                'privilege_id' => Privilege::where('name', 'index-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // message
            [
                'privilege_id' => Privilege::where('name', 'index-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // mail
            [
                'privilege_id' => Privilege::where('name', 'index-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // location
            [
                'privilege_id' => Privilege::where('name', 'index-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // language
            [
                'privilege_id' => Privilege::where('name', 'index-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // follow
            [
                'privilege_id' => Privilege::where('name', 'index-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // discount
            [
                'privilege_id' => Privilege::where('name', 'index-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // delivery-mode
            [
                'privilege_id' => Privilege::where('name', 'index-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // delivery
            [
                'privilege_id' => Privilege::where('name', 'index-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // country
            [
                'privilege_id' => Privilege::where('name', 'index-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // comment
            [
                'privilege_id' => Privilege::where('name', 'index-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // bill
            [
                'privilege_id' => Privilege::where('name', 'index-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // ---------------------------------------

            // company
            [
                'privilege_id' => Privilege::where('name', 'index-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // city
            [
                'privilege_id' => Privilege::where('name', 'index-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // store
            [
                'privilege_id' => Privilege::where('name', 'index-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // unit
            [
                'privilege_id' => Privilege::where('name', 'index-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // category
            [
                'privilege_id' => Privilege::where('name', 'index-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // condition
            [
                'privilege_id' => Privilege::where('name', 'index-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // currency
            [
                'privilege_id' => Privilege::where('name', 'index-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // modele
            [
                'privilege_id' => Privilege::where('name', 'index-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // price
            [
                'privilege_id' => Privilege::where('name', 'index-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // product
            [
                'privilege_id' => Privilege::where('name', 'index-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // product-store
            [
                'privilege_id' => Privilege::where('name', 'index-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // sub-category
            [
                'privilege_id' => Privilege::where('name', 'index-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // cart
            [
                'privilege_id' => Privilege::where('name', 'index-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'clear-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'clear-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'order-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'order-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // cart-detail
            [
                'privilege_id' => Privilege::where('name', 'index-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // brand
            [
                'privilege_id' => Privilege::where('name', 'index-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // author
            [
                'privilege_id' => Privilege::where('name', 'index-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'force-delete-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_ADMIN')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Seller

            [
                'privilege_id' => Privilege::where('name', 'clear-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'order-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // warning-type
            [
                'privilege_id' => Privilege::where('name', 'index-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // warning
            [
                'privilege_id' => Privilege::where('name', 'index-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // sub-comment
            [
                'privilege_id' => Privilege::where('name', 'index-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // star
            [
                'privilege_id' => Privilege::where('name', 'index-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // signinout
            [
                'privilege_id' => Privilege::where('name', 'index-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // seen
            [
                'privilege_id' => Privilege::where('name', 'index-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // provider
            [
                'privilege_id' => Privilege::where('name', 'index-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // post
            [
                'privilege_id' => Privilege::where('name', 'index-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // phone
            [
                'privilege_id' => Privilege::where('name', 'index-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // payment-method
            [
                'privilege_id' => Privilege::where('name', 'index-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // payment
            [
                'privilege_id' => Privilege::where('name', 'index-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // order-detail
            [
                'privilege_id' => Privilege::where('name', 'index-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // order
            [
                'privilege_id' => Privilege::where('name', 'index-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // newsletter
            [
                'privilege_id' => Privilege::where('name', 'index-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // message
            [
                'privilege_id' => Privilege::where('name', 'index-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // mail
            [
                'privilege_id' => Privilege::where('name', 'index-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // location
            [
                'privilege_id' => Privilege::where('name', 'index-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // language
            [
                'privilege_id' => Privilege::where('name', 'index-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // follow
            [
                'privilege_id' => Privilege::where('name', 'index-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // discount
            [
                'privilege_id' => Privilege::where('name', 'index-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // delivery-mode
            [
                'privilege_id' => Privilege::where('name', 'index-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // delivery
            [
                'privilege_id' => Privilege::where('name', 'index-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // country
            [
                'privilege_id' => Privilege::where('name', 'index-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // comment
            [
                'privilege_id' => Privilege::where('name', 'index-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // bill
            [
                'privilege_id' => Privilege::where('name', 'index-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // ---------------------------------------


            // company
            [
                'privilege_id' => Privilege::where('name', 'index-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // city
            [
                'privilege_id' => Privilege::where('name', 'index-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // store
            [
                'privilege_id' => Privilege::where('name', 'index-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // unit
            [
                'privilege_id' => Privilege::where('name', 'index-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // category
            [
                'privilege_id' => Privilege::where('name', 'index-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // condition
            [
                'privilege_id' => Privilege::where('name', 'index-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // currency
            [
                'privilege_id' => Privilege::where('name', 'index-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // modele
            [
                'privilege_id' => Privilege::where('name', 'index-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // price
            [
                'privilege_id' => Privilege::where('name', 'index-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // product
            [
                'privilege_id' => Privilege::where('name', 'index-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // product-store
            [
                'privilege_id' => Privilege::where('name', 'index-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // sub-category
            [
                'privilege_id' => Privilege::where('name', 'index-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // cart
            [
                'privilege_id' => Privilege::where('name', 'index-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // cart-detail
            [
                'privilege_id' => Privilege::where('name', 'index-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // brand
            [
                'privilege_id' => Privilege::where('name', 'index-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // author
            [
                'privilege_id' => Privilege::where('name', 'index-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_SELLER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // Customer
            [
                'privilege_id' => Privilege::where('name', 'clear-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'order-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // company
            [
                'privilege_id' => Privilege::where('name', 'index-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-company')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // city
            [
                'privilege_id' => Privilege::where('name', 'index-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-city')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // store
            [
                'privilege_id' => Privilege::where('name', 'index-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // unit
            [
                'privilege_id' => Privilege::where('name', 'index-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-unit')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // category
            [
                'privilege_id' => Privilege::where('name', 'index-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // condition
            [
                'privilege_id' => Privilege::where('name', 'index-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-condition')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // currency
            [
                'privilege_id' => Privilege::where('name', 'index-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-currency')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // modele
            [
                'privilege_id' => Privilege::where('name', 'index-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-modele')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // price
            [
                'privilege_id' => Privilege::where('name', 'index-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-price')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // product
            [
                'privilege_id' => Privilege::where('name', 'index-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-product')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // product-store
            [
                'privilege_id' => Privilege::where('name', 'index-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-product-store')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // sub-category
            [
                'privilege_id' => Privilege::where('name', 'index-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-sub-category')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // cart
            [
                'privilege_id' => Privilege::where('name', 'index-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-cart')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // cart-detail
            [
                'privilege_id' => Privilege::where('name', 'index-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-cart-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // brand
            [
                'privilege_id' => Privilege::where('name', 'index-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-brand')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // author
            [
                'privilege_id' => Privilege::where('name', 'index-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-author')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],


            // warning-type
            [
                'privilege_id' => Privilege::where('name', 'index-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-warning-type')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // warning
            [
                'privilege_id' => Privilege::where('name', 'index-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-warning')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // sub-comment
            [
                'privilege_id' => Privilege::where('name', 'index-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-sub-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // star
            [
                'privilege_id' => Privilege::where('name', 'index-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-star')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // signinout
            [
                'privilege_id' => Privilege::where('name', 'index-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-signinout')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // seen
            [
                'privilege_id' => Privilege::where('name', 'index-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-seen')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // provider
            [
                'privilege_id' => Privilege::where('name', 'index-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-provider')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // post
            [
                'privilege_id' => Privilege::where('name', 'index-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-post')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // phone
            [
                'privilege_id' => Privilege::where('name', 'index-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-phone')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // payment-method
            [
                'privilege_id' => Privilege::where('name', 'index-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-payment-method')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // payment
            [
                'privilege_id' => Privilege::where('name', 'index-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-payment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // order-detail
            [
                'privilege_id' => Privilege::where('name', 'index-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-order-detail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // order
            [
                'privilege_id' => Privilege::where('name', 'index-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-order')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // newsletter
            [
                'privilege_id' => Privilege::where('name', 'index-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-newsletter')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // message
            [
                'privilege_id' => Privilege::where('name', 'index-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-message')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // mail
            [
                'privilege_id' => Privilege::where('name', 'index-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-mail')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // location
            [
                'privilege_id' => Privilege::where('name', 'index-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-location')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // language
            [
                'privilege_id' => Privilege::where('name', 'index-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-language')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // follow
            [
                'privilege_id' => Privilege::where('name', 'index-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-follow')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // discount
            [
                'privilege_id' => Privilege::where('name', 'index-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-discount')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // delivery-mode
            [
                'privilege_id' => Privilege::where('name', 'index-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-delivery-mode')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // delivery
            [
                'privilege_id' => Privilege::where('name', 'index-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-delivery')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // country
            [
                'privilege_id' => Privilege::where('name', 'index-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-country')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // comment
            [
                'privilege_id' => Privilege::where('name', 'index-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'create-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'update-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'delete-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'restore-own-comment')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // bill
            [
                'privilege_id' => Privilege::where('name', 'index-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'privilege_id' => Privilege::where('name', 'show-bill')->first()->id,
                'role_id' => Role::where('reference', 'HANOUTI_APP_CUSTOMER')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // ---------------------------------------

        ]);
    }
}
