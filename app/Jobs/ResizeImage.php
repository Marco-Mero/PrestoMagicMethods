<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    //
    private $fileName;
    private $path;

    private $w;
    private $h;
    /**
     *  This job receives the path of the image, which it then splits into fileName and path.
     * It also receives desired height (h) and width of the new IMG.
     * @param filePath path received
     * @param w desired width
     * @param h desired height
     * @return void
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path=dirname($filePath);      
        $this->fileName=basename($filePath);    
        $this->w=$w;     
        $this->h=$h;       
    }

    /**
     * Resizes the image.
     *
     * @return void
     */
    public function handle()
    {
        $w=$this->w;
        $h=$this->h;
        $srcPath =storage_path().'/app/public/'.$this->path.'/'.$this->fileName;
        $dstPath =storage_path().'/app/public/'.$this->path."/crop_{$w}x{$h}_".$this->fileName;

        $croppedImage= Image::load($srcPath)->crop(Manipulations::CROP_CENTER, $w, $h)->watermark("public/media/water.png")->watermarkOpacity(90)->save($dstPath);                        
    }
}
