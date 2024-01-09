<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitat;
use App\Models\Invitation;
use Illuminate\Http\RedirectResponse;

class GuestController extends Controller
{
    public function index()
    {
        $confirmations = Invitat::all();
        // calculez cati adulti vin la nunta (suma valorilor de pe coloana adults_number unde raspunsul = "da")
        
        $yesGuests = Invitat::where('confirmation', '=', 'da')->get();
        $adultsNumber = 0;
        $kidsNumber = 0;
       
        foreach ($yesGuests as $yesGuest) {
            $adultsNumber = $adultsNumber + $yesGuest->adults_number;
            $kidsNumber = $kidsNumber + $yesGuest->kids_number;
        }


        // cate familii au nevoie de cazare?
        $needAccomodationNumber = Invitat::where('confirmation', '=', 'da')->where('need_accommodation', '=', 1)->count();

        return view('confirmations', [
            'confirmations' => $confirmations,
            'adultsNumber' => $adultsNumber,
            'kidsNumber' => $kidsNumber,
            'needAccommodationNumber' => $needAccomodationNumber
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => ['required', 'integer', 'exists:invitations,cod'],
            'name' => ['required', 'string', 'max:2255'],
            'confirmation' => ['required', 'string'],
            'food_prefferences' => ['nullable', 'string'],
            'need_accomoodation' => ['nullable', 'boolean'],
            'adults_number' => ['required', 'integer', 'min:0'],
            'kids_number' => ['required', 'integer', 'min:0']
        ]);   

    // verific daca code e corect (adica daca exista in db)
    //  if (!Invitation::where('cod', '=', $request->code)->exists()) {
    //       return redirect('/dashboard');
    //  }

        $invitationId = Invitation::where('cod', '=', $request->code)->first()->id;

        // daca a mai completat, atunci suprascrie-i raspunsul !!
        // daca nu, fa raspuns nou !!

        $existingInvitation = Invitat::where('invitation_id', '=', $invitationId)->first();

        if ($existingInvitation) {
            // suprascriu raspunsul
           $existingInvitation->name = $request->name;
           $existingInvitation->confirmation = $request->confirmation;
           $existingInvitation->need_accommodation = $request->need_accommodation;
           $existingInvitation->food_prefferences = $request->food_prefferences;
           $existingInvitation->adults_number = $request->adults_number;
           $existingInvitation->kids_number = $request->kids_number;

           $existingInvitation->save();
        } else {
            $invitation = Invitat::create([
                'invitation_id' => $invitationId,
                'name' => $request->name,
                'need_accommodation' => $request->need_accommodation ?? false,
                'food_prefferences' => $request->food_preferences,
                'confirmation' => $request->confirmation,
                'adults_number' => $request->adults_number,
                'kids_number' => $request->kids_number
            ]);
        }
    
        return redirect('/dashboard');
    }
}
