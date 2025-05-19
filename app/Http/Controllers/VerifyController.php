<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Verify;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function index()
{
    $verify = Verify::with('account')
        ->where('action', 'notdone')
        ->get();

    return view('admin.verify.index', compact('verify'));
}


    public function approveverify(Request $request)
{
    $verifyId = $request->id;

    $verify = Verify::findOrFail($verifyId);
    $verify->action = 'done';
    $verify->save();

    $account = Account::findOrFail($verify->account_id);
    $account->verified = true;
    $account->save();

    return redirect()->back()->with('success', 'Verification approved successfully.');
}

public function declineverify(Request $request)
{
    $verifyId = $request->id;
    $verify = Verify::findOrFail($verifyId);
    $verify->delete();

return redirect()->back()->with('error', 'Verification declined and deleted.');
}
}
