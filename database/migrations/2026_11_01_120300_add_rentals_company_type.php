<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        $exists = DB::table('company_type_translations')->where('slug', 'rentals')->exists();

        if ($exists) {
            return;
        }

        $now = now();
        $typeId = DB::table('company_types')->insertGetId([
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('company_type_translations')->insert([
            [
                'company_type_id' => $typeId,
                'locale' => 'en',
                'title' => 'Rentals',
                'slug' => 'rentals',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_type_id' => $typeId,
                'locale' => 'el',
                'title' => 'Ενοικιάσεις',
                'slug' => 'enoikiaseis',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down()
    {
        $typeIds = DB::table('company_type_translations')
            ->where('slug', 'rentals')
            ->pluck('company_type_id');

        if ($typeIds->isEmpty()) {
            return;
        }

        DB::table('company_type_translations')->whereIn('company_type_id', $typeIds)->delete();
        DB::table('company_types')->whereIn('id', $typeIds)->delete();
    }
};
