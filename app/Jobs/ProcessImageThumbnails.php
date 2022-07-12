<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImageThumbnails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$image = $this->image;
       // $full_image_path = public_path($image->org_path);
       // $resized_image_path = public_path('thumbs' . DIRECTORY_SEPARATOR .  $image->org_path);

        // create image thumbs from the original image
        //$img = \Image::make($full_image_path)->resize(100, 100);
      //  $resized_image_path->save();
    }
}
