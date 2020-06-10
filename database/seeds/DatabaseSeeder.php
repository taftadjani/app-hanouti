<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Level 1
        $this->call(CategorySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(DeliveryModeSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(PrivilegeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(WarningTypeSeeder::class);

        // Level 2
        $this->call(CountrySeeder::class);
        $this->call(RolePrivilegeSeeder::class);

        // Level 3
        $this->call(CategorySubCategorySeeder::class);
        $this->call(CitySeeder::class);

        // Level 4
        $this->call(UserSeeder::class);

        // Level 5
        $this->call(AuthorSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(NewsletterSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(WarningSeeder::class);

        // Level 6
        $this->call(ModeleSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(StoreSeeder::class);

        // Level 7
        $this->call(FollowSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ProductStoreSeeder::class);

        // Level 8
        $this->call(BillSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(ProductStoreDetailSeeder::class);
        $this->call(ProductStoreModeleSeeder::class);
        $this->call(ProductStoreProviderSeeder::class);
        $this->call(ProductStoreSubCategorySeeder::class);
        $this->call(SeenSeeder::class);
        $this->call(StarSeeder::class);

        // Level 9
        $this->call(SubCommentSeeder::class);
        $this->call(CartDetailSeeder::class);







    }
}
