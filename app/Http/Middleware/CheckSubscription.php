<?php

namespace App\Http\Middleware;

use App\Models\Subscription;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check() || (Auth::check() && Auth::user()->hasRole('super_admin'))) {
            return $next($request);
        }

        if (! Auth::check() || (Auth::check() && ! Auth::user()->hasRole('admin'))) {
            return $next($request);
        }

        $subscription = Subscription::with('subscriptionPlan')
            ->where('status', Subscription::ACTIVE)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$subscription) {
            return redirect()->route('subscription.pricing.plans.index');
        }

        if ($subscription->isExpired()) {
            return redirect()->route('subscription.pricing.plans.index');
        }

        return $next($request);
    }
}
