<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\WebVisit;
use Illuminate\Support\Facades\Cache;

class TrackWebVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya track method GET dan status code 200 pada halaman publik
        if ($request->isMethod('GET') && $response->getStatusCode() === 200) {
            $path = $request->path();

            // Hindari tracking admin, api, dan aset statis
            if (! $request->is('admin*') && ! $request->is('api*') && ! $request->is('up')) {
                $ip = $request->ip();
                $cacheKey = 'visit_' . md5($ip . '_' . $path);

                // Catat 1 kunjungan per IP per path per 5 menit untuk akurasi data kunjungan
                if (! Cache::has($cacheKey)) {
                    Cache::put($cacheKey, true, now()->addMinutes(5));

                    try {
                        WebVisit::create([
                            'ip_address' => $ip,
                            'user_agent' => substr((string) $request->userAgent(), 0, 500),
                            'url' => '/' . ltrim($path, '/'),
                            'visited_at' => now(),
                        ]);
                    } catch (\Throwable $e) {
                        // Jangan biarkan error tracking mengganggu user
                        report($e);
                    }
                }
            }
        }

        return $response;
    }
}
