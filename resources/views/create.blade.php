<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nauja užduotis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                  <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                  </div>
                  @endif
                  
                   <form action="{{ route('tasks.store')}}" method="post">
                   @csrf
                  
                   <x-label :value="__( 'Užduotis:')"/>
                   <input type="text" name="task_name" :value="$task->task_name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  required >
                   
                   <x-label :value="__('Aprašymas:')"/>
                   <input type="text" name="description"  :value="$task->description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required  >
                   
                   <x-label :value="__('Pradėti:')"/>
                   <input type="text" name="add_date" :value="$task->add_date" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required  >
                   
                   <x-label :value="__('Baigti:')"/>
                   <input type="text" name="completed_date" :value="$task->completed_date" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  required >
                   
                   <x-label :value="__( 'Statusas:')"/>
                    <select name="status_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                  @foreach ($statuses as $status)
                   <option value="{{ $status->id }}"> {{ $status->name }}</option>
                   @endforeach
                   </select> 
                   
                   
                   
                   <div class="mt-4"> 
                   <x-button>Pridėti</x-button>
                   </div>
                     </form><br>
                     
                     <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Grįžti</a>
                  
                </div>
            </div>
        </div>
	</div>
</x-app-layout>
