<?php

namespace App\Livewire;

use App\Models\Comments;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostComment extends Component
{
    public $postId, $body, $editBody;
    public $editingCommentId = null;

    public function mount($postId) {
        $this->postId = $postId;
    }

    public function save() {
        // 1. Proteksi Login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate(['body' => 'required|min:3']);

        Comments::create([
            'post_id' => $this->postId,
            'user_id' => Auth::id(),
            'body'    => $this->body,
        ]);

        $this->reset('body');
        session()->flash('message', 'Komentar berhasil dikirim!');
    }

    public function edit($id) {
        $comment = Comments::findOrFail($id);

        // 2. Proteksi Owner: Hanya pemilik yang bisa buka mode edit
        if ($comment->user_id !== Auth::id()) {
            return;
        }

        $this->editingCommentId = $id;
        $this->editBody = $comment->body;
    }

    public function update() {
        $comment = Comments::findOrFail($this->editingCommentId);

        // 3. Proteksi Owner: Hanya pemilik yang bisa update
        if ($comment->user_id === Auth::id()) {
            $this->validate(['editBody' => 'required|min:3']);
            $comment->update(['body' => $this->editBody]);
            $this->editingCommentId = null;
        }
    }

    public function delete($id) {
        $comment = Comments::findOrFail($id);

        // 4. Proteksi Owner: Hanya pemilik yang bisa hapus
        if ($comment->user_id === Auth::id()) {
            $comment->delete();
        }
    }

public function render()
{
    return view('livewire.post-comment', [
        'comments' => \App\Models\Comments::where('post_id', $this->postId)
            ->whereNotNull('user_id') // Pastikan ID tidak null
            ->whereHas('user')        // Pastikan user masih ada
            ->with('user')
            ->latest()
            ->get()
    ]);
}
}
