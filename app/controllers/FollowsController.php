<?php
use Larabook\Users\FollowUserCommand;

/**
 * Class FollowersController
 */
class FollowsController extends \BaseController
{

    /**
     * Store a newly created resource in storage.
     * POST /followers
     *
     * @return Response
     */
    public function store()
    {
        //id of the user to follow

        //id of the auth user
        $input = array_add(Input::all(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');
        return Redirect::back();
    }


    /**
     *
     * Unfollow a user.
     * Remove the specified resource from storage.
     * DELETE /followers/{id}
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