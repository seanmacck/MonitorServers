<?php


//namespace App;

class VirtualMachine
{
    private $tableName = 'VirtualMachine'; // table name

    public $id;
    public $cpu;
    public $mem;
    public $inprogressJobs;
    public $queuedJobs;
    public $vmIp;
    public $createdAt;


    public function foobar()
    {
        return 'foobar';
    }
}