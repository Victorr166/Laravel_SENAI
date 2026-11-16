<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('veiculos', function(Blueprint $table){ $table->id(); $table->string('marca',100); $table->string('modelo',100); $table->string('placa',10)->unique(); $table->unsignedSmallInteger('ano'); $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete(); $table->timestamps(); }); }
 public function down(): void { Schema::dropIfExists('veiculos'); }
};
