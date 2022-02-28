@extends('layouts.mainapp')

@section('content')
<div class="main-content">


  <form action="../{{ $car->id }}" method="POST">
    @method('PUT')
    @csrf

    <div class="-6">
        <label class="block  text-xs font-bold text-gray-700 uppercase"
               for="plate">
            {{ __('Plate') }}
        </label>
        <input class="w-full border border-gray-400 rounded"
               type="text"
               id="plate"
               name="plate"
               value="{{ $car->plate }}"
               required>
    </div>

    <div>
      <label for="color">Color</label>
      <input type="color" id="color" name="color"
             value={{ $car->color }}
             class="m-3">
     
    </div>

    <div class="-6">
      <label class="block  text-xs font-bold text-gray-700 uppercase"
             for="year">
          {{ __('Year') }}
      </label>
      <input class="w-full border border-gray-400 rounded"
             type="number"
             id="year"
             name="year"
             value="{{ $car->year }}"
             required>
    </div>

    <div class="-6">
      <label class="block  text-xs font-bold text-gray-700 uppercase"
             for="kms">
          {{ __('Kms') }}
      </label>
      <input class="w-full border border-gray-400 rounded"
             type="number"
             id="kms"
             name="kms"
             value="{{ $car->kms }}"
             required>
    </div>

    <div class="-6">
      <label class="block  text-xs font-bold text-gray-700 uppercase"
             for="value">
          {{ __('Value') }}
      </label>
      <input class="w-full border border-gray-400 rounded"
             type="number"
             id="value"
             name="value"
             value="{{ $car->value }}"
             required>
    </div>

    <div class="-6">
      <label class="block  text-xs font-bold text-gray-700 uppercase"
             for="last_rev">
          {{ __('Last Revision') }}
      </label>
      <input class="w-full border border-gray-400 rounded"
             type="number"
             id="last_rev"
             name="last_rev"
             value="{{ $car->last_revision }}"
             required>
    </div>

    <div class="-6">
      <label class="block  text-xs font-bold text-gray-700 uppercase"
             for="next_rev">
          {{ __('Next Revision') }}
      </label>
      <input class="w-full border border-gray-400 rounded"
             type="number"
             id="next_rev"
             name="next_rev"
             value="{{ $car->next_revision }}"
             required>
    </div>

    <div class="p-3">
     
      <textarea class="w-full border border-gray-400 rounded"
             
            
             name="details"
             value="{{ $car->details }}">
             
      </textarea><br>

    <button type="submit" class="m-3 hero-btn">
      Atualizar
    </button>

  </form>

</div>
@endsection
