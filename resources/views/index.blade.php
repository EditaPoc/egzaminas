<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Užduotys') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <form action="{{ route ('tasks.indexOrder', ['status_id', 'ASC']) }}" method="post">
                    @csrf
                    <select name="name">
                  		
                   			<option value="1"> Vykdoma </option>
                   			<option value="2"> Užbaigta  </option>
                   			<option value="3"> Atidėta  </option>
                   		
                    </select>
                    <input type="submit" value="Filtruoti" class="btn btn-secondary btn-sm">
                 </form><br><br>
              
                    <table border="1" style="width: 100%" class="table">
                    <tr ml-4>
                    
                    <td><b>Užduotis</b></td>
                    <td><b>Aprašymas</b></td>
                    <td><b><a href="{{ route('tasks.indexOrder', ['add_date', $order])}}">Pradėti</a></b></td>
                    <td><b><a href="{{ route('tasks.indexOrder', ['completed_date', $order])}}">Baigti</a></b></td>
                     <td><b>Statusas</b></td>
                    <td><b>Veiksmai</b></td>
                    <td><b></b></td>
                    </tr>
                    @foreach($tasks as $task)
                    <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{!!$task->description !!}</td>
                    <td>{{ $task->add_date }}</td>
                    <td>{{ $task->completed_date }}</td>
                    <td>{{ $task->status->name}}</td>
            
                    <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Redaguoti</a>
                    </td>
                    <td>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                   
              		 <input type="submit" value="Ištrinti" class="btn btn-warning">
					</form>
                    </td>
                    </tr>
                    @endforeach
                    </table><br>
                   <br>
                     <a href="{{ route('tasks.create') }}" class="btn btn-secondary">Pridėti naują užduotį</a>
                </div>
            </div>
        </div>
    </div>

    

                    </div>
            </div>
        </div>
</x-app-layout>
