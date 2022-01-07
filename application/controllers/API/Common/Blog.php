<?php
require APPPATH.'/controllers/API/Common/Common.php';
class Blog extends Common {

	function utf8_strlen($string) 
	{
		return mb_strlen($string);
	}
	
	function utf8_strrpos($string, $needle, $offset = 0) 
	{
		return mb_strrpos($string, $needle, $offset);
	}
	
	function utf8_substr($string, $offset, $length = null) 
	{
		if ($length === null) {
			return mb_substr($string, $offset, utf8_strlen($string));
		} else {
			return mb_substr($string, $offset, $length);
		}
	}
	function imagename($imagename,$width,$height)
	{
	    $this->utf8_strrpos($imagename,'.'); die;
		$extension = pathinfo($imagename, PATHINFO_EXTENSION);
		$new_image = $this->utf8_substr($imagename,0,$this->utf8_strrpos($imagename,'.')). '-' . $width . 'x' . $height . '.' . $extension;
		return $new_image;
	}
	function imagemulitple($imagename,$width,$height)
	{ 
		$extension = pathinfo($imagename, PATHINFO_EXTENSION);
	
		$new_image = utf8_substr($imagename,0,utf8_strrpos($imagename,'.')). '-' . $width . 'x' . $height . '.' . $extension;
		list($width_orig, $height_orig) = getimagesize($imagename);
		$image = new Image($imagename);
		if ($width/$height == $width_orig/$height_orig) {
			$image->resize($width, $height, 'w');
		} elseif ($width/$height > $width_orig/$height_orig) {
			$image->resize($width, $height, 'w');
		} elseif ($width/$height < $width_orig/$height_orig) {
			$image->resize($width, $height, 'h');
		}
		$image->save($new_image);
	}

	
	function thumb($width,$height,$imageurl2,$name,$temp)
	{
		$sizex =$width;
		$sizey =$height;
		$ext=explode(".",$name);
		$url=$imageurl2."/". str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
		$url2=str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
		
		move_uploaded_file($temp,$url);
		
		$x=$sizex;
		$y=$sizey;
		$image=$this->imagename($url2,$x,$y); die;
	    $this->imagemulitple($url,$x,$y);
		unlink($url);
		$getimagename=$image;
		return $getimagename;
	}
	public function getBlogIndex_get()
	{ 	
	
		$blogs['blogs']=$this->ApiBlogModel->getBlogList("");
		$blogs['allblogcategory'] = $this->ApiBlogModel->getAllBlogCategory();
		$this->httpOkGetResponse($blogs);
		
	} 
public function blogDetails_post()
	{ 	
		$data = json_decode(file_get_contents('php://input'), true);
		$id=trim($data["id"])??"";
		$blogdetails['blogdetails'] = $this->ApiBlogModel->getBlogDetail($id);
		$blogdetails['nextbutton'] = $this->ApiBlogModel->nextblog($id);
		$blogdetails['privousbutton'] = $this->ApiBlogModel->priviousblog($id);
		$this->httpOkGetResponse($blogdetails);
	}

