<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Смартфон Galaxy S23 Ultra', 'price' => 1299.99],
            ['name' => 'Ноутбук Dell XPS 13', 'price' => 1499.99],
            ['name' => 'Телевизор Samsung QLED 55"', 'price' => 999.99],
            ['name' => 'Умные часы Apple Watch Series 8', 'price' => 399.99],
            ['name' => 'Беспроводные наушники Sony WH-1000XM4', 'price' => 349.99],
            ['name' => 'Камера Canon EOS R5', 'price' => 3899.99],
            ['name' => 'Геймпад Xbox Series X', 'price' => 59.99],
            ['name' => 'Кофеварка DeLonghi Magnifica', 'price' => 699.99],
            ['name' => 'Холодильник Bosch Serie 4', 'price' => 799.99],
            ['name' => 'Планшет Apple iPad Air', 'price' => 599.99],
            ['name' => 'Видеокарта NVIDIA GeForce RTX 3080', 'price' => 799.99],
            ['name' => 'Робот-пылесос Xiaomi Roborock S6', 'price' => 399.99],
            ['name' => 'Электросамокат Ninebot Max', 'price' => 799.99],
            ['name' => 'Парфюм Dior Sauvage', 'price' => 119.99],
            ['name' => 'Лампочка Philips Hue', 'price' => 49.99],
            ['name' => 'Игровой ноутбук ASUS ROG Zephyrus', 'price' => 1699.99],
            ['name' => 'Чайник Bosch TWK8611P', 'price' => 79.99],
            ['name' => 'Смартфон iPhone 14 Pro', 'price' => 1099.99],
            ['name' => 'Камера GoPro HERO10', 'price' => 499.99],
            ['name' => 'Смарт-гидрометр Xiaomi', 'price' => 29.99],
            ['name' => 'Клавиатура Logitech MX Keys', 'price' => 129.99],
            ['name' => 'Внешний жесткий диск WD My Passport', 'price' => 89.99],
            ['name' => 'Проектор Epson Home Cinema', 'price' => 799.99],
            ['name' => 'Микроволновая печь Samsung MS23K3513AK', 'price' => 119.99],
            ['name' => 'Блендер Vitamix 5200', 'price' => 549.99],
            ['name' => 'Пылесос Dyson V11', 'price' => 599.99],
            ['name' => 'Термокружка Contigo Autoseal', 'price' => 29.99],
            ['name' => 'Распечатчик Fujifilm Instax Mini', 'price' => 99.99],
            ['name' => 'Сушилка для белья Brabantia', 'price' => 119.99],
            ['name' => 'Смарт-колонка Google Nest Hub', 'price' => 129.99],
            ['name' => 'Светодиодная лампа Nanoleaf', 'price' => 199.99],
            ['name' => 'Панельный обогреватель Delonghi', 'price' => 159.99],
            ['name' => 'Проводные наушники Bose QuietComfort 25', 'price' => 179.99],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'price' => $product['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
