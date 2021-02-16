<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 font-montserrat space-y-4">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border-t-8 border-green-dark p-6">
            <input class="text-violet-dark block rounded-md font-medium text-2xl border-none focus:outline-none" type="text" value="Judul Lomba" onClick="this.select();" wire:model="title">
            <input class="block rounded-md w-full text-sm text-violet-light mt-3 border-none focus:outline-none" type="text" placeholder="Deskripsi lomba" wire:model="desc">
        </div>
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
            <div class="px-3 mt-3 flex justify-between">
                <div>
                    <label class="text-violet-light" for="closed_at">Tanggal Pengisian Terakhir <span class="text-red-500">*</span></label>
                    <input id="closed_at" class="mt-3 w-full block rounded-lg border-none text-violet-light bg-green-light" type="date" wire:model="closed_at">
                </div>
                <div>
                    <label class="text-violet-light" for="max_user">Jumlah Peserta <span class="text-red-500">*</span></label>
                    <input id="max_user" class="mt-3 block rounded-lg border-none text-violet-light bg-green-light" type="number" wire:model="max_user">
                </div>
            </div>
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
                        <option value="1">Jawaban Pendek</option>
                        <option value="2">Paragraf</option>
                        <option value="" disabled="disabled">—————————</option>
                        <option value="3">File</option>
                    </select>
                    @error('question_type.0') <span class="mt-2 text-sm text-red-500 block text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex justify-end items-center mt-3 space-x-3">
                <label class="font-montserrat text-sm text-violet-middle" for="">Wajib Diisi</label>
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
                <label class="font-montserrat text-sm text-violet-middle">Wajib Diisi</label>
                <input class="rounded-full" type="checkbox" wire:model="is_required.{{ $value }}" value="1">
            </div>
        </div>
        @endforeach

        <span class="flex justify-center" wire:click.prevent="add({{$i}})">
            <svg width="34" height="34" class="stroke-fill hover:text-green-600 text-green-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>

        <div class="flex justify-center">
            <button class="font-montserrat hover:bg-green-600 text-green-light bg-green-dark px-4 py-2 rounded-md" wire:click.prevent="store()">Kirim</button>
        </div>

    </div>
</div>