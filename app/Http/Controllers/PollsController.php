<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pollstype;
use App\Pollsposition;
use App\Pollscandidate;
use App\Pollsmonitor;
use App\Pollsvote;
use App\User;
use DB;


class PollsController extends Controller
{
    public function add_pols(){
    	$type = Pollstype::all();
    	return view('Polls.add_polls',['type'=>$type]);
    }


    public function save_polls(Request $request){
    	$this->validate($request,[
    		'polltype'=>'required|max:255'
    	]);

    	$data = [
    		'type'=> $request->input('polltype')
    	];

    	$poll = new Pollstype($data);
    	$poll->save();

    	return Redirect()->back()->with('message', 'Polls Type Added Succussfully!');

    }


    public function status_confirm(Request $request){
    	$status = $request->post('status');
    	$id = $request->post('cid');

    	if ($status == '1') {

          	$poll = Pollstype::where('id',$id)->first();
    		$poll->status = 1;
            $poll->save();

            $msg = "Status Updated Successfully!";
            return response()->json(array('msg'=> $msg), 200);
        }else{
            //create new ststus
            $poll = Pollstype::where('id',$id)->first();
    		$poll->status = 0;
            $poll->save();

            $msg = "Status Updated Successfully!";
            return response()->json(array('msg'=> $msg), 200);
        }

    	
    }



    public function vote_confirm(Request $request){
      $status = $request->post('status');
      $id = $request->post('cid');

      if ($status == '1') {

            $poll = Pollstype::where('id',$id)->first();
        $poll->startvote = 1;
            $poll->save();

            $msg = "Polls Has Been Open For Voting Successfully!";
            return response()->json(array('msg'=> $msg), 200);
        }else{
            //create new ststus
            $poll = Pollstype::where('id',$id)->first();
        $poll->startvote = 0;
            $poll->save();

            $msg = "Polls Closed Successfully!";
            return response()->json(array('msg'=> $msg), 200);
        }
    }


    public function edit_pols($id){
    	$type = Pollstype::where('id',$id)->first();
    	return view('Polls.edit_polls',['type'=>$type]);
    }


    public function update_pols(Request $request){
    	$id = $request->input('hiddenid');
    	$type = $request->input('polltype');

    	$types = Pollstype::where('id',$id)->first();
    	//dd($types);
    	$types->type = $type;
    	$types->save();


    return Redirect()->route('add-polls')->with('message', 'Polls Updated Succussfully!');

    }



    public function manage_polls(){
    	$type = Pollstype::where('status','1')->first();
      if ($type) {
        $pollsmanage = Pollsposition::where('pollstype_id',$type->id)->get();
        return view('Polls.manage_polls',['type'=>$type,'positions'=>$pollsmanage]);
      }
        return view('Polls.manage_polls',['positions'=> 'null']);
    	
    	
    }


    public function save_position(Request $request){
    	$this->validate($request,[
    		'addposition'=> 'required|max:255'
    	]);

    	$data = [
    		'pollstype_id'=>$request->input('votetype'),
    		'name'=>$request->input('addposition')
    	];

    	$pollpos = new Pollsposition($data);
    	$pollpos->save();

        return Redirect()->back()->with('message', 'Position Added Succussfully!');


    }


    public function edit_positions($id){
    	$pollpos = Pollsposition::where('id',$id)->first();
    	return view('Polls.edit_position',['positions'=>$pollpos]);

    }


    public function update_position(Request $request){
    	$id = $request->input('posid');
    	$pos = $request->input('addposition');

    	$pollpos = Pollsposition::where('id',$id)->first();
    	$pollpos->name = $pos;
    	$pollpos->save();


    return Redirect()->route('manage-candidates')->with('message', 'Position Updated Succussfully!');


    }



