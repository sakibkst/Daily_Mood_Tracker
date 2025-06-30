use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MoodController extends Controller
{
    public function index(Request $request)
    {
        $query = Mood::where('user_id', Auth::id());

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $moods = $query->latest()->get();

        return view('moods.index', compact('moods'));
    }

    public function create()
    {
        return view('moods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $existing = Mood::where('user_id', Auth::id())
                        ->where('date', Carbon::today()->toDateString())
                        ->first();

        if ($existing) {
            return redirect()->back()->withErrors('Mood already logged for today.');
        }

        Mood::create([
            'user_id' => Auth::id(),
            'mood' => $request->mood,
            'note' => $request->note,
            'date' => Carbon::today()->toDateString(),
        ]);

        return redirect()->route('moods.index');
    }

    public function edit(Mood $mood)
    {
        $this->authorize('update', $mood);
        return view('moods.edit', compact('mood'));
    }

    public function update(Request $request, Mood $mood)
    {
        $this->authorize('update', $mood);

        $request->validate([
            'mood' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $mood->update($request->only('mood', 'note'));

        return redirect()->route('moods.index');
    }

    public function destroy(Mood $mood)
    {
        $this->authorize('delete', $mood);
        $mood->delete();
        return redirect()->route('moods.index');
    }

    public function restore($id)
    {
        $mood = Mood::withTrashed()->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $mood->restore();
        return redirect()->route('moods.index');
    }
}

