<?php

use Illuminate\Console\Command;
use Picqer\Financials\Exact\Connection;

class ExactConnectCommand extends Command
{
    protected Connection $connection;

    protected $signature = 'exact-online:connect';
    protected $description = 'Attempt connection to Exact Online';

    public function handle(): void
    {
        $this->connection = app()->make('Exact\Connection');

    }
}