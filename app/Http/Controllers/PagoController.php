<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PagoController extends Controller
{
    public function pagar(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                'amount' => $request->monto,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Pago en mi tienda',
            ]);

            // Aquí puedes realizar acciones adicionales, como guardar el pago en la base de datos, enviar un correo electrónico de confirmación, etc.

            return redirect()->route('pago.exito')->with('success', 'Pago realizado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    
    public function comprarProductos()
    {
        return view('comprar_productos');
    }


    public function exito()
    {
        return view('pago.exito');
    }
}
