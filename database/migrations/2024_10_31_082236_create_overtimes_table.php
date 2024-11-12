<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Location;
use App\Models\Project;
return new class extends Migration
{
   //اضافه
    public function up(): void
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); 
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('project_id')->constrained('projects'); 
            $table->decimal('hours', 5, 2); 
            $table->date('date'); 
            $table->string('reason'); 
            $table->enum('status', ['accepted', 'rejected', 'under_review', 'pending'])->default('pending'); 
            $table->timestamps();
        });
    }



    //للحذف
    public function down(): void
    {
        Schema::dropIfExists('overtimes');
    }
};
