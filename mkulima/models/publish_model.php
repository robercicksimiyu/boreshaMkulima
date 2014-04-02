<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publish_Model extends ExtendedModel
{
	public function post_article($values=array()){
		$this->db->insert('expert_articles',$values);
	}

	public function get_articles($topic){
		if($topic==null){
			$articles=$this->db->get('expert_articles');			
		}else{
			foreach($this->categories() as $row){
				if($row->category_name==$topic){
					$articles=$this->db->get_where('expert_articles',array('category_id'=>$row->id));
					break;	
				}
			}
			
		}
		

		if($articles->num_rows()){
			foreach($articles->result() as $article){
				$sValue[]=$article;
			}
		}
		else{
			$sValue=null;
		}
		return $sValue;
	}

	public function categories(){
		$categories=$this->db->get('category');
		if($categories->num_rows()){
			foreach($categories->result() as $value){
				$result[]=$value;
			}
		}
		else{
			$result=null;
		}
		return $result;

	}

	public function fetch_category($cat_id){
		$categ=$this->get_where('category',array('id'=>$cat_id));

		foreach($categ->result() as $row){
			return $row->category_name;
		}

	}

	public function single_article($id){
		$oResult=$this->db->get_where('expert_articles',array('id'=>$id));
		foreach($oResult->result() as $row){
			$sValue[]=$row;
		}
		return $sValue;
	}

	public function author_details($username){
		$this->db->limit('1');
		$author=$this->db->get_where('editors',array('username'=>$username));
		if($author->num_rows()){
			foreach($author->result() as $row){
			$author_detail[]=$row;
			}
		}
		else{
			$author_detail=null;
		}
		return $author_detail;
	}

}