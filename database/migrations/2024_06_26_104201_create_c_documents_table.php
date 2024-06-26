<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('c_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->dateTime('created_at')->default(DB::raw('GETDATE()')); // Использование функции GETDATE()
            $table->dateTime('updated_at')->default(DB::raw('GETDATE()'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_documents');
    }
}
