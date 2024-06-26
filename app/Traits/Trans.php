<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

 trait Trans {

    public function getTransNameAttribute() {

        $name = json_decode($this->name, true);

        if(is_null($name)){

            return $this->name;

        }

       return $name[App::getLocale()];

    }


    public function getEnNameAttribute() {

        $name = json_decode($this->name, true);

        if(is_null($name)){

            return $this->name;

        }

       return $name['en'];

    }



    public function getArNameAttribute() {

        $name = json_decode($this->name, true);

        if(is_null($name)){

            return $this->name;

        }

       return $name['ar'];

    }


 }
