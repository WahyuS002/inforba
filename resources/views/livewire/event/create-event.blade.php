<div class="py-12">

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex justify-center mb-6 space-x-12">
        <div class="font-montserrat text-center">
            <div class="flex justify-center items-center w-12 h-12 rounded-full mx-auto {{ $currentStep == 1 ? 'bg-green-dark text-green-light' : 'bg-green-light text-green-dark' }}">
                <span class="font-bold">1</span>
            </div>
            <div class="text-center {{ $currentStep == 1 ? 'font-semibold' : 'font-medium' }} text-green-dark">
                Umum
            </div>
        </div>
        <div class="font-montserrat text-center">
            <div class="flex justify-center items-center w-12 h-12 rounded-full mx-auto {{ $currentStep == 2 ? 'bg-green-dark text-green-light' : 'bg-green-light text-green-dark' }}">
                <span class="font-bold">2</span>
            </div>
            <div class="text-center {{ $currentStep == 2 ? 'font-semibold' : 'font-medium' }} text-green-dark">
                Timeline
            </div>
        </div><div class="font-montserrat text-center">
            <div class="flex justify-center items-center w-12 h-12 rounded-full {{ $currentStep == 3 ? 'bg-green-dark text-green-light' : 'bg-green-light text-green-dark' }} mx-auto">
                <span class="font-bold">3</span>
            </div>
            <div class="text-center {{ $currentStep == 3 ? 'font-semibold' : 'font-medium' }} text-green-dark">
                Hadiah
            </div>
        </div>
    </div>

    <div class="{{ $currentStep != 1 ? 'hidden' : '' }}">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 font-montserrat space-y-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-t-8 border-green-dark p-6 flex justify-between items-center">
                <div class="w-1/2">
                    <input class="text-violet-dark block rounded-md font-medium text-2xl border-none focus:outline-none" type="text" value="Judul Lomba" onClick="this.select();" wire:model="title">
                    <input class="block rounded-md w-full text-sm text-violet-light mt-3 border-none focus:outline-none" type="text" placeholder="Deskripsi lomba" wire:model="desc">
                    @error('desc')<span class="px-3 mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="px-3 mt-3 w-1/2 flex flex-wrap justify-end">
                    @if ($thumbnail == null)
                    <label class="w-64 flex flex-col items-center px-4 py-12 bg-green-light text-blue rounded-lg shadow-lg tracking-wide border border-blue cursor-pointer hover:bg-blue text-violet-middle hover:text-green-dark">
                        <svg class="w-8 h-8 fill-current " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base font-montserrat leading-normal">Thumbnail</span>
                        <input type='file' class="hidden" onchange="loadFile(event)" wire:model="thumbnail" />
                    </label>
                    @error('thumbnail')<span class="w-64 mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror

                    <div class="flex w-64 mt-2 font-montserrat font-medium text-violet-light" wire:loading wire:target="thumbnail">
                        <img class="w-6 h-6" src="{{ asset('asset/gif/spinner.gif') }}" alt="">
                        <span>Mengupload gambar</span>
                    </div>
                    @else
                    <label class="flex flex-col items-center relative">
                        <img id="output" class="w-72 rounded-lg shadow-lg" alt="">
                        <div class="flex justify-end mb-3 absolute top-3 right-3" wire:click.prevent="removeThumbnail">
                            <span>
                                <svg class="bg-white rounded-full hover:text-violet-middle stroke-current text-red-dark cursor-pointer" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                    </label>
                    @endif
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="px-3 mt-3 flex justify-between">
                    <div>
                        <label class="text-violet-light" for="closed_at">Tanggal Pengisian Terakhir <span class="text-red-500">*</span></label>
                        <input id="closed_at" class="mt-3 w-full block rounded-lg border-none text-violet-light bg-green-light" type="date" wire:model="closed_at">
                        @error('closed_at')<span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label class="text-violet-light" for="category">Kategori <span class="text-red-500">*</span></label>
                        <select class="block text-sm mt-2 rounded-md text-violet-light bg-green-light border-none" name="category" id="category" wire:model="category">
                            <option value="" selected>Kateogri</option>
                            <option value="programming">Programming</option>
                            <option value="desain">Desain</option>
                            <option value="videografi">Videografi</option>
                            <option value="puisi">Puisi</option>
                            <option value="memasak">Memasak</option>
                        </select>
                        @error('category')<span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label class="text-violet-light" for="max_user">Jumlah Peserta <span class="text-red-500">*</span></label>
                        <input id="max_user" class="mt-3 block rounded-lg border-none text-violet-light bg-green-light" type="number" wire:model="max_user">
                        @error('max_user')<span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="text-center pt-12">
                <h1 class="font-montserrat font-medium text-violet-middle text-xl">Form Peserta</h1>
            </div>

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-l-8 border-green-light p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <input class="text-violet-middle block rounded-md font-medium text-md border-none focus:outline-none" type="text" wire:model="question.0" placeholder="Pertanyaan">
                        @error('question.0')<span class="mt-2 text-sm text-red-500 block px-3 text-danger">{{ $message }}</span>@enderror
                        @if (isset($question_type[0]) && $question_type[0] == 3)
                        <div class="px-3 mt-4 flex items-center space-x-3">
                            <label class="items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-dark" checked value="jpg,jpeg,png" wire:model="img.0"><span class="ml-2 text-violet-middle text-sm">Gambar</span>
                            </label>
                            <label class="items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-dark" value="doc,docx" wire:model="doc.0"><span class="ml-2 text-violet-middle text-sm">Dokumen</span>
                            </label>
                            <label class="items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-dark" value="pdf" wire:model="pdf.0"><span class="ml-2 text-violet-middle text-sm">PDF</span>
                            </label>
                        </div>
                        @endif
                    </div>
                    <div>
                        <select class="rounded-md text-sm text-violet-light" wire:model="question_type.0" id="">
                            <option value="" selected>Tipe Pertanyaan</option>
                            <option value="1">Jawaban Pendek</option>
                            <option value="2">Paragraf</option>
                            <option value="" disabled="disabled">—————————</option>
                            <option value="3">File</option>
                        </select>
                        @error('question_type.0') <span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="flex justify-end items-center mt-3 space-x-3">
                    <label class="font-montserrat text-sm text-violet-middle" for="">Wajib Diisi ?</label>
                    <input class="rounded-full" type="checkbox" wire:model="is_required.0">
                </div>
            </div>

            @foreach ($inputs as $key => $value)
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-l-8 border-green-light p-8">
                <div class="flex justify-end mb-3" wire:click.prevent="remove({{ $key }})">
                    <span>
                        <svg class="stroke-current text-red-dark cursor-pointer" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <input class="text-violet-middle block rounded-md font-medium text-md border-none focus:outline-none" type="text" wire:model="question.{{ $value }}" placeholder="Pertanyaan">
                        @error('question.'.$value)<span class="mt-2 text-sm text-red-500 block px-3 text-danger">{{ $message }}</span>@enderror
                        @if (isset($question_type[$value]) && $question_type[$value] == 3)
                        <div class="px-3 mt-4 flex items-center space-x-3">
                            <label class="items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-dark" checked value="jpg,jpeg,png" wire:model="img.{{ $value }}"><span class="ml-2 text-violet-middle text-sm">Gambar</span>
                            </label>
                            <label class="items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-dark" value="doc,docx" wire:model="doc.{{ $value }}"><span class="ml-2 text-violet-middle text-sm">Dokumen</span>
                            </label>
                            <label class="items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-dark" value="pdf" wire:model="pdf.{{ $value }}"><span class="ml-2 text-violet-middle text-sm">PDF</span>
                            </label>
                        </div>
                        @endif
                    </div>
                    <div>
                        <select class="rounded-md text-sm text-violet-light" wire:model="question_type.{{ $value }}" id="">
                            <option value="1">Jawaban Pendek</option>
                            <option value="2">Paragraf</option>
                            <option value="" disabled="disabled">—————————</option>
                            <option value="3">File</option>
                        </select>
                        @error('question_type.'.$value) <span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="flex justify-end items-center mt-3 space-x-3">
                    <label class="font-montserrat text-sm text-violet-middle">Wajib Diisi ?</label>
                    <input class="rounded-full" type="checkbox" wire:model="is_required.{{ $value }}" value="1">
                </div>
            </div>
            @endforeach

            <span class="flex justify-center" wire:click.prevent="add({{$i}})">
                <svg width="34" height="34" class="stroke-fill hover:text-green-600 text-green-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>


            <div class="text-center">
                <img class="w-10 h-10" src="{{ asset('asset/gif/spinner.gif') }}" alt="" wire:loading wire:target="add">
            </div>

            <div class="flex justify-center">
                <button class="font-montserrat hover:bg-green-600 text-green-light bg-green-dark px-4 py-2 rounded-md" wire:click.prevent="firstStepSubmit()">Lanjut</button>
            </div>

        </div>
    </div>

    <div class="{{ $currentStep != 2 ? 'hidden' : '' }}">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 font-montserrat space-y-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-l-8 border-green-light p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <input class="text-violet-middle block rounded-md font-medium text-md border-none focus:outline-none" type="text" wire:model="timeline_info.0" placeholder="Keterangan">
                        @error('timeline_info.0')<span class="mt-2 text-sm text-red-500 block px-3 text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="text-violet-light mb-2" for="timeline.0">Tanggal <span class="text-red-500">*</span></label>
                        <input class="border border-violet-middle rounded-md pr-0 text-violet-light" type="date" wire:model="timeline.0">
                        @error('timeline.0') <span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            @foreach ($timeline_inputs as $key => $value)
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-l-8 border-green-light p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <input class="text-violet-middle block rounded-md font-medium text-md border-none focus:outline-none" type="text" wire:model="timeline_info.{{ $value }}" placeholder="Keterangan">
                        @error('timeline_info.'.$value)<span class="mt-2 text-sm text-red-500 block px-3 text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="text-violet-light mb-2" for="timeline.0">Tanggal <span class="text-red-500">*</span></label>
                        <input class="border border-violet-middle rounded-md text-violet-light" type="date" wire:model="timeline.{{ $value }}">
                        @error('timeline.'.$value) <span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <span class="flex justify-center mt-3" wire:click.prevent="addTimeline({{$j}})">
            <svg width="34" height="34" class="stroke-fill hover:text-green-600 text-green-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>

        <div class="flex justify-center mt-3 space-x-3">
            <button class="font-montserrat text-green-dark border border-green-dark hover:bg-green-dark hover:text-white px-4 py-2 rounded-md" wire:click.prevent="backStep()">Kembali</button>
            <button class="font-montserrat hover:bg-green-600 text-green-light bg-green-dark px-4 py-2 rounded-md" wire:click.prevent="secondStepSubmit()">Lanjut</button>
        </div>

    </div>

    <div class="{{ $currentStep != 3 ? 'hidden' : '' }}">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 font-montserrat space-y-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-l-8 border-green-light p-8">
                <div class="flex items-center">
                    <label class="mr-3 bg-green-dark px-3 py-1 rounded-md text-white font-montserrat" for="">Juara 1</label>
                    <input class="text-violet-middle block rounded-md font-medium text-md border-none focus:outline-none" type="text" wire:model="prize.0" placeholder="Reward" type-currency="IDR">
                    @error('prize.0')<span class="mt-2 text-sm text-red-500 block px-3 text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            @foreach ($prize_inputs as $key => $value)
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-l-8 border-green-light p-8">
                <div class="flex items-center relative">
                    <label class="mr-3 bg-green-dark px-3 py-1 rounded-md text-white font-montserrat" for="">Juara {{ $key + 2 }}</label>
                    <input class="text-violet-middle block rounded-md font-medium text-md border-none focus:outline-none" type="text" wire:model="prize.{{ $value }}" placeholder="Reward" type-currency="IDR">
                    @error('prize.'.$value)<span class="mt-2 text-sm text-red-500 block px-3 text-danger">{{ $message }}</span>@enderror
                    <div class="flex justify-end mb-3 absolute top-3 right-3" wire:click.prevent="removePrize({{ $key }})">
                        <span>
                            <svg class="bg-white rounded-full hover:text-violet-middle stroke-current text-red-dark cursor-pointer" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <span class="flex justify-center mt-3" wire:click.prevent="addPrize({{$k}})">
            <svg width="34" height="34" class="stroke-fill hover:text-green-600 text-green-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>

        <div class="flex justify-center mt-3 space-x-3">
            <button class="font-montserrat text-green-dark border border-green-dark hover:bg-green-dark hover:text-white px-4 py-2 rounded-md" wire:click.prevent="backStep()">Kembali</button>
            <button class="font-montserrat hover:bg-green-600 text-green-light bg-green-dark px-4 py-2 rounded-md" wire:click.prevent="submitForm()">Selesai</button>
        </div>

    </div>


    <script>
        window.setInterval(() => {
            document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
                element.addEventListener('keyup', function(e) {
                    let cursorPostion = this.selectionStart;
                    let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                    let originalLenght = this.value.length;
                    if (isNaN(value)) {
                        this.value = "";
                    } else {
                        this.value = value.toLocaleString('id-ID', {
                            currency: 'IDR',
                            style: 'currency',
                            minimumFractionDigits: 0
                        });
                        cursorPostion = this.value.length - originalLenght + cursorPostion;
                        this.setSelectionRange(cursorPostion, cursorPostion);
                    }
                });
            });
        }, 1000);


        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

</div>