use Illuminate\Support\Facades\Auth;
use App\Models\Mood;
use Carbon\Carbon;

class StreakController extends Controller
{
    public function show()
    {
        $userId = Auth::id();
        $dates = Mood::where('user_id', $userId)
                     ->orderByDesc('date')
                     ->pluck('date')
                     ->toArray();

        $streak = 0;
        $today = Carbon::today();

        foreach ($dates as $date) {
            if ($today->eq(Carbon::parse($date))) {
                $streak++;
                $today->subDay();
            } else {
                break;
            }
        }

        return view('dashboard', compact('streak'));
    }
}
