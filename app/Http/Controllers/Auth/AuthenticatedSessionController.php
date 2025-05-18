<?php
namespace   App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session; // Import Session facade
class AuthenticatedSessionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        Session::flush();            // Clears all session data
            
        $request->session()->invalidate(); // Step 3: Invalidate session
        $request->session()->regenerateToken(); // Step 4: Regenerate CSRF token
        return Redirect::route('home')->with('success', 'Logged out successfully.');
    }
}
?>