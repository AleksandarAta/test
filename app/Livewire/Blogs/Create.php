<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $published;
    public $use_global;
    public $keywords;
    public $description;
    public $image;
    public $body;
    public $title_focused;
    
    protected function rules()
    {
        return [
            'title' => 'string|required|min:8',
            'slug' => 'required|unique:blogs,slug',
            'published' => 'boolean|required',
            'use_global' => 'boolean|required',
            'keywords' => 'nullable|min:8',
            'description' => 'string|required|min:8',
            'image' => 'nullable|image|max:1024',
            'body' => 'nullable',
        ];
    }

    public function mount()
    {
        $this->published = false;
        $this->use_global = false;
        $this->title_focused = false;
    }

    public function submit()
    {
        $this->validate();

        if ($this->image != null) {
            $image_extension = $this->image->getClientOriginalExtension();
            $image_url = $this->image->storeAs('images', $this->slug . '-image.' . $image_extension);
            $image_url = url($image_url);
        } else {
            $image_url = null;
        }

        $blog = Blog::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => Auth::user()->name,
            'published' => $this->published,
            'use_global' => $this->use_global,
            'keywords' => $this->keywords,
            'description' => $this->description,
            'image' => $image_url,
            'body' => $this->body,
        ]);

        session()->flash('flash.banner', 'Blog successfully created');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('blogs.index');
    }

    public function render()
    {
        if ($this->title != null && $this->title_focused == true) {
            $this->slug = Str::slug($this->title, '-');
        }

        return view('livewire.blogs.create');
    }
}

