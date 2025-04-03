<?php

namespace App\Livewire\Blogs;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Blog;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';
    public $order_by = 'id';
    public $order_type = 'asc';

    public function dispatchEvent($blogId) {
        
        $this->dispatch('delete_blogs' , blogId: $blogId);
    }

    #[On('refresh')]
    public function refresh() {
        // Just to refresh the list
    }


    public function order_by($order_by)
    {
        if ($order_by == $this->order_by) {
            if ($this->order_type == 'asc') {
                $this->order_type = 'desc';
            } else {
                $this->order_type = 'asc';
            }
        } else {
            $this->order_by = $order_by;
            $this->order_type = 'asc';
        }
    }

    public function set_published($blog_id)
    {      
        $blog = Blog::find($blog_id);
        $published = $blog->published;

        $blog->published = !$published;

        $blog->save();
    }

    public function set_use_global($blog_id)
    {      
        $blog = Blog::find($blog_id);
        $use_global = $blog->use_global;

        $blog->use_global = !$use_global;

        $blog->save();
    }

    public function render()
    {
        $blogs = Blog::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('keywords', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.blogs.index', [
            'blogs' => $blogs
        ]);
    }
}
