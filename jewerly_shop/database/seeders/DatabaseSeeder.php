<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('buyers')->insert([
            ['name' => 'Петров А. П.', 'phone' => '89207438964'],
            ['name' => 'Лобанов М. А.', 'phone' => '89807438354'],
            ['name' => 'Разин И. А.', 'phone' => '89603746583'],
            ['name' => 'Субботин М. А.', 'phone' => '89100923480'],
            ['name' => 'Могелёвский А. Т.', 'phone' => '84929375641'],
        ]);

        DB::table('types')->insert([
            ['title' => 'Кольцо'],
            ['title' => 'Браслет'],
            ['title' => 'Серьги'],
            ['title' => 'Цепочка'],
            ['title' => 'Подвеска'],
        ]);

        DB::table('products')->insert([
            ['title' => 'Вешнёвый сад', 'price' => '2000', 'type_id' => '2', 'discription' => 'Какое-то описание'],
            ['title' => 'Золотое кольцо', 'price' => '4000', 'type_id' => '1', 'discription' => 'Какое-то описание'],
            ['title' => 'Звезда Якутии', 'price' => '30000', 'type_id' => '5', 'discription' => 'Какое-то описание'],
            ['title' => 'Капли росы', 'price' => '12000', 'type_id' => '3', 'discription' => 'Какое-то описание'],
            ['title' => 'Золотое плетение', 'price' => '55000', 'type_id' => '4', 'discription' => 'Какое-то описание'],
        ]);


        DB::table('zakazs')->insert([
            ['buyer_id' => '1', 'product_id' => '1', 'amount' => '1', 'total_price' => '2000'],
            ['buyer_id' => '2', 'product_id' => '2', 'amount' => '2', 'total_price' => '8000'],
            ['buyer_id' => '3', 'product_id' => '3', 'amount' => '2', 'total_price' => '60000'],
            ['buyer_id' => '4', 'product_id' => '4', 'amount' => '1', 'total_price' => '12000'],
            ['buyer_id' => '5', 'product_id' => '5', 'amount' => '2', 'total_price' => '110000'],
        ]);
    }
}
