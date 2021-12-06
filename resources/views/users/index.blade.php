<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vartotojai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
       
                    <table border="1" style="width: 100%" class="table">
                     <tr ml-4>
                    <td><b>Vartotojo vardas</b></td>
                    <td><b>Email</b></td>
                     <td><b>Veiksmai</b></td>
                      <td></td>
                    </tr>
                    @foreach ($users as $user)
                    <tr ml-4>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <a href="" class="btn btn-secondary">Redaguoti</a>
                      </td>
                      <td>
                      <a href="" class="btn btn-warning">Ištrinti</a>
                    </td>
                    </tr>
                    @endforeach
                    </table><br>
                 
                    <a href="" class="btn btn-secondary">Naujas vartotojas</a>
                     </div>
            </div>
        </div>
    </div>
    </x-app-layout>