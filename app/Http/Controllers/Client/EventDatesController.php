<?php

namespace App\Http\Controllers\Client;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Storage;

class EventDatesController extends Controller
{
  public function pastevents()
  {
    $events = Event::with(['likes','comments'])->where('end_date', '<', Carbon::today())->orderBy('id', 'desc')->where('active',1)->paginate(10);
    return view('events.index', ['events' => $events])->with('success', 'Προηγούμενες Εκδηλώσεις');
  }

  public function todayevents()
  {
    $events = Event::with(['likes','comments'])
      ->whereDay('start_date', date('d'))->orderBy('start_date', 'asc')->where('active',1)->paginate(10);
    return view('events.index', ['events' => $events])->with('success', 'Σημερινές Εκδηλώσεις');
  }

  public function weekevents()
  {
    $events = Event::with(['likes','comments'])
      ->whereBetween('start_date', [Carbon::today(), Carbon::now()->endOfWeek()])->orderBy('date', 'asc')->where('active',1)->paginate(10);
    return view('events.index', ['events' => $events])->with('success', 'Εκδηλώσεις της εβδομάδας');
  }

  public function monthevents(Request $request, Event $event) //see again
  {
    $events = Event::with(['likes','comments'])
     ->whereBetween('start_date',[Carbon::today(), Carbon::today()->endOfMonth()])->orderBy('date', 'asc')->where('active',1)->paginate(10);
    return view('events.index', ['events' => $events])->with('success', 'Εκδηλώσεις του μήνα');
  }

  public function upcomingevents()
  {
    $events = Event::with(['likes','comments'])
      ->where('start_date', '>', Carbon::now())->orderBy('date', 'asc')->where('active',1)->paginate(10);
    return view('events.index', ['events' => $events])->with('success', 'Επόμενες Εκδηλώσεις');
  }
}
