<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Data;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Illuminate\Support\Str;

class Register extends Component
{

    public function register(Request $request)
    {
        $request->validate([
            'group' => ['required'],
            'code' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'pp_pkb' => ['required'],
            'death' => ['required'],
            'validuntil' => ['required'],
            'disability' => ['required'],
            'compensation' => ['required'],
            'pensiun_baru' => ['required'],
            'sev_svc' => ['required'],
            'disability_baru' => ['required'],
            'offset' => ['required'],
            'offset_pensiun' => ['required'],
            'pensiun' => ['required'],
            'offset_resign' => ['required'],
            'tambahan' => ['required'],
            'offset_death' => ['required'],
            'resign' => ['required'],
            'offset_disability' => ['required'],
        ]);

        $password = Str::random(8);

        $user = User::create([
            'group' => $request->group,
            'code' => $request->code,
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($password),
            'role' => 'Member',
        ]);

        Data::create([
            'user_id' => $user->id,
            'pp_pkb' => $request->pp_pkb,
            'death' => $request->death,
            'validuntil' => $request->validuntil,
            'disability' => $request->disability,
            'compensation' => $request->compensation,
            'pensiun_baru' => $request->pensiun_baru,
            'sev_svc' => $request->sev_svc,
            'disability_baru' => $request->disability_baru,
            'offset' => $request->offset,
            'offset_pensiun' => $request->offset_pensiun,
            'pensiun' => $request->pensiun,
            'offset_resign' => $request->offset_resign,
            'tambahan' => $request->tambahan,
            'offset_death' => $request->offset_death,
            'resign' => $request->resign,
            'offset_disability' => $request->offset_disability,
            'action_plan' => $request->action_plan,
        ]);

        event(new Registered($user));

        return redirect()->route('index')->with('success','Data created successfully.');
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'group' => ['required'],
            'code' => ['required'],
            'name' => ['required'],
            'pp_pkb' => ['required'],
            'death' => ['required'],
            'validuntil' => ['required'],
            'disability' => ['required'],
            'compensation' => ['required'],
            'pensiun_baru' => ['required'],
            'sev_svc' => ['required'],
            'disability_baru' => ['required'],
            'offset' => ['required'],
            'offset_pensiun' => ['required'],
            'pensiun' => ['required'],
            'offset_resign' => ['required'],
            'tambahan' => ['required'],
            'offset_death' => ['required'],
            'resign' => ['required'],
            'offset_disability' => ['required'],
        ]);

        $password = Str::random(8);

        User::find($id)->update([
            'group' => $request->group,
            'code' => $request->code,
            'name' => $request->name,
        ]);

        Data::where('user_id', '=', $id)->update([
            'pp_pkb' => $request->pp_pkb,
            'death' => $request->death,
            'validuntil' => $request->validuntil,
            'disability' => $request->disability,
            'compensation' => $request->compensation,
            'pensiun_baru' => $request->pensiun_baru,
            'sev_svc' => $request->sev_svc,
            'disability_baru' => $request->disability_baru,
            'offset' => $request->offset,
            'offset_pensiun' => $request->offset_pensiun,
            'pensiun' => $request->pensiun,
            'offset_resign' => $request->offset_resign,
            'tambahan' => $request->tambahan,
            'offset_death' => $request->offset_death,
            'resign' => $request->resign,
            'offset_disability' => $request->offset_disability,
            'action_plan' => $request->action_plan,
        ]);

        return redirect()->route('index')->with('success','Data updated successfully.');
    }
}
