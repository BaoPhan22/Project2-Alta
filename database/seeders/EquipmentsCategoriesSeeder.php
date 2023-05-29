<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\EquipmentCategories;

class EquipmentsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['equipments_categories_id' => 1, 'name' => 'Kiosk'], ['equipments_categories_id' => 2, 'name' => 'Display counter']];

        foreach ($data as $item) {
            EquipmentCategories::create($item);
        }
    }
}
