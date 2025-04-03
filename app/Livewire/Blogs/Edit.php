<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Faker\Provider\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    
    use WithFileUploads;

    public $blog;
    public $title;
    public $slug;
    public $author;
    public $published;
    public $use_global;
    public $keywords;
    public $description;
    public $image;
    public $body;
    public $title_focused;
    public $old_image;


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
    public function mount(Blog $blog) {
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->author = $blog->author;
        $this->published = $blog->published;
        $this->keywords = $blog->keywords;
        $this->description = $blog->description;
        $this->title = $blog->title;
        $this->old_image = $blog->image;
        $this->body = $blog->body;
        $this->title_focused = false;

    }

    public function submit()
    {

        $this->validate();


        if ($this->image != null) {
            $image_extenstion = $this->image->getClientOriginalExtension();
            $imageUrl = $this->image->storeAs('images', $this->slug . '-image.' . $image_extenstion , 'public');
            $imageUrl = url($imageUrl);
        } else {
            $imageUrl = null;
        }
        $blog = $this->blog;


        $blog->title = $this->title ;
        $blog->slug = $this->slug ;
        $blog->published = $this->published;
        $blog->keywords = $this->keywords;
        $blog->description = $this->description;
        $blog->body = $this->body;
        $blog->image = $imageUrl;

  
        $blog->save();
        
        session()->flash('flashBanner', 'Blog updated successfully');
        session()->flash('flashBannerStyle', 'success');

        return redirect()->route('blogs.index');
    }
    public function render()
    {
        if ($this->title != null && $this->title_focused == true) {
            $this->slug = Str::slug($this->title, '-');
        }   
        $blog = $this->blog;

        return view('livewire.blogs.edit' , compact('blog'));
    }
}
