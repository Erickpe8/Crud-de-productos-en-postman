<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Devuelve una lista con todos los productos.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Crea un nuevo producto a partir de los datos recibidos en la solicitud.
     *
     * @param \Illuminate\Http\Request $request Datos del producto (nombre, precio, descripción).
     * @return \App\Models\Producto
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        return Producto::create($request->all());
    }

    /**
     * Muestra los datos de un producto específico.
     *
     * @param int $id ID del producto a consultar.
     * @return \App\Models\Producto
     */
    public function show($id)
    {
        return Producto::findOrFail($id);
    }

    /**
     * Actualiza los datos de un producto específico.
     *
     * @param \Illuminate\Http\Request $request Nuevos datos del producto.
     * @param int $id ID del producto a actualizar.
     * @return \App\Models\Producto
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return $producto;
    }

    /**
     * Elimina un producto específico de la base de datos.
     *
     * @param int $id ID del producto a eliminar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(['mensaje' => 'Producto eliminado correctamente']);
    }
}
