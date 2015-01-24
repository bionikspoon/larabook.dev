<?php namespace Larabook\Users;

use Eloquent;
use Hash;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * User
 *
 * @property integer        $id
 * @property string         $username
 * @property string         $email
 * @property string         $password
 * @property string         $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ];
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * Path to the presenter for the user.
     *
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     *
     * @return User
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserRegistered($user));

        return $user;
    }

    /**
     * Hash Password
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * User has many status
     *
     * @return \Larabook\Statuses\Status[]
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status');
    }

    /**
     * Determine if the given User is the same as the signed in user.
     *
     * @param \Larabook\Users\User|null $user
     *
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) {
            return false;
        }

        return $this->username == $user->username;
    }

    /**
     * Determine if current user follows another user
     *
     * @param \Larabook\Users\User $otherUser
     *
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

    /**
     * @return User[]
     */
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }
}
