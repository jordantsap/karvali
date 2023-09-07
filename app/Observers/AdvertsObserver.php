<?php

namespace App\Observers;

use App\Models\unused\Advert;

class AdvertsObserver
{
    /**
     * Handle the advert "creating" event.
     *
     * @param  \App\Advert  $advert
     * @return void
     */
    public function creating(Advert $advert)
    {
        return $advert->url = $advert->advertable_type.'/'.$advert->advertable_id;
    }

    /**
     * Handle the advert "updating" event.
     *
     * @param  \App\Advert  $advert
     * @return void
     */
    public function updating(Advert $advert)
    {
        //
    }

}
