<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $author;
    public $published;
    public $use_global;
    public $keywords;
    public $discription;
    public $image;
    public $body;
    public $title_focused;
    public function rules()
    {
        return [
            'title' => 'string|required|min:8',
            'slug' => 'required|unique:blogs,slug',
            'published' => 'boolean|required|',
            'use_global' => 'boolean|required|',
            'keywords' => 'nullable|min:8',
            'body' => 'string|required|min:8',
            'image' => 'nullable|max:1024|image',
            'body' => 'nullable'

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
            $image_extenstion = $this->image->getOriginalExtension();
            $imageUrl = $this->image->storeAs('images', $this->slug . '-image.' . $image_extenstion);
            $imageUrl = url($imageUrl);
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
            'discription' => $this->discription,
            'image' => $image_url,
            'body' => $this->body
        ]);

        session()->flash('flashBanner', 'Blog created successfully');
        session()->flash('flashBannerStyle', 'success');

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
