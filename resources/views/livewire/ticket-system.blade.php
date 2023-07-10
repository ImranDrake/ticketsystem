        <div style="justify-content: center;">
                <div>
                <p> If you look to others for fulfillment, you will never truly be fulfilled. </p>
                </div>

                @error('initialcomment')
                <span style='background-color: red;'>{{$message}}</span> 
                @enderror

                <form wire:submit.prevent='addComment'>
                    <input type="text" wire:model="initialcomment"> <button type="submit">Add</button>
                </form> 

                @foreach($comments as $comment)
                <div  style="display: flex; justify-content: between">
                    <div style="width: 15%; height: 100px;">
                        <div style="justify-content: space-between; display: flex"><span>{{$comment->Author->name}}</span> <span >{{$comment->created_at->diffForHumans()}}</span></div><br>
                        <div>{{$comment->body}}</div>
                    </div>
                    <div><button wire:click="remove({{$comment->id}})">x</button></div>
                </div>

                @endforeach
        </div>
