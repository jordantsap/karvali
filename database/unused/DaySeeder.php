<?php


use App\Models\unused\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daysOfWeek = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];

        foreach ($daysOfWeek as $dayName) {
            Day::create([
                'name' => $dayName,
                'is_open' => 'yes'
            ]);
        }
    }
}
