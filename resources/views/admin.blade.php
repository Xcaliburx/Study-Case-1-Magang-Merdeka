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
        </div>

        <div class="items-center">
            <h1 class="text-3xl mt-5">Company Data List</h1>

            <div class="flex flex-column mt-3">
                <a class="bg-gray-200 p-3 rounded" href="/admin/create/data">
                    Add new Data
                </a>

                <button class="mx-5 bg-gray-200 p-3 rounded">
                   Export to Excel
                </button>

            </div>

            <table class="table-fixed text-center border-2 mt-3">
                <thead>
                    <tr class="border-2">
                        <th>No</th>
                        <th class="w-1/6">Group</th>
                        <th class="w-1/6">Code</th>
                        <th class="w-1/4">Name</th>
                        <th class="w-1/4">Reviewer</th>
                        <th class="w-1/6">Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr class="border-2">
                        <td>{{ $loop->iteration }}</td>
                        <td> {{ $user->group }}</td>
                        <td> {{ $user->code }}</td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td> <a href="/admin/data/{{ $user->id }}">Detail</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
              {{ $users->links() }}
          </ul>
        </nav>
        </div>
    </div>

    <script>
        @if (Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
