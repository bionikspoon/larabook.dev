<?php
use Larabook\Core\CommandBus;
use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;

/**
 * Class StatusController
 */
class StatusController extends BaseController
{
    use CommandBus;

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
     * Show the form for creating a new resource.
     * GET /status/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /status
     *
     * @return Response
     */
    public function store()
    {
        $this->publishStatusForm->validate(Input::only('body'));

        $this->execute(
            new PublishStatusCommand(Input::get('body'), Auth::user()->id)
        );
        Flash::message('Your Status has been updated');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     * GET /status/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * GET /status/{id}/edit
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /status/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /status/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
