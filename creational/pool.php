<?php

namespace pool;


class WorkerPool
{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }

    public function getWorker(): Worker
    {
        if(count($this->freeWorkers) == 0) {
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }
        $this->busyWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function release(Worker $worker): void
    {
        $key = spl_object_hash($worker);

        if(isset($this->busyWorkers[$key])) {
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

}

class Worker
{
    public function work(): string
    {
        return 'I\'am working';
    }
}

$pool = new WorkerPool();
$worker1 = $pool->getWorker();
$worker2 = $pool->getWorker();

var_dump($worker1->work());
var_dump($worker2->work());

echo 'Free workers: '  . count($pool->getFreeWorkers()) . PHP_EOL;
//var_dump($pool->getFreeWorkers());
echo 'Busy workers: ' . count($pool->getBusyWorkers()) . PHP_EOL;
//var_dump($pool->getBusyWorkers());

echo PHP_EOL . 'Release worker 1' . PHP_EOL . PHP_EOL;
$pool->release($worker1);

echo 'Free workers: '  . count($pool->getFreeWorkers()) . PHP_EOL;
//var_dump($pool->getFreeWorkers());
echo 'Busy workers: ' . count($pool->getBusyWorkers()) . PHP_EOL;
//var_dump($pool->getBusyWorkers());

echo PHP_EOL . 'Release worker 2' . PHP_EOL . PHP_EOL;
$pool->release($worker2);

echo 'Free workers: '  . count($pool->getFreeWorkers()) . PHP_EOL;
//var_dump($pool->getFreeWorkers());
echo 'Busy workers: ' . count($pool->getBusyWorkers()) . PHP_EOL;
//var_dump($pool->getBusyWorkers());
