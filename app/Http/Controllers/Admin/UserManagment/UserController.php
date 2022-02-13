<?php
 namespace App\Http\Controllers\Admin\UserManagment;

 use App\User;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Validator;

 class UserController extends Controller
 {
     /*@return
*/
 public function index()
 {
     return view('admin.user_managment.users.index', [
         'users' => User::paginate(10)
     ]);
 }

/*@return
*/
 public function  create ()
 {
return view('admin.user_managment.users.create', [
    'user'=>[]
]);
 }
 /*@param
 @return
 */
 public function store(Request $request)
 {
    $validator =  $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6|confirmed',
     ]);

    User::create([
        'name' => $request['name'],
        'email' => @request['email'],
        'password' => bcrypt($request['password'])
    ]);

    return redirect()->route('admin.user_managment.user.index');
 }

 /*@param
 @return
 */
     public function show(User $user)
     {
         //
     }

     /*param
     @return
     */

     public function edit(User $user)
     {
         return view('admin.user_managment.users.edit', [
             'user' => $user
         ]);
     }

     /*@param
     @param
     @return
     */

     public function update(Request $request, User $user)
     {
         $validator =  $request->validate([
             'name' => 'required|string|max:255',
             'email' => [
                 'required',
                 'string',
                 'email',
                 'max:255',
                 \Illuminate\Validation\Rule::unique('users')->ignore($user->id),
             ],
             'password' => 'nullable|string|min:6|confirmed',
         ]);

         $user->name = $request['name'];
         $user->email = $request['email'];
         $request['password'] == null ?: $user->password = bcrypt($request['password']);
         $user->save();

         return redirect()->route('admin.user_managment.user.index');
     }

     /*param
     @return
     */

     public function destroy(User $user)
     {
         $user->delete();

         return redirect()->route('admin.user_managment.user.index');

     }
 }
