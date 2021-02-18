<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\FormQuestion;
use App\Models\Prize;
use App\Models\Timeline;
use Livewire\Component;

use Livewire\WithFileUploads;

class CreateEvent extends Component
{
    use WithFileUploads;

    public $currentStep = 1;

    /* UMUM - STEP 1 */
    public $question, $question_type, $desc, $closed_at, $max_user, $is_required, $file_rules, $thumbnail;
    public $title = 'Judul Lomba';
    public $i = 1;
    public $inputs = [];

    public $img, $doc, $pdf;

    /* TIMELINE - STEP 2 */
    public $timeline_info, $timeline;
    public $j = 1;
    public $timeline_inputs = [];

    /* TIMELINE - STEP 2 */
    public $prize;
    public $k = 1;
    public $prize_inputs = [];


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

    public function firstStepSubmit()
    {
        $validatedDate = $this->validate(
            [
                'thumbnail' => 'required|image|max:1024',
                'desc' => 'required',
                'closed_at' => 'required',
                'max_user' => 'required',
                'question.0' => 'required',
                'question_type.0' => 'required',
                'question.*' => 'required',
                'question_type.*' => 'required',
            ],
            [
                'thumbnail.image' => 'mohon upload file bertipe gambar',
                'thumbnail.max' => 'max file 1MB',
                'thumbnail.required' => 'thumbnail wajib diisi',
                'desc.required' => 'deskripsi wajib diisi',
                'max_user.required' => 'kolom ini wajib diisi',
                'closed_at.required' => 'kolom ini wajib diisi',
                'question.0.required' => 'kolom pertanyaan wajib diisi',
                'question_type.0.required' => 'kolom ini wajib diisi',
                'question.*.required' => 'kolom pertanyaan wajib diisi',
                'question_type.*.required' => 'kolom ini wajib diisi',
            ]
        );

        $this->currentStep = 2;
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function removeThumbnail()
    {
        $this->thumbnail = '';
    }

    private function resetInputFields()
    {
        $this->question = '';
        $this->question_type = '';
        $this->desc = '';
        $this->closed_at = '';
        $this->max_user = '';
    }

    public function addTimeline($j)
    {
        $j = $j + 1;
        $this->j = $j;
        array_push($this->timeline_inputs, $j);
    }

    public function secondStepSubmit()
    {
        $validatedDate = $this->validate(
            [
                'timeline_info.0' => 'required',
                'timeline.0' => 'required',
                'timeline_info.*' => 'required',
                'timeline.*' => 'required',
            ],
            [
                'timeline_info.0.required' => 'kolom keterangan wajib diisi',
                'timeline.0.required' => 'kolom ini wajib diisi',
                'timeline_info.*.required' => 'kolom keterangan wajib diisi',
                'timeline.*.required' => 'kolom ini wajib diisi',
            ]
        );

        $this->currentStep = 3;

        $this->timeline_inputs = [];
        // $this->resetTimelineInputFields();
    }

    private function resetTimelineInputFields()
    {
        $this->timeline = '';
        $this->timeline_info = '';
    }

    public function backStep()
    {
        $this->currentStep -= 1;
    }

    public function addPrize($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->prize_inputs, $i);
    }

    public function removePrize($i)
    {
        unset($this->prize_inputs[$i]);
    }

    public function submitForm()
    {
        $validatedDate = $this->validate(
            [
                'prize.0' => 'required',
                'prize.*' => 'required',
            ],
            [
                'prize.0.required' => 'kolom ini wajib diisi',
                'prize.*.required' => 'kolom ini wajib diisi',
            ]
        );

        $event = Event::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail->store('thumbnail'),
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
                $file_rules = '';
            }
            FormQuestion::create([
                'event_id' => $event->id,
                'question' => $this->question[$key],
                'question_type' => $this->question_type[$key],
                'is_required' => isset($this->is_required[$key]) ? $this->is_required[$key] : 0,
                'file_rules' => isset($file_rules) ? $file_rules : null,
            ]);
        }

        foreach ($this->timeline as $key => $value) {
            Timeline::create([
                'event_id' => $event->id,
                'timeline' => $this->timeline[$key],
                'timeline_info' => $this->timeline_info[$key],
            ]);
        }

        foreach ($this->prize as $key => $value) {
            Prize::create([
                'event_id' => $event->id,
                'prize' => $this->prize[$key],
            ]);
        }

        Event::find($event->id)->update([
            'total_prize' => $event->prizes->sum('prize'),
        ]);
    }
}
