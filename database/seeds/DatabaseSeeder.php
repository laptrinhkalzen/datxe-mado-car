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
         // $this->call(UserTableSeeder::class);
         // $this->call(RoleTableSeeder::class);
         //$this->call(AttributeTableSeeder::class);
         // $this->call(CarTableSeeder::class);
         // $this->call(CategoryTableSeeder::class);
         // $this->call(CompanyTableSeeder::class);
         // $this->call(DriveTableSeeder::class);
         $this->call(ExpertTableSeeder::class);
         // $this->call(ManufacturerTableSeeder::class);
         // $this->call(MemberTableSeeder::class);
         // $this->call(NewsCategoryTableSeeder::class);
         // $this->call(NewsTableSeeder::class);
         // $this->call(PaymentTableSeeder::class);
         // $this->call(PlaceTableSeeder::class);
         // $this->call(ProductAttribiteTableSeeder::class);
         // $this->call(ProductCategoryTableSeeder::class);
         // $this->call(RankTableSeeder::class);
         // $this->call(ReviewTableSeeder::class);
         // $this->call(TripHistoryTableSeeder::class);
         // $this->call(TripTableSeeder::class);
         
    }
}
