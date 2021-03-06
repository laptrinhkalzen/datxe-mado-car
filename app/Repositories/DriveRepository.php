<?php

namespace Repositories;

use Repositories\Support\AbstractRepository;

class DriveRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\DriveCategory';
    }


