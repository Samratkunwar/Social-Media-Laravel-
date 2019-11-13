<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*---------------------------------------------------------------------------------Routes-------------------------------------------------------------------------*/

//Route to load home page on http request
Route::get('/', function () {
    $sql = "select * from posts";
    $posts = DB::select($sql);
    return view('site.Blog')->with('posts', $posts);
});

//Route to load the home page
Route::get("home_page", function(){
    return redirect(url('/'));
});

//Route to load documentation page
Route::get("documentation", function(){
    return view('site.documentation');
});

//Route to load user profile based on username
Route::get("/user_profile/{username}", function($username){
    $sql = "select * from posts where username=?";
    $posts = DB::select($sql, array($username));
    $post = $posts[0];
    $pro_pic = ($post->pro_pic);
    $pst_pic = ($post->pst_pic);
    return view('site.user_profile')->with('posts', $posts)->with('pro_pic', $pro_pic)->with('pst_pic', $pst_pic);
    
});

//Route to create post
Route::get('create_post', function(){
    $comment_no = 0;
    $username = request('username');
    $title = request('title');
    $message = request('message');
    $date = date("d M y");
    $pst_pic = request('pst_pic');
    
    if (strtolower($username)== "siri"){
        $username = "Siri";
    }elseif ((strtolower($username)== "harry")){
        $username = "Harry";
    }elseif ((strtolower($username)== "alexandra")){
        $username = "Alexandra";
    }else{
        $username = $username;
    };
    
    if ($username = "Siri") {
        $pro_pic = "siri.jpg";
    }elseif ($username = "Harry") {
        $pro_pic = "harry.jpg";
    }elseif ($username = "Alexandra") {
        $pro_pic = "alexandra.jpg";
    }else{
        $pro_pic = "pubpic.jpg";
    };
    create_post($comment_no, $pro_pic, $username, $title, $message, $date, $pst_pic);
    return redirect('/');
});

/*
Route::get("post_page", function(){
    return view("site.post_page");
});
*/

//Route to open post page which has all post details and comments
Route::get('/post_page/{post_id}', function($post_id){
    $posts = get_post($post_id);
    $comments = get_comments($post_id);
    $pro_pic = ($posts->pro_pic);
    $pst_pic = ($posts->pst_pic);
    return view('site.post_page')->with('posts', $posts)->with('comments', $comments)->with('pro_pic', $pro_pic)->with('pst_pic', $pst_pic);
});

//Route to add comments in a post
Route::get('add_comments', function(){
    $post_id = request('post_id');
    $username = request('username');
    $p_comment = request('comment');
    add_comment($post_id, $username, $p_comment);
    return redirect(url("post_page/$post_id"));
});

//Route to delete post
Route::get('/delete_post/{post_id}', function($post_id){
    delete_post($post_id);
    return redirect(url("/"));
});

//Route to delete comment
Route::get('/delete_comment/{comment_id}/{post_id}', function($comment_id,$post_id){
    delete_comment($comment_id);
    return redirect(url("post_page/$post_id"));
});

//Route to open the update form
Route::get('/update_post/{post_id}', function($post_id){
    $post = get_data($post_id);
    return view("site.update")->with('post', $post);
});

//Route from update form to update post
Route::post('update_post_action', function(){

    $post_id = request('post_id');
    $username = request('username');
    $title = request('title');
    $message = request('message');
    $date = date("d M y");
    //$pst_pic = request('pst_pic');
    if  ($username == "Siri"){
        $pro_pic = "siri.jpg";
    }elseif ($username == "Harry"){
        $pro_pic = "harry.jpg";
    }elseif ($username == "Alexandra"){
        $pro_pic = "alexandra.jpg";
    }else{
        $pro_pic = "pubpic.jpg";
    };

    $sql = "select pst_pic from posts where post_id=?";
    $pt_pic = DB::select($sql,array($post_id));
    $p_pic = (($pt_pic[0])->pst_pic);
    $pst_pic = request('pst_pic');
    
    if ($pst_pic == null){
        $pst_pic = $p_pic;
    }else{
        $pst_pic = $pst_pic;
    }
    
    update_post($post_id, $pro_pic, $username, $title, $message, $date, $pst_pic);
    return redirect(url("post_page/$post_id"));

});

//Route to show all the users
Route::get('users', function(){
    $sql = "select username from posts";
    $users = DB::select($sql);
    $c = count($users);
    $user = array();
    for ($i=0; $i<$c; $i++){
        $u_name = (($users[$i])->username);
        if (in_array($u_name, $user)){
            
        }else{
            array_push($user, $u_name);
        }
        
    }
    
  
    
    return view('site.users')->with('user', $user);

});

/*
Route::get('cancel_update/{post_id}', function($post_id){
    dd($post_id);
});
*/

/*-----------------------------------------------Function Block-----------------------------------------------------------------------------------------*/

//get all the posts from the database
function get_data($post_id){
    $sql = "select * from posts where post_id = ?";
    $datas = DB::select($sql, array($post_id));
    $data = $datas[0];
    return $data;
}

//update the post based on values provided
function update_post($post_id, $pro_pic, $username, $title, $message, $date, $pst_pic){
    $sql = "update posts set pro_pic = ?, username=?, title=?, message=?, date=?, pst_pic=? where post_id=? ";
    DB::update($sql, array( $pro_pic, $username, $title, $message, $date, $pst_pic, $post_id));
}

//create a new post
function create_post($comment_no, $pro_pic, $username, $title, $message, $date, $pst_pic){
    
    $sql = "insert into posts (comment_no, username, title, message, date, pst_pic, pro_pic) values (?,?, ?, ?, ?, ?, ?)";
    DB::insert($sql, array($comment_no, $username, $title, $message, $date, $pst_pic, $pro_pic));

}

//fetch the selected post based on id
function get_post($post_id){
    $sql = "select * from posts where post_id = ?";
    $posts = DB::select($sql, array($post_id));
    if (count($posts) != 1){
        die("Something went wrong!");
    }
    $post = $posts[0];
    return $post;
}

//fetch comments of the selected post from the database
function get_comments($post_id){
    $sql = "select * from comments where post_id= ?";
    $comments = DB::select($sql, array($post_id));
    $comment_no = count($comments);
    count_comment($comment_no, $post_id);
    return $comments;
}

//add comments to the current post
function add_comment($post_id, $username, $p_comment){
    $sql = "insert into comments (post_id, username, p_comments) values (?,?,?) ";
    DB::insert($sql, array($post_id, $username, $p_comment));
}

//count the number of comments in a post
function count_comment($comment_no, $post_id){
    $sql = "update posts set comment_no=? where post_id=?";
    DB::update($sql, array($comment_no, $post_id));
}

//delete the selected post
function delete_post($post_id){
    $sql = "delete from posts where post_id = ?";
    DB::delete($sql, array($post_id));
}

//delete the selected comment
function delete_comment($comment_id){
    $sql = "delete from comments where comment_id = ?";
    DB::delete($sql, array($comment_id));
}

