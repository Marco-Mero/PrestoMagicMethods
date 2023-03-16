<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;

use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    //trait
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;



    public $images = [];
    public $image;
    public $announcement;
    public $temporary_images;


    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric|max:999999',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        'temporary_images' => 'required',
    ];


    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute richiede un numero.',
        'price.max' => 'Prezzo massimo:999999',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di 1mb',
        'images.image' => 'Il file deve essere una immagine',
        'images.max' => 'L\'immagine deve essere massimo di 1mb'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $category = Category::find($this->category);
        $this->announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName ="announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);
                
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 300 ,300 ),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
                
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();


        session()->flash('message', 'Annuncio inserito, in attesa di revisione!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
