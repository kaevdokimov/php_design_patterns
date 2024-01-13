<?php

namespace abstract_factory;

interface AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;
}

class NativeWorkerFactory implements AbstractFactory
{
    #[\Override] public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }

    #[\Override] public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }

}

class OutsourceWorkerFactory implements AbstractFactory
{
    #[\Override] public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }

    #[\Override] public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }

}

interface Worker
{
    public function work();
}

interface DeveloperWorker extends Worker
{
}

interface DesignerWorker extends Worker
{
}

class NativeDeveloperWorker implements DeveloperWorker
{
    #[\Override] public function work(): string
    {
        return 'Native developer work';
    }
}

class OutsourceDeveloperWorker implements DeveloperWorker
{
    #[\Override] public function work(): string
    {
        return 'Outsource developer work';
    }
}

class NativeDesignerWorker implements DesignerWorker
{
    #[\Override] public function work(): string
    {
        return 'Native designer work';
    }
}

class OutsourceDesignerWorker implements DesignerWorker
{
    #[\Override] public function work(): string
    {
        return 'Outsource designer work';
    }
}

$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
$outsourceDeveloper = OutsourceWorkerFactory::makeDeveloperWorker();

$nativeDesigner = NativeWorkerFactory::makeDesignerWorker();
$outsourceDesigner = OutsourceWorkerFactory::makeDesignerWorker();

var_dump($nativeDeveloper->work());
var_dump($outsourceDeveloper->work());

var_dump($nativeDesigner->work());
var_dump($outsourceDesigner->work());
