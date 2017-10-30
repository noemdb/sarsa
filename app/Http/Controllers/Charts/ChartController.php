<?php

namespace App\Http\Controllers\Charts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function getApiUserTaskLoad()
    {
        $days = Input::get('days', 7);
        $range = \Carbon\Carbon::now()->subDays($days);

        $stats = User::where('created_at', '>=', $range)
          ->groupBy('date')
          ->orderBy('date', 'DESC')
          ->remember(60)
          ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as value')
          ])
          ->toJSON();

        return $stats;
    }
}
