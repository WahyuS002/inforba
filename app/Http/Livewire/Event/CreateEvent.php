<?php

namespace App\Http\Livewire\Event;

use App\Models\Form;
use App\Models\FormQuestion;
use Livewire\Component;

class CreateEvent extends Component
{
    public $question, $question_type, $desc, $closed_at, $max_user, $is_required, $file_rules;
    public $title = 'Judul Lomba';
    public $i = 1;
    public $inputs = [];

    public $img, $doc, $pdf;

    public function render()
    {
        return view('livewire.event.create-event');
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'question.0' => 'required',
                'question_type.0' => 'required',
                'question.*' => 'required',
                'question_type.*' => 'required',
            ],
            [
                'question.0.required' => 'kolom pertanyaan wajib diisi',
                'question_type.0.required' => 'kolom ini wajib diisi',
                'question.*.required' => 'kolom pertanyaan wajib diisi',
                'question_type.*.required' => 'kolom ini wajib diisi',
            ]
        );

        $form = Form::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'max_user' => $this->max_user,
            'closed_at' => $this->closed_at,
        ]);

        foreach ($this->question as $key => $value) {
            if (isset($this->img[$key]) || isset($this->doc[$key]) || isset($this->pdf[$key])) {
                $file_rules = json_encode(
                    ["mimes" => [
                        isset($this->img[$key]) ? $this->img[$key] : '',
                        isset($this->doc[$key]) ? $this->doc[$key] : '',
                        isset($this->pdf[$key]) ? $this->pdf[$key] : '',
                    ]]
                );
                FormQuestion::create([
                    'form_id' => $form->id,
                    'question' => $this->question[$key],
                    'question_type' => $this->question_type[$key],
                    'is_required' => isset($this->is_required[$key]) ? $this->is_required[$key] : 0,
                    'file_rules' => $file_rules,
                ]);

                $file_rules = '';
            }
        }

        $this->inputs = [];

        $this->resetInputFields();

        // session()->flash('message', 'Contact Has Been Created Successfully.');
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields()
    {
        $this->question = '';
        $this->question_type = '';
        $this->desc = '';
        $this->closed_at = '';
        $this->max_user = '';
    }
}
