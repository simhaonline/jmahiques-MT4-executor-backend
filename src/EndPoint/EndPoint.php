<?php

namespace App\EndPoint;

use App\DTO\PipelineInfo;
use App\Persistence\PositionRepository;
use League\Pipeline\Pipeline;
use League\Pipeline\PipelineBuilder;
use League\Pipeline\PipelineInterface;
use League\Pipeline\StageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class EndPoint
{
    protected $dto;
    protected $repository;

    public function __construct()
    {
        $this->repository = new PositionRepository();
    }

    public function execute(ServerRequestInterface $request): ResponseInterface
    {
        $pipeline = $this->createPipeLine();
        $result = $pipeline->process(new PipelineInfo($request->getParsedBody(), $this->createDto()));

        return $this->handle($request, $result);
    }

    /** @return Pipeline */
    private function createPipeLine(): PipelineInterface
    {
        $pipelineBuilder = new PipelineBuilder();
        foreach ($this->getStages() as $stage) {
            $pipelineBuilder->add($stage);
        }

        return $pipelineBuilder->build();
    }

    /** @return StageInterface[] */
    protected abstract function getStages(): array;

    protected abstract function createDto();

    protected abstract function handle(ServerRequestInterface $request, $dto): ResponseInterface;
}