<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class PublishStatusCommandHandler
 *
 * @package Larabook\Statuses
 */
class PublishStatusCommandHandler implements CommandHandler
{
    use DispatchableTrait;
    /**
     * @var
     */
    protected $statusRepository;

    /**
     * Inject status repository
     *
     * @param \Larabook\Statuses\StatusRepository $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Handler for Publish Status command
     *
     * @param $command
     *
     * @return Status|void
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $status = $this->statusRepository->save($status, $command->userId);

        $this->dispatchEventsFor($status);

        return $status;
    }
}
