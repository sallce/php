<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');
/**
* 这个是分页类
*/

// php:
//	$page=new page(array('total'=>/*[行总数]*/,'perpage'=>/*[每页行数]*/));
//	return $page->offset(); // 返回sql限制行数
//	$page->show(/*[模板名]*/);
// html:
//	<{include file="pages/$temp.html"}> 
//	// 输出分页
class page
{
	/**
	 * config ,public
	 */
	public $page_name="page";//page标签，用来控制url页。比如说xxx.php?page=2中的page

	/**
	 * private
	 */
	private $totalpage=0;//总页数
	private $total=0;//总记录数
	private $nowindex=1;//当前页
	private $url="";//url地址头
	private $offset=0;

	/**
	 * constructor构造函数
	 *
	 * @param array $array['total'],$array['perpage'],$array['nowindex'],$array['url']...
	 */
	function page($array)
	{
		if(is_array($array)){
			if(!array_key_exists('total',$array))
				$this->_error('需要记录总数');
			$total=intval($array['total']);
			$perpage=(array_key_exists('perpage',$array))?intval($array['perpage']):10;
			$nowindex=(array_key_exists('nowindex',$array))?intval($array['nowindex']):'';
			$url=(array_key_exists('url',$array))?$array['url']:'';
		}else{
			$total=$array;
			$perpage=10;
			$nowindex='';
			$url='';
		}
		if((!is_int($total))||($total<0))
			$this->_error('记录总条数错误!');
		if((!is_int($perpage))||($perpage<=0))
			$this->_error('记录条数数量错误!');
		if(!empty($array['page_name']))
			$this->set('page_name',$array['page_name']);//设置pagename
		$this->_set_nowindex($nowindex);//设置当前页
		$this->_set_url($url);//设置链接地址
		$this->total=$total;
		$this->totalpage=ceil($total/$perpage);
		$this->offset=" LIMIT " . ($this->nowindex-1)*$perpage . ", " . $perpage;
	}

	/**
	 * sql分页
	 *
	 * @return limit
	 */
	function offset()
	{
		return $this->offset;
	}
	/**
	 * 设定类中指定变量名的值，如果改变量不属于这个类，将throw一个exception
	 *
	 * @param string $var
	 * @param string $value
	 */
	function set($var,$value)
	{
		if(in_array($var,get_object_vars($this)))
			$this->$var=$value;
		else {
			$this->_error("没有这个变量!");
		}
	}

	function show($tmp_name = 'default')
	{
		global $smarty;
		if (file_exists(SYSTEM_ROOT . "/templates/pages/$tmp_name.html"))
		{
			$smarty->assign('rate', array('page'=>$this->nowindex,'page_num'=>$this->totalpage,'url'=>$this->url,'total'=>$this->total));
			$smarty->assign('temp', $tmp_name); // 模板名
		}
		else
		{
			$this->_error('模板不存在');
		}
	}

	function get_page()
	{
		return $this->nowindex;
	}
	/*----------------private function (私有方法)-----------------------------------------------------------*/
	/**
	 * 设置url头地址
	 * @param: String $url
	 * @return boolean
	 */
	function _set_url($url="")
	{
		if(!empty($url)){
			//手动设置
			$this->url=$url.((stristr($url,'?'))?'&':'?').$this->page_name."=";
		}else{
			//自动获取
			if(empty($_SERVER['QUERY_STRING'])){
				//不存在QUERY_STRING时
				$this->url=$_SERVER['REQUEST_URI']."?".$this->page_name."=";
			}else{
				//
				if(stristr($_SERVER['QUERY_STRING'],$this->page_name.'=')){
					//地址存在页面参数
					$this->url=str_replace($this->page_name.'='.$this->nowindex,'',$_SERVER['REQUEST_URI']);
					$last=$this->url[strlen($this->url)-1];
					if($last=='?'||$last=='&'){
						$this->url.=$this->page_name."=";
					}else{
						$this->url.='&'.$this->page_name."=";
					}
				}else{
					//
					$this->url=$_SERVER['REQUEST_URI'].'&'.$this->page_name.'=';
				}//end if   
			}//end if
		}//end if
	}

	/**
	 * 设置当前页面
	 */
	function _set_nowindex($nowindex)
	{
		if(empty($nowindex)){
			//系统获取
			if(isset($_GET[$this->page_name])){
				$this->nowindex=intval($_GET[$this->page_name]);
			}
		}else{
			//手动设置
			$this->nowindex=intval($nowindex);
		}
	}

	/**
	 * 出错处理方式
	 */
	function _error($errormsg)
	{
		global $smarty;
		$smarty->assign('errormsg', $errormsg);
		$smarty->display('error.html');
		die();
	}
}



/**
* end file
*/
