<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;

class Announcement extends Model
{
    use HasFactory, Searchable;
    protected $fillable=['title','body','price', 'is_accepted', 'revisor_id'];
    /**
     * Get the indexable data array for the model.
     * 
     * @return array
     */

    public function toSearchableArray()
    {
        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=> $this->body,
            'category'=> $this->category,
        ];
        return $array;
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }
    
    public function setAccepted($value){
        $this->is_accepted=$value;
        $this->revisor_id=Auth::user()->id;
        $this->save();       
        return true;
    }

    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function user (){
        return $this->belongsTo(User::class);
    }    
    public function revisor(){
        return $this->belongsTo(User::class,'revisor_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
}
