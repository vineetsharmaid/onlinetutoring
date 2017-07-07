<?php

class ThreetabController extends \BaseController {

	////////////Three Tab Content Update Page
	public function homethreetab()
	{
		return View::make('admin/pages.homethreetab');
	}

	///////////home three tab content update form
	public function updatehomethreetab($id)
	{
		return View::make('admin/pages.updatehomethreetab')->with('id',$id);
	}


	////////Home three tab content update date save()
	public function updatethreetab()
	{
		$validation = array(
        'tab_title_en'     		=> 'required',
	    'tab_subtitle_en'    	=> 'required',
	    'tab_heading_en'      	=> 'required',
		'tab_content_en'     	=> 'required',

		'tab_title_sv'     		=> 'required',
	    'tab_subtitle_sv'    	=> 'required',
	    'tab_heading_sv'      	=> 'required',
		'tab_content_sv'     	=> 'required',
        );
      $valid = Validator::make(Input::all(),$validation);
      if($valid->fails())
      {
        return Redirect::back()
           ->withInput()
           ->withErrors($valid);
      }
      else
      {
        
        $posthtt = Input::all();
        $data = array(
            'tab_title_en'     		=> $posthtt['tab_title_en'],
		    'tab_subtitle_en'    	=> $posthtt['tab_subtitle_en'],
		    'tab_heading_en'      	=> $posthtt['tab_heading_en'],
		    'tab_content_en'      	=> $posthtt['tab_content_en'],

		    'tab_title_sv'     		=> $posthtt['tab_title_sv'],
		    'tab_subtitle_sv'    	=> $posthtt['tab_subtitle_sv'],
		    'tab_heading_sv'      	=> $posthtt['tab_heading_sv'],
		    'tab_content_sv'      	=> $posthtt['tab_content_sv']
          );

          $content_image_en_file = Input::file('content_image_en');
          if(is_null($content_image_en_file))
          {
          	$data1 = array(
          		'content_image_en' => $posthtt['content_image_en_old']
          	);
		  }
		  else
		  {
		  	$destinationPath 	= 'admin/db_images/';
			$content_image_en_name 	= $content_image_en_file->getClientOriginalName();
			$content_image_en = value(function() use ($content_image_en_file){
			    $filename = str_random(10) . '.' . $content_image_en_file->getClientOriginalExtension();
			        return strtolower($filename);
			    });
			Input::file('content_image_en')	->move($destinationPath, $content_image_en);
			$data1 = array(
          		'content_image_en' => $content_image_en
          	);
		  }

		  $content_image_sv_file = Input::file('content_image_sv');
          if(is_null($content_image_sv_file))
          {
          	$data2 = array(
          		'content_image_sv' => $posthtt['content_image_sv_old']
          	);
		  }
		  else
		  {
		  	$destinationPath 	= 'admin/db_images/';
			$content_image_sv_name 	= $content_image_sv_file->getClientOriginalName();
			$content_image_sv = value(function() use ($content_image_sv_file){
			    $filename = str_random(10) . '.' . $content_image_sv_file->getClientOriginalExtension();
			        return strtolower($filename);
			    });
			Input::file('content_image_sv')	->move($destinationPath, $content_image_sv);
			$data2 = array(
          		'content_image_sv' => $content_image_sv
          	);
		  }

		  $check  = 0;
          $check  = DB::table('homethreetab')->where('id',$posthtt['id'])->update($data);
          $check1 = DB::table('homethreetab')->where('id',$posthtt['id'])->update($data1);
          $check2 = DB::table('homethreetab')->where('id',$posthtt['id'])->update($data2);
          Session::flash('message', 'Home Three Tab Content Successfully Updated...');
          return Redirect::to('/pages/homethreetab');
	  }
	
	}



}
