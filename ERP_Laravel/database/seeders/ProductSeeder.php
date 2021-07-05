<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //desactiva el proceso de claves foraneas
        DB::table('products')->truncate(); //vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); //reactiva el proceso

        DB::table('products')->insert([
            'name' => 'Zapatillas Fresh Foam 1080 v11',
            'brand' => 'New Balance',
            'description' => 'Las zapatillas New Balance Fresh Foam 1080 v11 proporcionan un confort de lujo para largos recorridos.',
            'price' => 120,
            'image' => 'https://cdn.deporvillage.com/cdn-cgi/image/w=900,dpr=2,f=auto,q=75,fit=contain,background=white/product/nb-m1080r11_001.jpg',
            'sales' => true,
            'stock' => 112
        ]);
        DB::table('products')->insert([
            'name' => 'Zapatillas S/LAB ultra 3',
            'brand' => 'Salomon',
            'description' => 'Probada y preferida por algunos de los mejores corredores de ultra distancia, se ha pensado para brindarte rendimiento y comodidad en las distancias largas.',
            'price' => 180,
            'image' => 'https://www.salomon.com/es-es/shop-emea/media/catalog/product/l/4/l41266100_6s6lkpaor4rn4u0q.jpg',
            'sales' => false,
            'stock' => 78
        ]);
        DB::table('products')->insert([
            'name' => 'Botas Hedgehog Mid FutureLight',
            'brand' => 'North Face',
            'description' => 'La tecnología FutureLight desarrollada por The North Face es toda una revolución en cuanto a membranas impermeables.',
            'price' => 130,
            'image' => 'https://cdn.deporvillage.com/cdn-cgi/image/h=575,w=575,dpr=2,f=auto,q=75,fit=contain,background=white/product/tnf-nf0a52qvf9l_001.jpg',
            'sales' => true,
            'stock' => 94
        ]);
    }
}