	public function getBlogByCategory_post()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$categoryid=trim($data["categoryid"])??"";	
		$blogs['blogs']=$this->ApiBlogModel->getBlogList($categoryid);
		$this->httpOkGetResponse($blogs);
	}

	public function blogComment_post(){
		$data = json_decode(file_get_contents('php://input'), true);
		
        $userdata['email'] = trim($data["email"])??"";
	
        $userdata['comment'] = trim($data["comment"])??"";
		$userdata['blog_id'] =trim($data["blogid"])??"";
        $page_data['save_blog_insertid'] = $this->ApiBlogModel->saveBlogComment($userdata);
		$this->httpOkGetResponse($page_data['save_blog_insertid']);
	}

	public function getBlogCommentByBlogId_post(){
		$data = json_decode(file_get_contents('php://input'), true);
		$searchParam['blog_id'] =trim($data["blogid"])??"";
		$getBlogCommentDetails["getBlogCommentDetails"]= $this->ApiBlogModel->getBlogCommentByBlogId($searchParam['blog_id']);
	   $this->httpOkGetResponse($getBlogCommentDetails);
	}

	public function searchParam_post(){
		$data = json_decode(file_get_contents('php://input'), true);
        $title = trim($data["blogtitle"])??"";
        $search_param['search_param'] = $this->ApiBlogModel->getSearchBlog($title);
		$this->httpOkGetResponse($search_param);
		
    }
    public function getAllCategory_get(){
		$data = json_decode(file_get_contents('php://input'), true);
		$blogs['allcategory']=$this->ApiBlogModel->getCategoryList();
		$this->httpOkGetResponse($blogs);
	}
     public function writeUpdateBlog_post(){
		$ID = trim($this->param["ID"]);
		$userdata['USER_ID'] = trim($this->param["USER_ID"]);
		$userdata['blog_category_id'] = trim($this->param["blog_category_id"]);
		$userdata['blog_title'] = trim($this->param["blog_title"]);
		$userdata['description'] = trim($this->param["description"]);
		$userdata['short_desc'] = trim($this->param["short_desc"]);
		// 		$width=1339;
		// 		$height=350;
		// 		$imageurl2='./uploads/blog';
		// 		$name=$_FILES["blog_images"]["name"];
		// 		echo $name;
		// 		echo $temp=$_FILES["blog_images"]["tmp_name"];
		// 		$oldimage=$this->input->post('oldimage');
		// 		if($name!=''){ $imagename=$this->thumb($width,$height,$imageurl2,$name,$temp); unlink($imageurl2.'/'.$oldimage);}else{
		// 			$imagename=$oldimage;
					
		// 		}
		// 		$userdata['blog_images'] = $imagename;
        $imgs = trim($this->param["blog_images"]);
		$imgss=explode(' @@@@ ',$imgs);
        $imame='';
        foreach( $imgss  as  $img ){
            $geturl='';
            $cropped_image = $img;
            list($type, $cropped_image) = explode(';', $cropped_image);
            list(, $cropped_image) = explode(',', $cropped_image);
            $cropped_image = base64_decode($cropped_image);
            $imageurl2='uploads/blog/';
            $name = date('ymdgis').$i.'.jpg';
                $ext=explode(".",$name);
            $url.=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]).',';
            $imgname=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
            file_put_contents($imageurl2.''.$imgname, $cropped_image);
            $i++;
        }
		$userdata['blog_images'] = rtrim($imame,',');
		$userdata['meta_key'] = trim($this->param["meta_key"]);
		$userdata['meta_url'] = trim($this->param["meta_url"]);
		$userdata['meta_tag'] = trim($this->param["meta_tag"]);
		$userdata['meta_desc'] = trim($this->param["meta_desc"]);
		$flag = trim($this->param["flag"]);
		if($flag == "insert"){
			$userdata['date_created'] = date('Y-m-d h:i:s');
			$status=$this->ApiBlogModel->writeBlogExecute($userdata);
            $status?$this->httpOk('MSG_200_028',MSG_200_028):$this->httpOk('MSG_200_029',MSG_200_029);
		}elseif($flag == "update"){
			$userdata['date_updated']=date('Y-m-d h:i:s');
			$status=$this->ApiBlogModel->updateBlogExecute($userdata,$ID);
			$status?$this->httpOk('MSG_200_030',MSG_200_030):$this->httpOk('MSG_200_031',MSG_200_031);
		}elseif($flag == "draft_insert"){
			$userdata['date_created'] = date('Y-m-d h:i:s');
			$status=$this->ApiBlogModel->writeBlogDraftExecute($userdata);
            $status?$this->httpOk('MSG_200_032',MSG_200_032):$this->httpOk('MSG_200_033',MSG_200_033);
		}elseif($flag == "draft_update"){
			$userdata['date_updated']=date('Y-m-d h:i:s');
			$status=$this->ApiBlogModel->updateBlogDraftExecute($userdata,$ID);
			$status?$this->httpOk('MSG_200_034',MSG_200_034):$this->httpOk('MSG_200_035',MSG_200_035);
		}else{
			$this->httpOkGetResponse($userdata);
		}
     }
    public function blogDetailsByUserId_get(){ 	
		$response['blogs'] = array();
		$result = $this->ApiBlogModel->getblogDetailsByUserIdExecute(trim($this->param["USER_ID"]));
		
		    foreach($result as $key){
		    $date_created = new DateTime($key['date_created']);
            $strip = $date_created->format('Y-m-d');
            $date_updated = new DateTime($key['date_updated']);
            $strip1 = $date_updated->format('Y-m-d');
            $category_name =$key['blog_category_id'];
            $category=$this->ApiBlogModel->getCategoryName($category_name);
			$data[] = array(
				'id'=>$key['id'],
				'USER_ID'=>$key['USER_ID'],
				'blog_category_id'=>$category,
				'blog_title'=>$key['blog_title'],
				'description'=>$key['description'],
				'short_desc'=>$key['short_desc'],
				'blog_images'=>$key['blog_images'],
				'date_created'=>$strip,
				'date_updated'=>$strip1
				
			);
			$response['blogs'] = $data;
		}
		$this->httpOkGetResponse($response);
	}
	public function blogDetailsSpecificDataById_post(){
		$result = $this->ApiBlogModel->getblogDetailsBySpecificData(trim($this->param["id"]));
		foreach($result as $key){
			$date_created = $key['date_created'];
			$date_created = date('j F Y, h:m A', strtotime($date_created)); 
			$date_updated = $key['date_updated'];
			$date_updated = date('j F Y, h:m A', strtotime($date_updated)); 
			$data[] = array(
				'id'=>$key['id'],
				'USER_ID'=>$key['USER_ID'],
				'blog_category_id'=>$key['blog_category_id'],
				'blog_title'=>$key['blog_title'],
				'description'=>$key['description'],
				'short_desc'=>$key['short_desc'],
				'blog_images'=>$key['blog_images'],
				'date_created'=>$date_created,
				'date_updated'=>$date_updated,
			);
			$blogdetails['blogdetails'] = $data;
		}
		$result1= $this->ApiBlogModel->getBlogCommentByBlogId(trim($this->param["id"]));
		foreach($result1 as $key){
			$created_at = $key['created_at'];
			$created_at = date('j F Y, h:m A', strtotime($created_at)); 
			$data1[] = array(
				'id'=>$key['id'],
				'blog_id'=>$key['blog_id'],
				'Profile_Pic'=>$key['Profile_Pic'],
				'First_Name'=>$key['First_Name'],
				'Middle_Name'=>$key['Middle_Name'],
				'Last_Name'=>$key['Last_Name'],
				'email'=>$key['email'],
				'Website'=>$key['Website'],
				'comment'=>$key['comment'],
				'created_at'=>$date_updated,
			);
			$blogdetails['getBlogComment'] = $data1;
			
		}
		$this->httpOkGetResponse($blogdetails);
	}
	public function getDraftList_get(){ 
		$response['blogs'] = array();
		$result = $this->ApiBlogModel->getDraftListExecute(trim($this->param["USER_ID"]));
		foreach($result as $key){
			$date_created = $key['date_created'];
			$date_created = date('j F Y, h:m A', strtotime($date_created)); 
			$data[] = array(
				'id'=>$key['id'],
				'USER_ID'=>$key['USER_ID'],
				'blog_category_id'=>$key['blog_category_id'],
				'blog_title'=>$key['blog_title'],
				'date_created'=>$date_created
			);
			$response['blogs'] = $data;
		}
		$this->httpOkGetResponse($response);
	}
	public function blogDraftDetails_get(){ 
		$response['draft'] = array();
		$result = $this->ApiBlogModel->getDraftDetailsExecute(trim($this->param["id"]));
		foreach($result as $key){
			$date_created = $key['date_created'];
			$date_created = date('j F Y, h:m A', strtotime($date_created)); 
			$date_updated = $key['date_updated'];
			$date_updated = date('j F Y, h:m A', strtotime($date_updated)); 
			$data[] = array(
				'id'=>$key['id'],
				'USER_ID'=>$key['USER_ID'],
				'blog_category_id'=>$key['blog_category_id'],
				'blog_title'=>$key['blog_title'],
				'description'=>$key['description'],
				'short_desc'=>$key['short_desc'],
				'blog_images'=>$key['blog_images'],
				'date_created'=>$date_created,
				'date_updated'=>$date_updated
			);
			$response['draft'] = $data;
		}
		$this->httpOkGetResponse($response);
	}
	public function SearchBlogByUserId_post(){
		$data = json_decode(file_get_contents('php://input'), true);
        $title = trim($data["blogtitle"])??"";
		$USER_ID = trim($data["USER_ID"])??"";
        $search_param['search_param'] = $this->ApiBlogModel->empAspSearchParam($title,$USER_ID);
		$this->httpOkGetResponse($search_param);
    }
    
    public function blogDisable_post(){	
        $active_status['active_status'] = "N";
		$result = $this->ApiBlogModel->getblogDisableStatus(trim($this->param["id"]));
		if($result == 'N'){
			$this->httpOk('MSG_200_044',MSG_200_044);
		}else{
			$status=$this->ApiBlogModel->updateStatusblogDisable($active_status,trim($this->param["id"]));
         	$status?$this->httpOk('MSG_200_043',MSG_200_043):$this->httpOk('MSG_200_044',MSG_200_044);
		}
    }
    public function ifBlogNotExist_post(){ 	
		$user = $this->ApiBlogModel->checkIfUserExistInBlogOrNot(trim($this->param["USER_ID"]));
		if($user == ''){
			$response['BlogNotExist']="You don't have any Blogs in your list. Become a writer in a single click.";
            $this->httpOkGetResponse( $response);
		}
	}
}