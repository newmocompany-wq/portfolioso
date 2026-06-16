<?php

namespace App\Repository;

use App\Models\About;

class AboutRepository
{
    public function getFirstAbout()
    {
        return About::first();
    }

    public function store($data)
    {
        return About::create($data);
    }

    public function update($about, $data)
    {
        return $about->update($data);
    }
}
