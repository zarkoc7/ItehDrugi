<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::Truncate();
        Product::Truncate();
        Category::Truncate();
        Manufacturer::Truncate();


         $user =User::factory(4)->create();

         $u5 = User::create([
            'name'=>'Zarko',
            'email'=>'zarkoc@gmail.com',
            'password'=>bcrypt('sifra')
        ]);

        
        $u6 = User::create([
            'name'=>'Marko',
            'email'=>'markom@gmail.com',
            'password'=>bcrypt('sifra')
        ]);

        $u7 = User::create([
            'name'=>'Darko',
            'email'=>'darkom@gmail.com',
            'password'=>bcrypt('sifra')
        ]);

        $c1 = Category::create([
            'name'=>'High-end',
            'description'=>'roba visokog kvaliteta'
        ]);
        $c2 = Category::create([
            'name'=>'Prosecna',
            'description'=>'roba prosecnog kvaliteta'
        ]);

        $c3 = Category::create([
            'name'=>'low-end',
            'description'=>'roba niskog kvaliteta'
        ]);

        $b1 = Manufacturer::create([
            'name'=>'Rolex',
            'country'=> 'Svajcarska',
            'category_id'=>$c1->id
        ]);

        $b2 = Manufacturer::create([
            'name'=>'Casio',
            'country'=> 'Japan',
            'category_id'=>$c2->id
        ]);

        $b3 = Manufacturer::create([
            'name'=>'Daniel Klein',
            'country'=> 'Ceska',
            'category_id'=>$c3->id
        ]);

        $p1 = Product::create([
            'product_name'=>'Rolex submariner',
            'description'=> 'automatski, mehanicki, samonavijajuci, oyster 41mm',
            'price'=>10200,
            'manufacturer_id'=>$b1->id,
            'user_id'=>$u5->id
        ]);

        $p1 = Product::create([
            'product_name'=>'Casio edifice',
            'description'=> 'Celik, rucni sat, 51mm',
            'price'=>200,
            'manufacturer_id'=>$b2->id,
            'user_id'=>$u6->id
        ]);

        $p1 = Product::create([
            'product_name'=>'Daniel clein classic',
            'description'=> 'metal, 45mm, mineralni kristal',
            'price'=>50,
            'manufacturer_id'=>$b3->id,
            'user_id'=>$u7->id
        ]);












      
    }
}
