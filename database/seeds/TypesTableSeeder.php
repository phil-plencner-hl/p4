<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of event type data to add
        $types = [
            ['Holiday'],
            ['Sports'],
            ['Appointment']
        ];
        $count = count($types);

        # Loop through each event type, adding them to the database
        foreach ($types as $typeData) {
            $type = new Type();

            $type->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $type->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $type->type = $typeData[0];

            $type->save();

            $count--;
        }
    }
}