    public function add_candidates(){
    	$type = Pollstype::where('status','1')->first();

      if (!$type) {
        return view('Polls.add_candidate',['positions'=> 'null']);
      }

    	$pollpos = Pollsposition::where('pollstype_id',$type->id)->get();
      $candidates = Pollscandidate::where('pollstype_id',$type->id)->orderBy('position')->get();
    	$user = DB::table('users')->where('indexnumber', 'like', '%GES%')->get();
    	return view('Polls.add_candidate',['type'=>$type,'positions'=>$pollpos,'candidates'=> $candidates,'users'=>$user]);

      
    }


    public function save_candidate(Request $request){

    	$this->validate($request,[
    		'indexnumber'=>'required',
    		'fullname'=>'required|max:255',
    		'addposition'=>'required'
    	]);


    	$user = User::where('indexnumber',$request->input('indexnumber'))->first();

    	if (!$user) {
    		  return Redirect()->back()->with('messages', 'Index Number Dont Exist');

    	}

    	//dd($user);

    	$data = [
    		'pollstype_id'=>$request->input('votetype'),
    		'indexnumber'=>$request->input('indexnumber'),
    		'fullname'=>$request->input('fullname'),
    		'position'=>$request->input('addposition'),
    		'user_id'=>$user->id
    	];


    	$can = new Pollscandidate($data);
    	$can->save();

    	return Redirect()->back()->with('message', 'Candidate Added Succussfully!');


    }


