<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;

/**
 * Class LeaveCommentOnStatusCommandHandler
 *
 * @package Larabook\Statuses
 */
class LeaveCommentOnStatusCommandHandler implements CommandHandler
{
    /**
     * @var \Larabook\Statuses\StatusRepository
     */
    private $statusRepository;

    /**
     * @param \Larabook\Statuses\StatusRepository $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     *
     * @return Comment
     */
    public function handle($command)
    {
        $comment = $this->statusRepository->leaveComment($command->user_id, $command->status_id, $command->body);

        return $comment;
    }
}
