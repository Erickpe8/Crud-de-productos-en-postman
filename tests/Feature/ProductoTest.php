<?php

namespace Tests\Feature;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_productos()
    {
        Producto::factory()->count(3)->create();

        $response = $this->getJson('/api/productos');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function puede_crear_un_producto()
    {
        $datos = [
            'nombre' => 'Teclado mecánico',
            'precio' => 250.00,
            'descripcion' => 'Teclado con retroiluminación RGB',
        ];

        $response = $this->postJson('/api/productos', $datos);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Teclado mecánico']);
    }

    /** @test */
    public function puede_mostrar_un_producto()
    {
        $producto = Producto::factory()->create();

        $response = $this->getJson("/api/productos/{$producto->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => $producto->nombre]);
    }

    /** @test */
    public function puede_actualizar_un_producto()
    {
        $producto = Producto::factory()->create();

        $nuevosDatos = [
            'nombre' => 'Mouse gamer',
            'precio' => 120.00,
            'descripcion' => 'Sensor óptico de alta precisión',
        ];

        $response = $this->putJson("/api/productos/{$producto->id}", $nuevosDatos);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => 'Mouse gamer']);
    }

    /** @test */
    public function puede_eliminar_un_producto()
    {
        $producto = Producto::factory()->create();

        $response = $this->deleteJson("/api/productos/{$producto->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['mensaje' => 'Producto eliminado correctamente']);
    }
}
