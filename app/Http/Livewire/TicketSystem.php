<?php

namespace App\Http\Livewire;

//use App\Http\Livewire\TicketSystem;
use App\Models\TicketSystem as ModelsTicketSystem;
use Carbon\Carbon;


use Livewire\Component;

class TicketSystem extends Component
{
    public $comments;
        public $initialcomment;

        public function updated($field) {
            $this->validateOnly($field, ['initialcomment' => 'required|max: 255']);

        }

        public function addComment(){
            // if($this->initialcomment == ''){
            //     return;
            // }
            $this->validate(['initialcomment' => 'required|max: 255']);
            $newcomment = ModelsTicketSystem::create(['body' => $this->initialcomment, 'user_id' => 1]);
            $this->comments->prepend($newcomment);
            $this->initialcomment= "";
        }
        public function mount() {
            // dd($intcomments);
            $intcomments = ModelsTicketSystem::latest()->get();
            $this->comments= $intcomments;
        }

        public function remove ($commentid) {
            $cmnt = ModelsTicketSystem::find($commentid);
            $cmnt->delete();
            $this->comments = $this->comments->except($commentid);
        }
    public function render()
    {
        return view('livewire.ticket-system');
    }
}

