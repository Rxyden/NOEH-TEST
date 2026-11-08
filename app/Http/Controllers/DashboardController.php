<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Redirect authenticated users to their appropriate dashboard.
     */
    public function redirect(Request $request): RedirectResponse
    {
        $user = $request->user();

        $roleSlugs = $user->roles()->pluck('slug');

        // Central administrators
        if ($roleSlugs->contains(fn ($slug) => in_array($slug, [
            'super-admin',
            'system-administrator',
            'content-administrator',
            'verification-administrator',
        ]))) {
            return redirect()->route('admin.dashboard');
        }

        // Institution administrators and school staff
        if ($roleSlugs->contains(fn ($slug) => in_array($slug, [
            'institution-administrator',
            'school-staff',
        ]))) {
            return redirect()->route('institution.dashboard');
        }

        // Registered users
        if ($roleSlugs->contains('registered-user')) {
            return redirect()->route('user.dashboard');
        }

        // Accounts without an assigned role
        abort(403, 'Your account has no assigned NOEH role.');
    }
}
