<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCUsersDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('c_users_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('document_id');
            $table->foreign('user_id')->references('id')->on('c_users')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('c_documents')->onDelete('cascade');
            $table->primary(['user_id', 'document_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_users_documents');
    }
}
