@extends('layouts.app')

@section('content')
    <style>
         /* Tab content - closed */
         .tab-content {
            max-height: 0;
            -webkit-transition: max-height .35s;
            -o-transition: max-height .35s;
            transition: max-height .35s;
         }

         /* :checked - resize to full height */
         .tab input:checked ~ .tab-content {
            max-height: 100vh;
         }

         /* Label formatting when open */
         .tab input:checked + label{
         /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
            font-size: 1.25rem; /*.text-xl*/
            padding: 1.25rem; /*.p-5*/
            border-left-width: 2px; /*.border-l-2*/
            border-color: #6574cd; /*.border-indigo*/
            background-color: #f8fafc; /*.bg-gray-100 */
            color: #6574cd; /*.text-indigo*/
         }

         /* Icon */
         .tab label::after {
            float:right;
            right: 0;
            top: 0;
            display: block;
            width: 1.5em;
            height: 1.5em;
            line-height: 1.5;
            font-size: 1.25rem;
            text-align: center;
            -webkit-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
         }

         /* Icon formatting - closed */
         .tab input[type=checkbox] + label::after {
            content: "+";
            font-weight:bold; /*.font-bold*/
            border-width: 1px; /*.border*/
            border-radius: 9999px; /*.rounded-full */
            border-color: #b8c2cc; /*.border-grey*/
         }

         .tab input[type=radio] + label::after {
            content: "\25BE";
            font-weight:bold; /*.font-bold*/
            border-width: 1px; /*.border*/
            border-radius: 9999px; /*.rounded-full */
            border-color: #b8c2cc; /*.border-grey*/
         }

         /* Icon formatting - open */
         .tab input[type=checkbox]:checked + label::after {
            transform: rotate(315deg);
            background-color: #6574cd; /*.bg-indigo*/
            color: #f8fafc; /*.text-grey-lightest*/
         }

         .tab input[type=radio]:checked + label::after {
            transform: rotateX(180deg);
            background-color: #6574cd; /*.bg-indigo*/
            color: #f8fafc; /*.text-grey-lightest*/
         }
      </style>

    <div class="flex flex-col justify-center py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            <div class="space-x-4">
                @auth
                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                >
                    Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                 @endauth
            </div>
            <a class="font-medium text-indigo-600" href="/admin/dashboard">Back</a>
        </div>

        <h1 class="text-4xl mx-40 px-4 py-2 mt-5">Company Data Detail</h1>

        <div class="text-1xl mx-40 px-4 py-2 mt-5 border-2 border-black">
            <div class="flex flex-column">
                <p class="w-36">Group</p>
                <p class="w-10">:</p>
                <p>{{ $user->group }}</p>
            </div>

            <div class="flex flex-column">
                <p class="w-36">Code</p>
                <p class="w-10">:</p>
                <p>{{ $user->code }}</p>
            </div>

            <div class="flex flex-column">
                <p class="w-36">Name</p>
                <p class="w-10">:</p>
                <p>{{ $user->name }}</p>
            </div>

            <div class="flex flex-column">
                <p class="w-36">Reviewer</p>
                <p class="w-10">:</p>
                <p>{{ $user->email }}</p>
            </div>

            <div class="flex flex-column align-items-end float-right">
                <a class="text-blue-900 text-bold" href="/admin/edit/data/{{ $user->user_id }}">Edit</a>
                <form action="{{ route('delete', $user->user_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="mx-7 text-blue-900 text-bold">Delete</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-1">
            <div class="w-full md:w-3/5 mx-auto p-8">
                <div class="shadow-md">
                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-one" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-one">PP/PPKB</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                            <p class="p-5">
                                PP/PKB : {{ $user->pp_pkb }} <br/>
                                Confirmation : {{ $user->pp_pkb_confirm }} <br>
                                Remarks : <br>
                                {{ $user->pp_pkb_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-two" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-two">VALID UNTIL</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                VALID UNTIl : {{ $user->validuntil }} <br/>
                                Confirmation : {{ $user->validuntil_confirm }} <br>
                                Remarks : <br>
                                {{ $user->validuntil_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-three" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-three">15% COMPENSATION</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                15% COMPENSATION : {{ $user->compensation }} <br/>
                                Confirmation : {{ $user->compensation_confirm }} <br>
                                Remarks (if mod) : <br>
                                {{ $user->compensation_remarks_mod }} <br>
                                Remarks (if client) : <br>
                                {{ $user->compensation_remarks_client }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-four" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-four">SEV & SVC FACTOR</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                SEV & SVC FACTOR : {{ $user->sev_svc }} <br/>
                                Confirmation : {{ $user->sev_svc_confirm }} <br>
                                Remarks (if mod) : <br>
                                {{ $user->sev_svc_remarks_mod }} <br>
                                Remarks (if client) : <br>
                                {{ $user->sev_svc_remarks_client }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-five" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-five">OFFSET ARRANGEMENT (ARTICULATED IN PP/PKB?)</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                OFFSET ARRANGEMENT : {{ $user->offset}} <br/>
                                Confirmation : {{ $user->offset_confirm }} <br>
                                Remarks : <br>
                                {{ $user->offset_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-six" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-six">MANFAAT PENSIUN</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                MANFAAT PENSIUN : {{ $user->pensiun }} <br/>
                                Confirmation : {{ $user->pensiun_confirm }} <br>
                                Remarks : <br>
                                {{ $user->pensiun_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-seven" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-seven">TAMBAHAN MANFAAT PENSIUN</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                TAMBAHAN MANFAAT PENSIUN : {{ $user->tambahan }} <br/>
                                Confirmation : {{ $user->tambahan_confirm }} <br>
                                Remarks : <br>
                                {{ $user->tambahan_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-eight" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-eight">RESIGN/UANG PISAH</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                RESIGN : {{ $user->resign }} <br/>
                                Confirmation : {{ $user->resign_confirm }} <br>
                                Remarks : <br>
                                {{ $user->resign_remarks }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-3/5 mx-auto p-8">
                <div class="shadow-md">
                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-one-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-one-2">DEATH/KARYAWAN MENINGGAL DUNIA</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                DEATH : {{ $user->death }} <br/>
                                Confirmation : {{ $user->death_confirm }} <br>
                                Remarks : <br>
                                {{ $user->death_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-two-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-two-2">DISABILITY</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                            <p class="p-5">
                                DISABILITY : {{ $user->disability }} <br/>
                                Confirmation : {{ $user->disability_confirm }} <br>
                                Remarks : <br>
                                {{ $user->disablity_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-three-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-three-2">(FAKTOR LAMA KE FAKTOR BARU) UNTUK MANFAAT PENSIUN</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                (FAKTOR LAMA KE FAKTOR BARU) UNTUK MANFAAT PENSIUN : {{ $user->pensiun_baru }} <br/>
                                Confirmation : {{ $user->pensiun_baru_confirm }} <br>
                                Remarks : <br>
                                {{ $user->pensiun_baru_remarks }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-four-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-four-2">(FAKTOR LAMA KE FAKTOR BARU) UNTUK DISABILITY</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                            (FAKTOR LAMA KE FAKTOR BARU) UNTUK DISABILITY : {{ $user->disability_baru }} <br/>
                                Confirmation : {{ $user->disability_baru_confirm }} <br>
                                Remarks : <br>
                                {{ $user->disablity_baru_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-five-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-five-2">OFFSET - TAMBAHAN MASA PENSIUN</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                OFFSET - TAMBAHAN MASA PENSIUN : {{ $user->offset_pensiun }} <br/>
                                Remarks : <br>
                                {{ $user->offset_pensiun_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-six-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-six-2">OFFSET - RESIGN</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                OFFSET - RESIGN : {{ $user->offset_resign }} <br/>
                                Remarks : <br>
                                {{ $user->offset_resign_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-seven-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-seven-2">OFFSET - DEATH</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                OFFSET - DEATH : {{ $user->offset_death }} <br/>
                                Remarks : <br>
                                {{ $user->offset_death_remarks }}
                            </p>
                        </div>
                    </div>

                    <div class="tab w-full overflow-hidden border-t">
                        <input class="absolute opacity-0" id="tab-single-eight-2" type="radio" name="tabs2">
                        <label class="block p-5 leading-normal cursor-pointer" for="tab-single-eight-2">OFFSET - DISABILITY</label>
                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">
                                OFFSET - DISABILITY : {{ $user->offset_disability }} <br/>
                                Remarks : <br>
                                {{ $user->offset_disability_remarks }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="text-1xl mx-40 px-4 py-2 mt-2 border-2 border-black">
         Action Plan : <br>
         {{ $user->action_plan }}
    </div>

    <script>
      /* Optional Javascript to close the radio button version by clicking it again */
      var myRadios = document.getElementsByName('tabs2');
      var setCheck;
      var x = 0;
      for(x = 0; x < myRadios.length; x++){
          myRadios[x].onclick = function(){
              if(setCheck != this){
                   setCheck = this;
              }else{
                  this.checked = false;
                  setCheck = null;
          }
          };
      }
   </script>

@endsection