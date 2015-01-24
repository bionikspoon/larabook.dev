<?php
use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;

/**
 * Class StatusController
 */
class StatusesController extends BaseController
{

    /**
     * @var
     */
    protected $statusRepository;
    /**
     * @var \Larabook\Forms\PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * @param \Larabook\Forms\PublishStatusForm   $publishStatusForm
     * @param \Larabook\Statuses\StatusRepository $statusRepository
     */
    public function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;
    }


    /**
     * Display a listing of the resource.
     * GET /status
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->statusRepository->getAllForUser(Auth::user());

        return View::make('statuses.index', compact('statuses'));
    }


    /**
     * Store a newly created resource in storage.
     * POST /status
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input['userId'] = Auth::id();

        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);
        Flash::message('Your Status has been updated');

        return Redirect::back();
    }
}
