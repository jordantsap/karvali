<?php

namespace App\Http\Controllers\Client;

use App\Group;
use App\GroupType;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
  public function index()
  {
    // $grouptypes = GroupType::all();
    $groups = Group::with(['category','likes','comments'])
    ->active()
    ->withTranslation()
    ->paginate(8);

      return view('groups.index', compact('groups'));
  }

  public function show($slug)
    {
      $group = Group::whereTranslation('slug', $slug)
      ->with(['category','likes','comments'])->firstOrFail();
      return view('groups.show', compact('group'));
    }

  public function category($slug)
    {
      $grouptype = GroupType::with('groups')
      ->whereTranslation('slug', $slug)
      ->withTranslation()
      ->first();

      $groups = $grouptype->groups()->with(['category','likes','comments'])->active()->paginate(8);
      return view('groups.category', compact('groups', 'grouptype'));
    }
}
