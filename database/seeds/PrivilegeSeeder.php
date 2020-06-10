<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // mail
        DB::table('privileges')->insert([
            'name' => 'index-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-mail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-mail',
        ]);
        // phone
        DB::table('privileges')->insert([
            'name' => 'index-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-phone',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-phone',
        ]);
        // provider
        DB::table('privileges')->insert([
            'name' => 'index-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-provider',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-provider',
        ]);

        // warning-type
        DB::table('privileges')->insert([
            'name' => 'index-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-warning-type',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-warning-type',
        ]);

        // warning
        DB::table('privileges')->insert([
            'name' => 'index-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-warning',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-warning',
        ]);

        // sub-comment
        DB::table('privileges')->insert([
            'name' => 'index-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-sub-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-sub-comment',
        ]);

        // star
        DB::table('privileges')->insert([
            'name' => 'index-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-star',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-star',
        ]);

        // signinout
        DB::table('privileges')->insert([
            'name' => 'index-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-signinout',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-signinout',
        ]);

        // seen
        DB::table('privileges')->insert([
            'name' => 'index-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-seen',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-seen',
        ]);

        // poduct-store
        DB::table('privileges')->insert([
            'name' => 'index-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-poduct-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-poduct-store',
        ]);

        // poduct
        DB::table('privileges')->insert([
            'name' => 'index-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-poduct',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-poduct',
        ]);

        // post
        DB::table('privileges')->insert([
            'name' => 'index-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-post',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-post',
        ]);

        // payment
        DB::table('privileges')->insert([
            'name' => 'index-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-payment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-payment',
        ]);

        // payment-method
        DB::table('privileges')->insert([
            'name' => 'index-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-payment-method',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-payment-method',
        ]);

        // order
        DB::table('privileges')->insert([
            'name' => 'index-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-order',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-order',
        ]);

        // order-detail
        DB::table('privileges')->insert([
            'name' => 'index-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-order-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-order-detail',
        ]);

        // newsletter
        DB::table('privileges')->insert([
            'name' => 'index-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-newsletter',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-newsletter',
        ]);

        // message
        DB::table('privileges')->insert([
            'name' => 'index-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-message',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-message',
        ]);

        // location
        DB::table('privileges')->insert([
            'name' => 'index-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-location',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-location',
        ]);

        // language
        DB::table('privileges')->insert([
            'name' => 'index-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-language',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-language',
        ]);

        // follow
        DB::table('privileges')->insert([
            'name' => 'index-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-follow',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-follow',
        ]);

        // discount
        DB::table('privileges')->insert([
            'name' => 'index-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-discount',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-discount',
        ]);

        // delivery-mode
        DB::table('privileges')->insert([
            'name' => 'index-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-delivery-mode',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-delivery-mode',
        ]);

        // delivery
        DB::table('privileges')->insert([
            'name' => 'index-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-delivery',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-delivery',
        ]);

        // country
        DB::table('privileges')->insert([
            'name' => 'index-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-country',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-country',
        ]);

        // bill
        DB::table('privileges')->insert([
            'name' => 'index-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-bill',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-bill',
        ]);

        // comment
        DB::table('privileges')->insert([
            'name' => 'index-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-comment',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-comment',
        ]);

        // company
        DB::table('privileges')->insert([
            'name' => 'index-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-company',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-company',
        ]);

        // City
        DB::table('privileges')->insert([
            'name' => 'index-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-city',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-city',
        ]);

        // Store
        DB::table('privileges')->insert([
            'name' => 'index-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-store',
        ]);

        // Unit
        DB::table('privileges')->insert([
            'name' => 'index-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-unit',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-unit',
        ]);

        // category
        DB::table('privileges')->insert([
            'name' => 'index-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-category',
        ]);

        // condition
        DB::table('privileges')->insert([
            'name' => 'index-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-condition',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-condition',
        ]);

        // currency
        DB::table('privileges')->insert([
            'name' => 'index-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-currency',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-currency',
        ]);

        // modele
        DB::table('privileges')->insert([
            'name' => 'index-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-modele',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-modele',
        ]);

        // price
        DB::table('privileges')->insert([
            'name' => 'index-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-price',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-price',
        ]);

        // product
        DB::table('privileges')->insert([
            'name' => 'index-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-product',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-product',
        ]);

        // product-store
        DB::table('privileges')->insert([
            'name' => 'index-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-product-store',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-product-store',
        ]);

        // sub-category
        DB::table('privileges')->insert([
            'name' => 'index-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-sub-category',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-sub-category',
        ]);

        // cart
        DB::table('privileges')->insert([
            'name' => 'index-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'order-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'order-own-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'clear-own-cart',
        ]);
        DB::table('privileges')->insert([
            'name' => 'clear-cart',
        ]);

        // cart-detail
        DB::table('privileges')->insert([
            'name' => 'index-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-cart-detail',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-cart-detail',
        ]);

        // brand
        DB::table('privileges')->insert([
            'name' => 'index-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-brand',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-brand',
        ]);

        // author
        DB::table('privileges')->insert([
            'name' => 'index-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'show-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'create-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'update-own-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'delete-own-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'restore-own-author',
        ]);
        DB::table('privileges')->insert([
            'name' => 'force-delete-author',
        ]);

    }
}
