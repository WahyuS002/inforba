@extends('layouts.frontend')

@section('style-below')
<link rel="stylesheet" href="{{ asset('css/accordion.css') }}">
@endsection

@section('title')
Lombaku - Event Registration
@endsection

@section('content')
<div class="mt-28 lg:px-60">
    <h1 class="font-bold font-dosis text-green-dark text-4xl lg:text-5xl text-center">
        {{ $event->title }}
    </h1>
    <h3 class="mt-6 font-semibold font-dosis text-violet-dark text-xl text-center">
        Dibuat Oleh {{ $event->user->name }}
    </h3>
    <div class="mt-6 flex justify-center">
        <p class=" bg-green-dark py-1 px-3 w-auto rounded-md font-montserrat font-semibold text-center text-white">Total Hadiah : Rp. {{ ($event->total_prize > 1000) ? $event->total_prize / 1000 . 'K' :  $event->total_prize}}</p>
    </div>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-12 flex flex-col justify-center mt-12 space-y-12">

        <form action="{{ route('user.registration', $event->slug) }}" method="POST">
            @csrf
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-t-8 border-green-dark p-6 flex flex-col w-full">
                <h2 class="font-montserrat text-xl font-bold text-center text-violet-middle">Pendaftaran Lomba</h2>
                <div class="mt-12 space-y-4">
                    @foreach ($event->formQuestion as $formQuestion)
                    <div>
                        <label class="text-violet-light" for="{{ $formQuestion->question }}">{{ $formQuestion->question }} @if($formQuestion->is_required == 1) <span class="text-red-500">*</span> @endif </label>

                        @if ($formQuestion->question_type == 1)
                        <input name="{{ $formQuestion->question . $loop->iteration }}" id="{{ $formQuestion->question }}" class="mt-3 w-full block rounded-lg border-none text-violet-light bg-green-light" type="text" @if($formQuestion->is_required == 1) required @endif>
                        @elseif ($formQuestion->question_type == 2)
                        <textarea class="block mt-3 rounded-lg w-full border border-gray-300 bg-green-light text-violet-light" name="{{ $formQuestion->question . $loop->iteration }}" id="" cols="30" rows="3" @if($formQuestion->is_required == 1) required @endif></textarea>
                        @else
                        <input name="{{ $formQuestion->question . $loop->iteration }}" id="{{ $formQuestion->question }}" class="mt-3 py-2 px-2 w-full block rounded-lg border-none text-violet-light bg-green-light" type="file" @if($formQuestion->is_required == 1) required @endif>
                        @endif

                    </div>
                    @endforeach

                </div>
            </div>

            <div class="text-center mt-12">
                <button class="bg-green-dark hover:bg-green-600 text-white px-4 py-1 rounded-md font-montserrat text-lg font-bold" type="submit">Kirim</button>
            </div>
        </form>


        {{-- <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-t-8 border-green-dark p-6 flex flex-col w-full">
            <h2 class="font-montserrat text-xl font-bold text-center text-violet-middle">Pembayaran</h2>

            <p>Open <strong>one</strong></p>
            <div class="shadow-md">
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="tab-single-one" type="radio" name="tabs2">
                    <label class="block p-5 leading-normal cursor-pointer" for="tab-single-one">Label One</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
                    </div>
                </div>
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="tab-single-two" type="radio" name="tabs2">
                    <label class="block p-5 leading-normal cursor-pointer" for="tab-single-two">Label Two</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
                    </div>
                </div>
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="tab-single-three" type="radio" name="tabs2">
                    <label class="block p-5 leading-normal cursor-pointer" for="tab-single-three">Label Three</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
                    </div>
                </div>
            </div>

        </div> --}}

    </div>
</div>
@endsection

@section('script-below')
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