<?php

declare(strict_types = 1);

namespace Coolblue\Core;

abstract class Repository
{
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }

}
