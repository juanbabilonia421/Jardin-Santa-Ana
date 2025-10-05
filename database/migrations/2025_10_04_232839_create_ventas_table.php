<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('producto'); // Nombre del producto (ej: "Camisa", "Cuaderno")
            $table->enum('categoria', ['Uniformes', 'Útiles Escolares']);
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('total', 10, 2);
            $table->date('fecha_venta')->default(now());
            $table->string('vendedor', 100)->nullable(); // Incluido directamente aquí
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
