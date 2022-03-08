@extends('layouts.app')

@section('content')

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

        <h1 class="text-4xl mx-40 px-4 py-2 mt-5">Add New Data</h1>

        <form class=" d-flex flex-column content-center" action="{{ route('register') }}" method="POST">
            @csrf
            <fieldset class="text-1xl mx-40 px-4 py-4 mt-5 border-2 border-black grid grid-cols-2 gap-10">
                <legend>Company Identity</legend>

                <div>
                    <label for="">Group</label> <br>
                    <input class="w-full rounded-lg" type="text" name="group" id="">
                    @error('group')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Code</label> <br>
                    <input class="w-full rounded-lg" type="text" name="code" id="">
                    @error('code')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Name</label> <br>
                    <input class="w-full rounded-lg" type="text" name="name" id="">
                    @error('name')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Reviewer</label> <br>
                    <input class="w-full rounded-lg" type="text" name="email" id="">
                    @error('email')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="text-1xl mx-40 px-4 py-4 mt-5 border-2 border-black grid grid-cols-2 gap-10">
                <legend>Company Data</legend>

                <div>
                    <label for="">PP/PKB</label> <br>
                    <input class="w-full rounded-lg" type="text" name="pp_pkb" id="">
                    @error('pp_pkb')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Death/Karyawan Meninggal Dunia</label> <br>
                    <select class="w-full rounded-lg" name="death" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('death')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Valid Until</label> <br>
                    <input class="w-full rounded-lg" type="text" name="validuntil" id="">
                    @error('validuntil')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Disability</label> <br>
                    <select class="w-full rounded-lg" name="disability" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('disability')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">15% Compensation</label> <br>
                    <select class="w-full rounded-lg" name="compensation" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="No">No</option>
                        <option value="Mod">Mod</option>
                        <option value="Independent">Independent</option>
                    </select>
                    @error('compensation')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">(Faktor Lama Ke Faktor Baru) Untuk Manfaat Pensiun</label> <br>
                    <select class="w-full rounded-lg" name="pensiun_baru" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('pensiun_baru')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">SEV & SVC Factor</label> <br>
                    <select class="w-full rounded-lg" name="sev_svc" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="No">No</option>
                        <option value="Mod">Mod</option>
                        <option value="Independent">Independent</option>
                    </select>
                    @error('sev_svc')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">(Faktor Lama Ke Faktor Baru) Untuk Disability</label> <br>
                    <select class="w-full rounded-lg" name="disability_baru" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('disability_baru')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Offset Arrangement</label> <br>
                    <select class="w-full rounded-lg" name="offset" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('offset')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Offset - Tambahan Masa Pensiun</label> <br>
                    <select class="w-full rounded-lg" name="offset_pensiun" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                    @error('offset_pensiun')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Manfaat Pensiun</label> <br>
                    <select class="w-full rounded-lg" name="pensiun" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('pensiun')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Offset - Resign</label> <br>
                    <select class="w-full rounded-lg" name="offset_resign" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                    @error('offset_resign')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Tambahan Manfaat Pensiun</label> <br>
                    <select class="w-full rounded-lg" name="tambahan" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('tambahan')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Offset - Death</label> <br>
                    <select class="w-full rounded-lg" name="offset_death" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                    @error('offset_death')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Resign/Uang Pisah</label> <br>
                    <select class="w-full rounded-lg" name="resign" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    @error('resign')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Offset - Disability</label> <br>
                    <select class="w-full rounded-lg" name="offset_disability" id="">
                        <option disabled selected value="">Choose</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                    @error('offset_disability')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="text-1xl mx-40 px-4 py-4 mt-5 border-2 border-black">
                <legend>Action Plan</legend>

                <textarea name="action_plan" id="" class="w-full resize-none" rows="5" ></textarea>
            </fieldset>

            <div class="d-block text-center mt-5">
                <input class="px-5 py-2" type="submit" name="Submit" value="Save">
            </div>
        </form>

    </div>

@endsection