 public function edit_candidates($id){
 	$can = Pollscandidate::where('id',$id)->first();
 	$type = Pollstype::where('status','1')->first();
    $pollpos = Pollsposition::where('pollstype_id',$type->id)->get();
 	return view('Polls.edit_candidate',['candidate'=> $can,'positions'=>$pollpos ]);
 }


public function update_candidate_info(Request $request){
	$id = $request->input('hiddenid');
	$indexnumber = $request->input('indexnumber');
	$fullname = $request->input('fullname');
	$addposition = $request->input('addposition');

	$pollpos = Pollscandidate::where('id',$id)->first();
	$pollpos->indexnumber = $indexnumber;
	$pollpos->fullname = $fullname;
	$pollpos->position = $addposition;
	$pollpos->save();

    return Redirect()->route('add-candidates')->with('message', 'Candidate Info Updated Succussfully!');

}


public function result_polls(){

	$type = Pollstype::where('status','1')->first();
  if (!$type) {
        return view('Polls.polls_results',['positions'=> 'null']);
  }
  $pollpos = Pollsposition::where('pollstype_id',$type->id)->get();
	return view('Polls.polls_results',['positions'=>$pollpos]);
}



public function get_results(Request $request){
	$colors = ["#f0ad4e","#3c8dbc","#00a65a","#dd4b39","#1ed8ee","#e3f599","#b89354","#59805c","#031605","#868cb6","#3a6541","#758a78","#e64f81"];

	$type = Pollstype::where('status','1')->first();
	$pos = $request->post('name');

	$pollpos = Pollscandidate::where('pollstype_id',$type->id)
	->where('position',$pos)
	->orderBy('votes','Desc')
	->get();

	$votes = Pollscandidate::where('pollstype_id',$type->id)->where('position',$pos)->sum('votes');

	$user = DB::table('users')->where('indexnumber', 'like', '%GES%')->get();


	$index = 0;
	foreach ($pollpos as $row) {
		$voteu = $row->votes;
		if ($votes == '0') {
			$votepec = 0;
		}else{
			$votepec = 100*round($row->votes/($votes),$pollpos->count());
		}

		echo '<ul class="list-inline">';
		foreach ($user as $users) {
			if ($users->id == $row->user_id) {
				echo'<li><img src="'.asset('storage').'/'.$users->pro_pic.'" height="50" width="50" class="img-circle"></li>';
			}
		}
		echo'
						
							<li><b>'.$row->fullname.'</b></li>
						</ul>
						<div class="progress">
							<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="'.$votepec.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$votepec.'%;background-color: '.$colors[$index].';">
							  <span class="sr-only">$votepec% Complete (success)</span>
						</div>
						</div>
						<b>'.$votepec.'% of '.$votes.' total votes</b><br>
						<b>votes '.$row->votes.'</b>
						<hr style="border:1px solid #ccc;">
				  ';
		$index++;		  	
	}

}



public function start_vote(){
	return view('Polls.start_vote');
}


public function start_votes(){

	$type = Pollstype::where('status','1')
  ->where('startvote','1')->first();

  if (!$type) {
    echo'failed';
    exit;
  }

	$mon = Pollsmonitor::where('pollstype_id',$type->id)
	->where('user_id',auth()->user()->id)->first();

	if ($mon) {
		echo '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Alert!</h4>
						Youve Already Volted!
				</div>
	    ';
	}else{

		$data = [
			'pollstype_id'=> $type->id,
			'user_id'=> auth()->user()->id
		];

		$monitor = new Pollsmonitor($data);
		$monitor->save();

		echo 'success';
	}
}


public function start_vote_now(){
	//monitorvote
	$type = Pollstype::where('status','1')->first();
  
	// $mon = Pollsmonitor::where('pollstype_id',$type->id)
	// ->where('user_id',auth()->user()->id)->first();

	// if ($mon) {
	// 	return Redirect()->back();
	// }



	$type = Pollstype::where('status','1')->first();
	$posi = DB::table('pollspositions')
	->where('pollstype_id',$type->id)->orderBy('id','Desc')->take(1)->first();
	//dd($posi);

	$vote = Pollsvote::where('pollstype_id',$type->id)
	->where('user_id',auth()->user()->id)
	->where('position', $posi->name)->first();

	$candidates  = Pollscandidate::where('position',$posi->name)->get();
	$user = DB::table('users')->where('indexnumber', 'like', '%GES%')->get();
	return view('Polls.voting_started',['vote'=>$vote, 'position'=>$posi,'candidates'=> $candidates,'users'=>$user]);
}


public function vote_next(Request $request){
	$id = $request->post('cid');
	$type = Pollstype::where('status','1')->first();
	$posi = DB::table('pollspositions')
	->where('pollstype_id',$type->id)
	->where('id','<', $id)->orderBy('id','Desc')->take(1)->first();

	
	if ($posi) {
		$candidates  = Pollscandidate::where('position',$posi->name)->get();
		$users = DB::table('users')->where('indexnumber', 'like', '%GES%')->get();

		$vote = Pollsvote::where('pollstype_id',$type->id)
	->where('user_id',auth()->user()->id)
	->where('position', $posi->name)->first();

		echo'
			<div class="box-body">
              <table id="example18" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th colspan="6">Position '.$posi->name.'</th>
                  </tr>
                <tr>
                  <th>#</th>
                  <th>Img</th>
                  <th>Index Number</th>
                  <th>Fullname</th>
                  <th>Positions</th>
                  <th>Vote</th>
                </tr>
                </thead>
                <tbody>';
                $loop = 1;
                  foreach($candidates as $row){
                  	echo'
                  		<tr>
                      <td>'.$loop.'</td>
                      <td>';
                        foreach($users as $user){
                        	if($user->id == $row->user_id){
                        		echo'
                        			<img src="'.asset('storage').'/'.$user->pro_pic.'" class="img-circle"width="50" height="50">
                        		';
                        	}
                        }
                        echo'
                      </td>
                      <td>'.$row->indexnumber.'</td>
                          <td>'.$row->fullname.'</td>
                          <td>'.$row->position.'</td>
                          <input type="hidden" value="'.$row->position.'" id="position_'.$row->id.'">
                          ';
                          if (!empty($vote)) {
                          	echo'
                          		 <td><input type="radio" id="votecheck_'.$row->id.'" name="radio" cid="'.$row->id.'"   class="radioinput" value="'.$row->fullname.'" checked></td>
                          	';
                          }else{
                          	echo'
                          		 <td><input type="radio" id="votecheck_'.$row->id.'" name="radio" cid="'.$row->id.'"   class="radioinput" value="'.$row->fullname.'"></td>
                          	';	
                          }
                         echo'
                    </tr>
                  	';
                  	 $loop++;
                  }
                    
                  echo'
                  <tr>
                    <td colspan="2"><a href="#" id="getids" cid="'.$posi->id.'" class=" btn pull-right btn-info">&larr; Previous</a></td>
                    <td colspan="2"></td>
                    <td colspan="2"><a href="#" id="getid" cid="'.$posi->id.'" class=" btn btn-info">&rarr; Next</a></td>
                  </tr>
                </tbody>
             </table>
            </div>      
		';
	}else{
		echo'finished';
	}
}



public function vote_previous(Request $request){
	$id = $request->post('cid');
	$type = Pollstype::where('status','1')->first();
	$posi = DB::table('pollspositions')
	->where('pollstype_id',$type->id)
	->where('id','>', $id)->orderBy('id','Desc')->take(1)->first();

	


	if ($posi) {
		$candidates  = Pollscandidate::where('position',$posi->name)->get();
		$users = DB::table('users')->where('indexnumber', 'like', '%GES%')->get();

		$vote = Pollsvote::where('pollstype_id',$type->id)
	->where('user_id',auth()->user()->id)
	->where('position', $posi->name)->first();
		
		echo'
			<div class="box-body">
              <table id="example18" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th colspan="6">Position '.$posi->name.'</th>
                  </tr>
                <tr>
                  <th>#</th>
                  <th>Img</th>
                  <th>Index Number</th>
                  <th>Fullname</th>
                  <th>Positions</th>
                  <th>Vote</th>
                </tr>
                </thead>
                <tbody>';
                $loop = 1;
                  foreach($candidates as $row){
                  	echo'
                  		<tr>
                      <td>'.$loop.'</td>
                      <td>';
                        foreach($users as $user){
                        	if($user->id == $row->user_id){
                        		echo'
                        			<img src="'.asset('storage').'/'.$user->pro_pic.'" class="img-circle"width="50" height="50">
                        		';
                        	}
                        }
                        echo'
                      </td>
                      <td>'.$row->indexnumber.'</td>
                          <td>'.$row->fullname.'</td>
                          <td>'.$row->position.'</td>
                          <input type="hidden" value="'.$row->position.'" id="position_'.$row->id.'">
                          ';
                          if (!empty($vote)) {
                          	echo'
                          		 <td><input type="radio" id="votecheck_'.$row->id.'" name="radio" cid="'.$row->id.'"   class="radioinput" value="'.$row->fullname.'" checked></td>
                          	';
                          }else{
                          	echo'
                          		 <td><input type="radio" id="votecheck_'.$row->id.'" name="radio" cid="'.$row->id.'"   class="radioinput" value="'.$row->fullname.'"></td>
                          	';	
                          }
                         echo'
                    </tr>
                  	';
                  	 $loop++;
                  }
                    
                  echo'
                  <tr>
                    <td colspan="2"><a href="#" id="getids" cid="'.$posi->id.'" class=" btn pull-right btn-info">&larr; Previous</a></td>
                    <td colspan="2"></td>
                    <td colspan="2"><a href="#" id="getid" cid="'.$posi->id.'" class=" btn btn-info">&rarr; Next</a></td>
                  </tr>
                </tbody>
             </table>
            </div>      
		';

	}else{
		
	}
	
}


public function vote_save(Request $request){
	$canid = $request->post('cid');
	$position = $request->post('position');
	$name = $request->post('name');
	$type = Pollstype::where('status','1')->first();

	$vote = Pollsvote::where('pollstype_id',$type->id)
	->where('user_id',auth()->user()->id)
	->where('position', $position)->first();

	if ($vote) {
		echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
					Youve Already Voted for This Slot,
					Proceed to Next Vote
           </div>';
	}else{

		$data = [
			'pollstype_id'=> $type->id,
			'user_id'=> auth()->user()->id,
			'position'=> $position,
			'pollscandidate_id'=> $canid
		];

		$polls = new Pollsvote($data);
		$polls->save();

		$can = Pollscandidate::where('id',$canid)->first();
		$vote = $can->votes;
		$can->votes = $vote + 1;
		$can->save();

		echo'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Thank You, You Voted For '.$name.', Proceed to next Vote
         </div>';

	}


}









}
