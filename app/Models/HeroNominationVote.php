<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroNominationVote extends Model
{
    protected $fillable = [
        'hero_nomination_id',
        'user_id',
        'rating',
        'comment',
    ];

    /**
     * Get the nomination this vote belongs to
     */
    public function nomination()
    {
        return $this->belongsTo(HeroNomination::class, 'hero_nomination_id');
    }

    /**
     * Get the user who cast this vote
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
