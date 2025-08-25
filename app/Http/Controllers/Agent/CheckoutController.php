<?php

namespace App\Http\Controllers\Agent;

use Stripe;
use Stripe\Charge;
use App\Models\User;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PackageHistory;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    /**
     * price plan checkout
     */
    public function checkout($id, $package_name)
    {
        $plan = Pricing::where('id', $id)->first();
        return view('agent.pages.package.package-checkout', compact('plan'));
    }


    /**stirp checkout */
    public function stripecheckout(Request $request)
    {
        $plan = Pricing::where('id', $request->id)->first();
        return view('agent.pages.stripe.index', compact('plan'));
    }

    /**stirp payment */
    public function stripepayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        PackageHistory::create([
            'package_id'=>$request->package_id,
            'agent_id'=>Auth::id(),
        ]);

        User::where('id', Auth::id())->increment('credit', $request->property_count);


        // notification
        notyf()->success('Payment  successful!');
        return redirect()->route('agent.all.plan');
    }
}
