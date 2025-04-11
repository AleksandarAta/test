<?php

use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(City::class , 'city_id');
            $table->foreignIdFor(Company::class , 'company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities_companies');
    }
};
