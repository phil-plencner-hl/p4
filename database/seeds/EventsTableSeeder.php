<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of event data to add
        $events = [
            ["Independence Day", 07, 04, 2019,1],
            ["Chistmas Eve", 12, 24, 2019,1],
            ["Super Bowl", 02, 02, 2020,2],
            ["Dentist Appointment", 06, 25, 2019,3],
            ["Phil's Birthday", 05, 10, 2019,1]
        ];
        $count = count($events);

        # Loop through each event, adding them to the database
        foreach ($events as $eventData) {
            $event = new Event();

            $event->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $event->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $event->name = $eventData[0];
            $event->month = $eventData[1];
            $event->day = $eventData[2];
            $event->year = $eventData[3];
            $event->type_id = $eventData[4];

            $event->save();

            $count--;
        }
    }
}
