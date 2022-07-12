<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor 
{
    //Article.php model
    public function author(): User 
    {
        return $this->authorRelation;
    }

    public function authorRelation(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isAuthoredBy(User $user): bool 
    {
        return $this->author()->matches($user);
    }

    public function authoredBy(User $author)
    {
        return $this->authorRelation()->associate($author);
    }
}